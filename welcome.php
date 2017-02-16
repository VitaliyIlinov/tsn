<?php if(isset($_COOKIE['login']) and isset($_COOKIE['id'])):?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script src="main.js"></script>
</head>
<body>
<div class="top-menu">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 hidden-lg hidden-md text-right">
                <button type="button" class="btn-menu click-op" data-toggle=".top-menu-mobile">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
            <div class="clearfix top-menu-mobile">
                <div class="col-lg-2 col-md-1 col-sm-12 col-xs-12">
                    <a href="/" class="logo"></a>
                </div>
                <div class="col-lg-10 col-md-11 col-sm-12 col-xs-12">
                    <ul class="main-top-menu">
                        <li><a href="/">Головна</a></li>
                        <li><a href="/">Правила та реєстрація</a></li>
                        <li><a href="/">Анонс матчу Хорватія-Україна</a></li>
                        <li><a href="/">Про проект</a></li>
                    </ul>
                    <ul class="social">
                        <li><a href="#" class="ico-fb">32</a></li>
                        <li><a href="#" class="ico-vk">1</a></li>
                        <li><a href="#" class="ico-tw"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-fon-xs"></div>
<div class="container-fluid wel-middle">
    <div class="row">
        <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 col-xs-offset-0 col-sm-12">
            <form method="post" id="birthday" action="/form.php">
                <div class="col-xs-12">
                    <h4 class="text-center wel-h4">Долучайтесь до проекту акції!</h4>
                </div>
                <div class="col-xs-12">
                    <p class="text-center wel-span">Вкажіть, будь ласка дату народження</p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-tsn-bd">
                        <input type="number" min="1" max="31" id="date" name="date" placeholder="Дата" required>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-tsn-bd">
                        <input type="number" min="1" max="12"  id="month" name="month" placeholder="Місяць" required>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-tsn-bd">
                        <input type="number" min="1930" max="2020"  id="year" name="year" placeholder="Рік"  required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-tsn form-tsn-bd text-center ">
                        <input type="submit" name="age" value="Продовжити">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        function get_current_age(date) {
            return ((new Date().getTime() - new Date(date)) / (24 * 3600 * 365.25 * 1000)) | 0;
        }

        $('.click-op').on('click', function () {
            $(this).toggleClass('active');
            var click = $(this).attr('data-toggle');
            $(click).slideToggle('slow');
        });

        $('form#birthday').submit(function(){
            var date=$(this).find('#date').val();
            var month=$(this).find('#month').val();
            var year=$(this).find('#year').val();
            var age=year+'-'+month+'-'+date;
            if((get_current_age(age))<18){
                alert('Вам меньше 18. Вход с 18');
                return false;
            }else{
                return true;
            }

        });
    })
</script>
</body>
</html>
<?php else: ?>
    <h3>Sorry,there no cookie</h3>
    <a href="/">To main</a>
<?php endif;?>