<!-- SQL - реляционные(MySQL(MariaDB),PostgreSQL) вертикальное масштабирование
     NoSQL - нереляционные (MongoDB) горизонтальное маштабирование  -->
     <!-- INT целочисленные запросы -->
     <!-- Varchar однострочные текстовые данные
     text многострочные текст
     date определяет дату в формате год\месяц\день -->
<?php
    //  $db_host = 'localhost';

    // define('DB_HOST', 'root');
    const DB_HOST= 'localhost';
    const DB_USER = 'zzzvas3d_eshop';
    const DB_PASS = '3ZqQDaAr';
    const DB_NAME = 'zzzvas3d_eshop';

    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    mysqli_set_charset($link, 'utf8');

    $result = mysqli_query($link, "SELECT `pic`, `header`, `text` FROM `offers`");

    $resultone = mysqli_query($link,"SELECT `photo`, `name`, `text_feedback` FROM `feedback`");

    mysqli_close($link);

    //PDO

    // $row = mysqli_fetch_assoc($result); // преводим к асациативному масиву
    // while($row = mysqli_fetch_assoc($result))
        // print_r($row);
    
    // print_r($result ->num_rows);
?>

<?php
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        <title>Необычная Москва</title>
        <link rel="stylesheet" href="/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
    </head>
<body>
        <?php
            include('inc/header.php')
        ?>
        <div class="blok-slider">
        
            <div class="slider">
                <div class="slider-moscow">
                    <div class="dark"></div>
                </div>
                <div class='slider-moscow'>
                    <div class="dark"></div>
                </div>
                <div class='slider-moscow'>
                    <div class="dark"></div>
                </div>
                <div class='slider-moscow'>
                    <div class="dark"></div>
                </div>
            </div>      
        <?php
            include('inc/titleBtnStrelka.php')
        ?> 
    <section class="wrapper">
        <div class="service">
            <h2 class="service_title">Что мы предлагаем?</h2>
            <p class="service_text">
                Наша главная цель - рассказать о Москве так, 
                чтобы это было интересно всем!
            </p>
        </div>
            <div class="bloks">
                <?php while($row = mysqli_fetch_assoc($result)):?>
                    <div class="bloks-item">
                        <img src="<?= $row['pic'] ?>" alt="">
                        <div class="text">
                            <h3><?= $row['header'] ?></h3>
                            <p>
                            <?= $row['text'] ?>
                            </p>
                        </div>
                    </div>
                <?php endwhile;?>
            </div>
        
    </section>
    <section class="blockAbout wrapper-about" id="about">
        <div class="img-group"></div>
        <div class="about-us">
            <h2 class="who">Кто Мы Такие</h2> 
            <p> 
                Мы - команда тех, кто любит историю и любит Москву.
                Москва – это не только место по «заколачиванию денег» и «взращиванию карьеры», 
                а еще и бесконечно красивые памятники природы, заказники, парки, заповедники. 
                Активный отдых в Москве и Подмосковье – это отличная возможность вырваться из 
                душного мегаполиса куда-нибудь в «дебри», 
                навстречу приключениям. К счастью, не все Подмосковье еще «облагорожено» асфальтными дорожками 
                и высоченными коттеджными заборами. Еще встречаются места, настолько глухие и далекие, что, 
                очутившись там, кажется, что ты – первый человек, ступивший на эту землю.
            </p>
            <p> 
                Затем неожиданно поступит сообщение о том, что где-то в Москва-Сити заложено взрывное 
                устройство. На поиски источника опасности будут направлены экскурсанты, которые уже
                прекрасно знают комплекс и должны справиться с этой нелегкой задачей.  
            </p>
            <a class="button" href="#">Подробнее о нас</a>
        </div>
    </section>
    <section>
        <div class="moscow-text">
            <h2>Москва в фотографиях</h2>
            <div class="stick"></div>
            <p>Проще всего рассказать обо всем в фотографиях. 
                Смотрите наши фотоотчеты и присылайте нам свои фотографии.
            </p>
        </div>
        <div class="block-img">
            <img src="/photo/1.jpg" alt="" class="img-moscow">
            <img src="/photo/2.jpg" alt="" class="img-moscow">
            <img src="/photo/3.jpg" alt="" class="img-moscow">
            <img src="/photo/4.jpg" alt="" class="img-moscow">
            <img src="/photo/5.jpg" alt="" class="img-moscow">
            <img src="/photo/6.jpg" alt="" class="img-moscow">
            <img src="/photo/7.jpg" alt="" class="img-moscow">
            <img src="/photo/8.jpg" alt="" class="img-moscow">
        </div>    
    </section>
    <section class="feedback">
        <h2>Отзывы</h2>
        <div class="stick-two"></div>
            <div class="common-feedback">
                <?php while($rowone = mysqli_fetch_assoc($resultone)):?>
                    <div class="first-feedback">
                        <p class="text-feedback">
                        <?= $rowone['text_feedback'] ?>
                        </p>
                        <div class="name">
                            <img src="<?= $rowone['photo'] ?>" alt="" class="photo">
                            <p><?= $rowone['name'] ?></p>
                        </div>
                    </div>
                <?php endwhile;?> 
            </div>
    </section>
    <section class="wright-for-us">
        <div class="wrapper-two">
            <h2>Напишите нам</h2>
            <div class="stick-three"></div>
            <form method="POST" action="/handlers/register.php" autocapitalize="off">
                <div class="forma">
                    <div class="form-item">
                        <input list="names" type="text" name="UserName" placeholder="ФИО"> 
                    </div>
                    <div class="form-item">
                        <input type="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-item">
                        <input type="number" name="number" placeholder="Телефон">
                    </div>
                </div>
                <div class="forma">
                    <div class="form-item">
                        <textarea name="texts" placeholder="Ваше сообщение"></textarea>
                    </div>
                </div>
                <input type="submit" value="ОТПРАВИТЬ ВОПРОС">
            </form>
        </div>
    </section>
    <?php
    include('inc/footer.php')
    ?>
    <?php
    include('inc/script.php')
    ?>