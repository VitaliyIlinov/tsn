<?php

class Db {
    private $db=false;

    public function __construct() {
        // Получаем параметры подключения из файла
        $params = Config::get('db_connection');
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

    public function getDb(){
        return $this->db;
    }

    function __destruct(){
        $this->db = false;
    }
}
