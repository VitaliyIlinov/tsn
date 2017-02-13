<?php

namespace my\db;
class Db {

    static function getConnection(){
        $db = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
    }
    private function getConfig (){
        $paramsPath = ROOT . '/config/db_params.php';
    }
}