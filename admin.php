<?php
include "form.php";
$data = $user->showUser();
$cnt = count($data);
session_start();
//unset($_SESSION['admin']);
//$pass='admin_access';
//$hash=md5(Config::get('salt').$pass);
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
</head>
<body>
<?php
if(isset($_POST['admin_sub']) && !empty($_POST['admin_login']) && !empty($_POST['admin_pass'])):?>
    <?php $hash_pass=md5(Config::get('salt').$_POST['admin_pass']);?>
    <?php if($user->checkAdmin($_POST['admin_login'],$hash_pass)): ?>
        <?php $_SESSION['admin']=$hash_pass;?>
   <?php endif;?>
<?php endif;?>

<?php if(isset($_SESSION['admin'])):?>
    <div class="container-fluid">
        <table class="table table-bordered">
            <thead>
            <tr>
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
            <?php foreach ($data as $key => $value): ?>
                <tr>
                    <td><?=$value['id'];?></td>
                    <td><?=$value['first_name'];?></td>
                    <td><?=$value['surname'];?></td>
                    <td><?=$value['second_name'];?></td>
                    <td><?=$value['phone'];?></td>
                    <td><?=$value['email'];?></td>
                    <td><?=$value['city'];?></td>
                    <td><?=$value['citizen'];?></td>
                    <td><?=$value['link_fb'];?></td>
                    <td><?=$value['password'];?></td>
                    <td><?=$value['birthday'];?></td>
                    <td><?=$value['foreign_passport'];?></td>
                    <td><?=$value['shengen_visa'];?></td>
                    <td><?=$value['visa_own'];?></td>
                    <td><?=$value['lodging_with_pay'];?></td>
                    <td><?=$value['lodging_without_pay'];?></td>
                    <td><?=$value['years_sup_football'];?></td>
                    <td><?=$value['fb_support'];?></td>
                    <td><?=$value['fb_in_your_life'];?></td>
                    <td><?=$value['sup_in_foreign_country'];?></td>
                    <td><?=$value['create_date'];?></td>
                    <td><?=$value['edit_date'];?></td>
                    <td>
                        <a href="/form.php?del_user=<?= $value['id'] ?>" onclick="return confirmDelete();">
                            <button class="btn btn-sm btn-warning">delete</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else:?>
    <div class="container">
        <form method="post" action="">
            <div class="form-group">
                <label for="admin_login">Login</label>
                <input type="text" name="admin_login" class="form-control" required id="admin_login" placeholder="login">
            </div>
            <div class="form-group">
                <label for="admin_pass">Password</label>
                <input type="password" name="admin_pass" class="form-control" required id="admin_pass" placeholder="Password">
            </div>
            <button type="submit" name="admin_sub" class="btn btn-default">Submit</button>
        </form>
    </div>
<?php endif;?>
<script>
    function confirmDelete() {
        if (confirm("delete this item?")) {
            return true;
        } else {
            return false;
        }
    }
</script>
</body>
</html>