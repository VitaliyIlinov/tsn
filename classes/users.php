<?php

class Users
{

    private $db;
    public $data = array();

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function insert($data)
    {
//        $query= $this->db->prepare("INSERT INTO `users` (first_name, surname, second_name) VALUES (:first_name,:surname,:second_name)");
//        $query->execute( array( ':first_name'=>$data['first_name'], ':surname'=>$data['surname'], ':second_name'=>$data['second_name'] ) );

        $query = $this->db->prepare("INSERT INTO `users` (first_name, surname, second_name,citizen,city,region,link_fb,phone,email,password) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $query->execute(array($data['first_name'], $data['surname'], $data['second_name'], $data['citizen'], $data['city'], $data['region'], $data['link_fb'], $data['phone'], $data['email'], $data['password']));
        return $query;
    }
    public function checkEmail($email){
        $sql="SELECT COUNT(*) FROM `users` WHERE `email`= '$email'";
        $query=$this->db->query($sql);
        if($query->fetchColumn()>0){
            return false;
        }
        return true;
    }
    public function checkActivate($login){
        $sql="SELECT `id` FROM `users` WHERE `email`= '$login'";
        $query = $this->db->query($sql);
        if($row=$query->fetch(PDO::FETCH_ASSOC)){
            return $row['id'];
        }else{
            return false;
        }
    }

    public function last_id(){
        return $this->db->lastInsertId();
    }

    public function showUser()
    {

    }
    public function activateUser($id)
    {
        return $this->db->exec("UPDATE `users` set `activate`=1 WHERE `id` = $id");
    }

    public function updateUser()
    {

    }
}