<?php

class Db
{
    protected $connect=null;
    public function __construct() {
        // Получаем параметры подключения из файла
        $params = Config::get('db_connection');
        // Устанавливаем соединение
        $dsn = "mysql:host={$params['host']};dbname={$params['db_name']};charset=utf8";
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        $this->connect = new PDO($dsn, $params['user'], $params['password'], $opt);
    }

    public function getUsers()
    {
        return $this->connect->query('SELECT * FROM users');
    }
}
