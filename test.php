<?php
class DB{
    private $db=false;

    public function __construct()
    {
        $params=array('host'=>'localhost','user'=>'root','password'=>'','db_name'=>'lemon_tsn');
        // Устанавливаем соединение
        $dsn = "mysql:host={$params['host']};dbname={$params['db_name']};charset=utf8";
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        try {
            $this->db = new PDO($dsn, $params['user'], $params['password'], $opt);
        } catch (PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
        }

    }

    public function getDb()
    {
        return $this->db;
    }
    public function showUser(){
        $sql="SELECT * FROM `users`";
        return $this->db->query($sql)->fetch();
    }
}

function pdoSet($allowed, &$values, $source = array()) {
    $set = '';
    $values = array();
    if (!$source) $source = &$_POST;
    foreach ($allowed as $field) {
        if (isset($source[$field])) {
            $set.="`".str_replace("`","``",$field)."`". "=:$field, ";
            $values[$field] = $source[$field];
        }
    }
    return substr($set, 0, -2);
}
$_POST['first_name'] ='first_name';
$_POST['second_name'] ='second_name';
$_POST['surname'] ='surname';
$_POST['email'] ='email2';
$allowed = array("first_name","surname","email"); // allowed fields

$test = new DB();
$sql = "UPDATE users SET ".pdoSet($allowed,$values)." WHERE id = :id";
//$stm = $test->prepare($sql);
$stm = $test->getDb()->prepare($sql);
$values["id"] = 28;
$stm->execute($values);

$ar=$test->showUser();
var_dump($ar);