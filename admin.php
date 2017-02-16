<?php
include "form.php";
$data = $user->showUser();
$cnt = count($data);
//echo "<pre>";
//print_r($data);
//echo "</pre>";
//echo $cnt;
//for ($i = 0; $i < $cnt; $i++) {
//    foreach ($data[$i] as $key=>$value) {
//        echo $value;
//    }
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RegForm</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script src="main.js"></script>
</head>
<body>
<div class="container-fluid">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>Ім’я</th>
            <th>Прізвище</th>
            <th>По-батькові</th>
            <th>Телефон</th>
            <th>email/login</th>
            <th>Город</th>
            <th>Гражд.</th>
            <th>Фб</th>
            <th>Пароль</th>
            <th>ДР</th>
            <th>Загр.пас</th>
            <th>Шенг.виза</th>
            <th>Виза_собст</th>
            <th>Ноч_за свои</th>
            <th>Ноч_без_платы</th>
            <th>Лет_поддержка</th>
            <th>Поддержка</th>
            <th>Фут_в_жизни</th>
            <th>Поддержка_загр</th>
            <th>Матчи</th>
            <th>Создание</th>
            <th>Редакт.</th>
        </tr>
        </thead>
        <tbody>
        <?php for($i = 0; $i < $cnt; $i++) : ?>
            <tr>
                <th scope="row"><?=$i+1;?></th>
                <?php foreach ($data[$i] as $key => $value): ?>
                    <td><?=$value; ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endfor; ?>
        </tbody>
    </table>
</div>
</body>
</html>