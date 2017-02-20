<?php

class Users
{

    private $db;
    public $data = array();

    public function __construct($database)
    {
        $this->db = $database;
    }

    private function pdoSet($allowed, &$values, $source = array())
    {
        $set = '';
        $values = array();
        if (!$source) $source = &$_POST;
        foreach ($allowed as $field) {
            if (isset($source[$field])) {
                $set .= "`" . str_replace("`", "``", $field) . "`" . "=:$field, ";
                $values[$field] = $source[$field];
            }
        }
        return substr($set, 0, -2);
    }

    public function insert($data)
    {
        $query = $this->db->prepare("INSERT INTO `users` (first_name, surname, second_name,citizen,city,region,link_fb,phone,email,password) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $query->execute(array($data['first_name'], $data['surname'], $data['second_name'], $data['citizen'], $data['city'], $data['region'], $data['link_fb'], $data['phone'], $data['email'], $data['password']));
        return $query;
    }

    public function checkEmail($email)
    {
        $sql = "SELECT COUNT(*) FROM `users` WHERE `email`= '$email'";
        $query = $this->db->query($sql);
        if ($query->fetchColumn() > 0) {
            return false;
        }
        return true;
    }

    public function getIdByEmail($email)
    {
        $sql = "SELECT `id` FROM `users` WHERE `email`= '$email'";
        $query = $this->db->query($sql);
        if ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            return $row['id'];
        } else {
            return false;
        }
    }

    public function last_id()
    {
        return $this->db->lastInsertId();
    }

    public function updateAge($id, $birthday)
    {
        $sql = "UPDATE `users` set `birthday`=$birthday WHERE `id` = $id";
        return $this->db->exec($sql);
    }

    public function activateUser($id)
    {
        return $this->db->exec("UPDATE `users` set `activate`=1 WHERE `id` = $id");
    }

    public function updateUser($id, $values)
    {
        $allowed = array("years_sup_football", "foreign_passport", "sup_in_foreign_country", "shengen_visa", "matches", "visa_own", "fb_in_your_life", "lodging_with_pay", "fb_support", "lodging_without_pay"); // allowed fields

        $sql = "UPDATE users SET " . $this->pdoSet($allowed, $values) . " WHERE id = :id";
        $query = $this->db->prepare($sql);
        $values["id"] = $id;
        return $query->execute($values);
    }

    public function showUser()
    {
        $sql = "SELECT `id`,`first_name`,`surname`,`second_name`,`phone`,`email`,`city`,`citizen`,`link_fb`,`password`,`birthday`,`foreign_passport`,`shengen_visa`,`visa_own`,`lodging_with_pay`,`lodging_without_pay`,`years_sup_football`,`fb_support`,`fb_in_your_life`,`sup_in_foreign_country`,`matches`,`create_date`,`edit_date` FROM `users` where `first_name`!='admin'";
        return $this->db->query($sql)->fetchall();
    }
    public function deleteUser($id){
        $sql='DELETE FROM `users` WHERE `id`= :id';
        $query = $this->db->prepare($sql);
        return $query->execute(array('id'=>$id));
    }
    public function checkAdmin($login,$pass){
        $sql = "SELECT `id` FROM `users` WHERE `first_name`= :login and `password` = :pass";
        $query = $this->db->prepare($sql);
        $query->execute(array(':login'=>$login,':pass'=>$pass));
        if ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            return $row['id'];
        } else {
            return false;
        }
    }
}