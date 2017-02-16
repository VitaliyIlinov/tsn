<?php
ini_set('display_errors', 1);
require "classes/autoload.php";
require "config/config.php";
$host = $_SERVER['HTTP_HOST'];
$connection = new Db();
$user = new Users($connection->getDb());

function showMessage($message){
    $layout='<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">';
    $layout.='<link rel="stylesheet" href="main.css">';
    $layout.='<div class="bg-fon-xs"></div>';
    $layout.='<div class="container-fluid wel-middle text-center show-message">';
    $layout.="<p>$message</p>";
    $layout.='</div>';
    return $layout;
}
if (isset($_POST['submit'])) {
    if ($user->insert($_POST)) {
        $id = md5((Config::get('salt') . $user->last_id()));
        $to = $_POST['email'];
        $subject = "=?UTF-8?B?".base64_encode('Подтверждение регистрации')."?=";
        $message = "Здравствуйте! Спасибо за регистрацию! \n Ваш логин: " . "\n Чтобы активировать ваш аккаунт, перейдите по ссылке:\n" .
            "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'] . "?login=" . $_POST['email'] . "&act=" . $id . "\n\n
            С уважением, 1+1";//содержание сообщение

        $headers = 'From: ilinov1234@mail.ru' . "\r\n";
        if (mail($to, $subject, $message, $headers)) {
            setcookie("message", 'На Ваш E-mail выслано письмо с cсылкой, для активации вашего аккаунта.');
        } else {
            setcookie("message", 'Почта не отправилась');
        }
        header("Location: http://$host/show.php");
    }
}
if (isset($_POST['ajax_email'])) {
    echo($user->checkEmail($_POST['ajax_email']));
    die;
}
if (isset($_GET['login']) and isset($_GET['act'])) {
    $act = $_GET['act'];
    $login = $_GET['login'];
    if ($id = $user->getIdByEmail($login)) {
        $hash = md5((Config::get('salt') . $id));
        if ($hash == $act) {
            if ($user->activateUser($id)) {
                setcookie("login", $login);
                setcookie("id", $act);
                header("refresh: 3; url=http://$host/welcome.php");
                echo showMessage ('Спасибо за регистрацию.Вас перекинет через 3сек ');
            }else{
                echo showMessage('Cannot activate or you already activated');
            }
        }
    } else {
        echo showMessage('Sorry, there is no login');
    }
}
if (isset($_POST['age'])) {
    $birthday=$_POST['year'].$_POST['month'].$_POST['date'];
    $id = $user->getIdByEmail($_COOKIE['login']);

    if(!$user->updateAge($id,$birthday)){
        echo showMessage('Не удалось обновить дату рождения');
       exit();
    };
    setcookie("age", $birthday);
    header("Location: http://$host/add_question.php");
}

if (isset($_POST['add_question'])) {
    $id = $user->getIdByEmail($_COOKIE['login']);
    if($user->updateUser($id,$_POST)){
        echo showMessage('Данные удачно сохранены');
    }else{
        echo showMessage('Произошла ошибка сохранения');
    }
}