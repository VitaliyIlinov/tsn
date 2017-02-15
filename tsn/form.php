<?php
ini_set('display_errors', 1);
require "classes/autoload.php";
require "config/config.php";

$connection = new Db();
$user = new Users($connection->getDb());

if (isset($_POST['submit'])) {
    if ($user->insert($_POST)) {
        $id = md5(Config::get('salt').$user->last_id());
        $to = "ilinov123@ukr.net";
        $subject = "Подтверждение регистрации";

        $message = "Здравствуйте! Спасибо за регистрацию! \n Ваш логин: " . "\n Чтобы активировать ваш аккаунт, перейдите по ссылке:\n".
            $_SERVER['PHP_SELF']."?login=" . $_POST['email'] . "&act=" . $id . "\n\n
            С уважением, 1+1";//содержание сообщение

        $headers = 'From: ilinov1234@mail.ru' . "\r\n";
        if (mail($to, $subject, $message, $headers)) {
            echo "На Ваш E-mail выслано письмо с cсылкой, для активации вашего аккуанта.";
        } else {
            echo 'no mail';
        }
    }

}

if(isset($_GET['login']) and isset($_GET['act'])){
    $act = md5($_GET['act']);
    $login = $_GET['login'];
    if($user->checkActivate($login)==$act){
        $user->activateUser($user->checkActivate($login));
        header("Location: http://tsn/");
    }else{
        echo 'Sorry';
    }
}
//echo "<pre>";
//while ($row = $all_users->FETCH(PDO::FETCH_ASSOC))
//{
//    print_r($row);
//}
//echo "</pre>";
//$stmt = $connection->prepare("SELECT * FROM users WHERE id=?");
//var_dump($stmt);
//$stmt->execute(array($_GET['id']));
//$stmt->fetch(PDO::FETCH_ASSOC);
//foreach($connection->getUsers() as $row) {
//    echo $row['first_name'];
//}
//
