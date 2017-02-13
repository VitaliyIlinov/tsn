<?php

class Db{

    public function __construct(){
        // Получаем параметры подключения из файла

        $params = array('host'=>'localhost','user'=>'root','password'=>'','db_name'=>'lemon_tsn');
        // Устанавливаем соединение
        $dsn = "mysql:host={$params['host']};dbname={$params['db_name']};charset=utf8";
        $opt = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        $db = new PDO($dsn, $params['user'], $params['password'],$opt);
        return $db;
    }
}
$connection = new PDO('mysql:host=localhost;dbname=lemon_tsn;charset=utf8', 'root', '');

//foreach($connection->query('SELECT * FROM users') as $row) {
//    echo $row['first_name'];
//}
$stmt = $connection->query('SELECT * FROM users');
var_dump($stmt);
while ($row = $stmt->fetch())
{
    echo $row['first_name'] . "\n";
}