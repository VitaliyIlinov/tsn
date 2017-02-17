<?php
include "form.php";
if (isset($_COOKIE['login']) and !$user->checkEmail($_COOKIE['login']) and isset($_COOKIE['id']) and isset($_COOKIE['age'])):?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>RegForm</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
              integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
              crossorigin="anonymous">
        <link rel="stylesheet" href="main.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
                integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
                crossorigin="anonymous"></script>
        <script src="main.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
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
    <img src="img/regestraciy_virni_mob.png" class="img-responsive visible-xs">
    <div class="container pos-middle">
        <div class="row bg-wheat-xs">
            <form method="post" action="/form.php" class="f-min-height">
                <div class="col-lg-5 col-md-6 col-lg-offset-1 col-md-offset-0 col-sm-12 col-xs-12">
                    <div class="form-tsn">
                        <label for="years_sup_football">Скільки років ви вже активно вболіваєте за збірну України з
                            футболу?</label>
                        <input type="text" id="years_sup_football" name="years_sup_football">
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                    <div class="form-tsn ">
                        <p>Наявність закордонного паспорту з терміном дії не менш ніж до 01.10.2017 і двома чистими
                            сторінками (так/ні)</p>
                        <div class="radio">
                            <input id="foreign_passport_yes" type="radio" name="foreign_passport" value="yes">
                            <label for="foreign_passport_yes">Так</label>
                            <input id="foreign_passport_no" type="radio" name="foreign_passport" checked value="no">
                            <label for="foreign_passport_no">Ні</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-lg-offset-1 col-md-offset-0 col-sm-12 col-xs-12">
                    <div class="form-tsn">
                        <p>Чи підтримували ви збірну на матчах закордоном?</p>
                        <div class="radio">
                            <input id="sup_in_foreign_country_yes" type="radio" checked name="sup_in_foreign_country"
                                   value="yes">
                            <label for="sup_in_foreign_country_yes">Так</label>
                            <input id="sup_in_foreign_country_no" type="radio" name="sup_in_foreign_country" value="no">
                            <label for="sup_in_foreign_country_no">Ні</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                    <div class="form-tsn visible" id="shengen">
                        <p>Наявність відкритої діючої багаторазової шенгенської візи дійсної мінімум до 01.04.2017
                            (так/ні)</p>
                        <div class="radio">
                            <input id="shengen_visa_yes" type="radio" name="shengen_visa" value="yes">
                            <label for="shengen_visa_yes">Так</label>
                            <input id="shengen_visa_no" type="radio" name="shengen_visa" value="no">
                            <label for="shengen_visa_no">Ні</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-lg-offset-1 col-md-offset-0 col-sm-12 col-xs-12">
                    <div class="form-tsn">
                        <label for="matches">Якщо так, зазначте будь ласка поєдинки збірної поза межами України які ви
                            відвідали</label>
                        <input type="text" id="matches" name="matches">
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                    <div class="form-tsn visible" id="visa">
                        <p>Готовий(а) самостійно за власний кошт відкрити необхідні візи (так/ні)</p>
                        <div class="radio">
                            <input id="visa_own_yes" type="radio" name="visa_own" value="yes">
                            <label for="visa_own_yes">Так</label>
                            <input id="visa_own_no" type="radio" name="visa_own" value="no">
                            <label for="visa_own_no">Ні</label>
                        </div>
                    </div>
                </div>
                <div class="clearfix visible-lg-block visible-md-block"></div>
                <div class="col-lg-5 col-md-6 col-lg-offset-1 col-md-offset-0 col-sm-12 col-xs-12">
                    <div class="form-tsn">
                        <label for="fb_in_your_life">Що для вас фублол у вашому житті?</label>
                        <input type="text" id="fb_in_your_life" name="fb_in_your_life">
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                    <div class="form-tsn visible">
                        <p>Хочу поїхати з ночівлею,готовий додатково доплатити за таку операцію</p>
                        <div class="radio">
                            <input id="lodging_with_pay_yes" type="radio" name="lodging_with_pay" value="yes">
                            <label for="lodging_with_pay_yes">Так</label>
                            <input id="lodging_with_pay_no" type="radio" name="lodging_with_pay" value="no">
                            <label for="lodging_with_pay_no">Ні</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-lg-offset-1 col-md-offset-0 col-sm-12 col-xs-12">
                    <div class="form-tsn">
                        <label for="fb_support">На вашу думку, справжня підтримка збірної це</label>
                        <input type="text" id="fb_support" name="fb_support">
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                    <div class="form-tsn visible">
                        <p>Хочу без ночівлі та додаткових платежів</p>
                        <div class="radio">
                            <input id="lodging_without_pay_yes" type="radio" name="lodging_without_pay" value="yes">
                            <label for="lodging_without_pay_yes">Так</label>
                            <input id="lodging_without_pay_no" type="radio" name="lodging_without_pay" value="no">
                            <label for="lodging_without_pay_no">Ні</label>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-tsn text-center ">
                        <input type="submit" name="add_question" value="Зареєструватись">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.click-op').on('click', function () {
                $(this).toggleClass('active');
                var click = $(this).attr('data-toggle');
                $(click).slideToggle('slow');
            });
            $('input:radio[name!=sup_in_foreign_country]').change(function (e) {
                var $target = $(this).attr('name');
                var $val = $(this).val();
                switch ($target) {
                    case 'foreign_passport':
                        if ($val == 'yes') {
                            $('input:radio[name=shengen_visa]').parents('.form-tsn').css('visibility', 'visible');
                        } else {
                            $('input:radio[name=shengen_visa]').prop('checked', false).parents('.form-tsn').css('visibility', 'hidden');
                            $('input:radio[name=visa_own]').prop('checked', false).parents('.form-tsn').css('visibility', 'hidden');
                            $('input:radio[name=lodging_with_pay]').prop('checked', false).parents('.form-tsn').css('visibility', 'hidden');
                            $('input:radio[name=lodging_without_pay]').prop('checked', false).parents('.form-tsn').css('visibility', 'hidden');
                        }
                        break;
                    case 'shengen_visa':
                        if ($val == 'yes') {
                            $('input:radio[name=lodging_with_pay]').parents('.form-tsn').css('visibility', 'visible');
                            $('input:radio[name=lodging_without_pay]').parents('.form-tsn').css('visibility', 'visible');
                            $('input:radio[name=visa_own]').prop('checked', false).parents('.form-tsn').css('visibility', 'hidden');
                        } else {
                            $('input:radio[name=visa_own]').parents('.form-tsn').css('visibility', 'visible');
                            $('input:radio[name=lodging_with_pay]').prop('checked', false).parents('.form-tsn').css('visibility', 'hidden');
                            $('input:radio[name=lodging_without_pay]').prop('checked', false).parents('.form-tsn').css('visibility', 'hidden');
                        }
                        break;
                    case 'visa_own':
                        if ($val == 'yes') {
                            $('input:radio[name=lodging_with_pay]').parents('.form-tsn').css('visibility', 'visible');
                            $('input:radio[name=lodging_without_pay]').parents('.form-tsn').css('visibility', 'visible');
                        } else {
                            $('input:radio[name=lodging_with_pay]').prop('checked', false).parents('.form-tsn').css('visibility', 'hidden');
                            $('input:radio[name=lodging_without_pay]').prop('checked', false).parents('.form-tsn').css('visibility', 'hidden');
                        }
                        break;
                    case 'lodging_with_pay':
                        break;
                    case 'lodging_without_pay':
                        break;
                }
            });
        });
    </script>
    </body>
    </html>
<?php else: ?>
    <?php setcookie("message", 'Вибачте,немає cookie або помилковий email<a href="/">На головну</a>'); ?>
    <?php header("Location: http://$host/show.php"); ?>
<?php endif; ?>