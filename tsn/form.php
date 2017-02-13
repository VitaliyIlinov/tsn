<?php
ini_set('display_errors', 1);
require "classes/autoload.php";
require "config/config.php";

$connection = new Db();
$all_users = $connection->getUsers();
while ($row = $stmt->fetch())
{
    echo $row['first_name'] . "\n";
}
//foreach($connection->getUsers() as $row) {
//    echo $row['first_name'];
//}