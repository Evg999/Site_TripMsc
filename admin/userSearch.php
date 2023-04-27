<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php'); // дальнейшее выполнение кода не имеет значения
//print_r($_GET) масив есть но он пуст 

// проверяем на пустоту.если не пуст то выполняем действия. возвращяем объект сколько строк
if(!empty($_GET)){
// $query = "SELECT * FROM `users` WHERE `user_name` = '{$_GET['search']}'"; выводит только точные совпадения
// или LIKE (лучше выводит все совпадения с словом ) позволяет искать по кусочку строки, знак % означает (всё что угодно) два знака процента искать во всей строке%%
   //коньюнкция и дезъюнкция && AND (и),|| OR(ИЛИ)

    // $query = "
    //         SELECT * 
    //         FROM `users` 
    //         WHERE `user_name` 
    //         LIKE '%{$_GET['search']}%'
    //         OR `user_email` 
    //         LIKE '%{$_GET['search']}%'
    //         OR `user_phone` 
    //         LIKE '%{$_GET['search']}%'
    //     ";

    // хотим подъсоеденить доп таблицу с вопросами пользовател. 
    // будем соеденять две таблице вместе 
    // идем в php  по средства столбика id
    //"SELECT `users`. * " какие данные берём из первой таблице(все поля из тоблицы 1 `users`) синтексис если перечесляем поля (папака-поле)( `users`. `user_email` )    ...)
    // AS (псевдоним) если в разных таблицах схожее название используем их( `users`. `user_email` AS `userName` )
    //ПЕРЕЧИСЛЕЛИ ПОЛЯ ИЗ ГЛАВНОЙ ТАБЛИЦЫ КОТОРЫЕ НАМ НУЖНЫ И ДАЛИ ПСЕВДОНИМЫ
    // ПОСЛЕ ПРИСОЕДЕНЯЕМ ТАБЛИЦУ НИЖЕ  или так же можно перечесять как и первую
    // ПОСЛЕ FROM  ОТ КУДА МЫ ВСЁ ВЫБИРАЕМ (имя главной таблицы)

    // дальше команда присоеденить 
    // LEFT JOIN(присоеденя пустоты то же отображаюься)  выбирает все строчки даже если данных там нет
    // (есть так же 
    // RIGHT JOIN присоеденяем,  если пары нет то и мы ОТОБРАЗИМ НЕ ЧЕГО
    // INNER JOIN)какую таблицу указываем , присоеденяем если и вправой и влевой таблице есть вхождение запроса.

    // после на каком основание ON на основание id в БД
    // FROM и WHERE относяться к первой таблице по каторой будет совершён поиск(из который мвы начнём поиск) WHERE на каких условиях видёться поиск

    // если вдруг нужно присоеденить ещё одну таблицу добовляем условие 
    // LEFT JOIN `question`
    // ON `users`.`id` =`question`.`user_id`

    // после проверяем наш запрос и (можно вставить есго в php admin -> SCQL (не забыть мы не вводили не чего вместо '%{$_GET['search']}% подставить '%катя% -> поля изменили названия в соответсвии с псевдонимом в HTML переименовывать нужно на новые))
    $query ="SELECT `users`. `user_name` AS `userName`, 
                    `users`. `user_email` AS `userEmail`, 
                    `users`. `id` AS `userId`, 
                    `users`. `user_phone`AS `userPhone`, 
                    `users`. `created_at` AS `userCreated`,
                    `questions`.*
            FROM `users`
            RIGHT JOIN `questions`
            ON `users`.`id` =`questions`.`user_id`
            WHERE `user_name` LIKE '%{$_GET['search']}%' 
            OR `user_email` LIKE '%{$_GET['search']}%'
            OR `user_phone` LIKE '%{$_GET['search']}%'
        ";

    $result = mysqli_query($link, $query);

    print_r($result);
}



// страница вывода
include($_SERVER['DOCUMENT_ROOT'] . '/inc/head.php');
include($_SERVER['DOCUMENT_ROOT'] . '/inc/top.php');
include($_SERVER['DOCUMENT_ROOT'] . '/inc/header.php');
?>

<main class='wrapper'>
    <h1>Поиск по клиентам</h1>
    <form action="userSearch.php" method="GET">

        <input type="text" name="search">
        <input type="submit" value="найти">
    </form>
    <!-- если масив ГЕТ не пустой выводим -->
    <?php if(!empty($_GET)):?>
        <h2>Результаты поиска</h2>
        <div class="result">
            <div class="result-row">
                <div class="result-row-item">№</div>
                <div class="result-row-item">ФИО</div>
                <div class="result-row-item">Телефон</div>
                <div class="result-row-item">E-mail</div>
                <div class="result-row-item">Дата регестрация</div>
                <div class="result-row-item">Вопросы пользователя</div>
            </div>
            <?php while($row = mysqli_fetch_assoc($result)):?>
                <div class="result-row">
                    <div class="result-row-item"><?=$row['userId'] ?></div>
                    <div class="result-row-item"><?=$row['userName'] ?></div>
                    <div class="result-row-item"><?=$row['userPhone'] ?></div>
                    <div class="result-row-item"><?=$row['userEmail'] ?></div>
                    <div class="result-row-item"><?=$row['userCreated'] ?></div>
                    <div class="result-row-item"><?=$row['questions'] ?></div>
                </div>
            <?php endwhile;?>
            <div class="result-row"></div>
            <div class="result-row"></div>
        </div>
    <?php endif;?>
</main>";

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/inc/footer.php');
?>