<?php
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        <title>Контакты</title>
        <link rel="stylesheet" href="/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
    </head>
    <body>    
    <?php
        include('../inc/header.php')
    ?>
    <div class="blok-slider">
        <div class="slider">
            <div class="slider-moscow-contakt">
                <div class="dark"></div>
            </div>
        </div>  
    <?php
        include('../inc/title.php')
    ?>     
    <section class="wrapper">
        <p class="kont">Контакты </p>
        <p class="bolt">
            Мы - команда тех, кто любит историю и любит Москву.
        </P>   
        <p class="bolt">
            Москва – это не только место по «заколачиванию денег» и «взращиванию карьеры», 
            а еще и бесконечно красивые памятники природы, заказники, парки, заповедники. 
            Активный отдых в Москве и Подмосковье – это отличная возможность вырваться из душного 
            мегаполиса куда-нибудь в «дебри», навстречу приключениям. К счастью, не все Подмосковье еще 
            «облагорожено» асфальтными дорожками и высоченными коттеджными заборами. Еще встречаются места,
            настолько глухие и далекие, что, очутившись там, кажется, что ты – первый человек, ступивший на 
            эту землю.
       </p>  
        <p class="bolt">
            Там, где не проедет автомобилист и даже велосипедист, найдет лазейку и откроет для 
            себя все красоты 100% бездорожья турист, проводящий свой активный отдых в Подмосковье.
        </p>
        <div class="allBoss">
            <div class="ComonleftRight">
                <img id="photo" src="/photoTwo/man.jpg" alt="">
                <div class="man-text">
                    <p>Александр Рыбаков</p>
                    <p class="font">директрор</p>
                    <p>По всем вопросам пишите на почту</p>
                    <p class="color">rybakov@mymoscow.ru</p>
                </div>
            </div>
            <div class="ComonleftRight">
                <img id="photo" src="/photoTwo/woman.jpg" alt="">
                <div class="man-text">
                    <p>Елена Белкина</p>
                    <p class="font">руководитель корпоративного отдел</p>
                    <p>По всем вопросам пишите на почту</p>
                    <p class="color">belkina@mymoscow.ru</p>
                </div>
            </div>
        </div>
        <div class="wrapper_cont">
            <div class="adress">
                <div class="com">
                    <img src="/photo/placeholder.png" alt="">
                    <div>
                        <p>Москва,</p>
                        <p>Большая Спасская 12</p>
                    </div>
                </div>
                <div class="com">
                    <img src="/photo/mail.png" alt="">
                    <div>
                        <p>E-mail:</p>
                        <p>info@mymoscow.ru</p>
                    </div>
                </div>
                <div class="com">
                    <img src="/photo/telephone.png" alt="">
                    <div>
                        <p>Телефон:</p>
                        <p>8(495) 777 77 77</p>
                    </div>
                </div>
            </div>
            <div class="form">
                <p>Напишите нам</p>
                <form method="POST" action="/handlers/register.php" autocapitalize="off">
                    <div class="forma_one">
                        <div class="form-item">
                            <input list="names" type="text" name="UserName" placeholder="ФИО"> 
                        </div>
                        <div class="form-item">
                            <input type="email" name="email" placeholder="Email">
                        </div>
                        <textarea name="texts" placeholder="Ваше сообщение"></textarea>
                        <div class="form-item">
                        <input type="submit" value="ОТПРАВИТЬ ВОПРОС">
                        </div>
                    </div>
            </form>
            </div>
        </div>
        
    </section>
    <div class="map">
            <div class="karta"></div>
        </div>
    <?php
        include('../inc/footer.php')
    ?>
        <?php
    include('../inc/script.php')
    ?>