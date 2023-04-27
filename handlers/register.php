<?php

//Логика
// const DB_HOST= 'localhost';
// const DB_USER = 'root';
// const DB_PASS = '';
// const DB_NAME = 'web_course_online';

// $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// mysqli_set_charset($link, 'utf8');

// include($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php'); // дальнейшее выполнение кода не имеет значения

// include_once(); подключить единыжды
// require_once(); подключить единыжды
// print_r($_POST);

// SELECT Проверка данных формы выбрать или получить
// INSERT INTO  добавляем в БД(вставить запись в БД) ((таблица) в которую хотим что то вставить, после (поля в этой таблице) и какое (значение))
// UPDATE - обновить базу в БД



// $query = "INSERT INTO `orders`(`UserName`, `number`, `email`, `texts`, `created_at` ) VALUES('{$_POST['UserName']}', '{$_POST['number']}', '{$_POST['email']}', '{$_POST['texts']}' , CURRENT_TIMESTAMP() );";
// $result = mysqli_query($link, $query);

// проверка наличия пользователя в БД
// SELECT
// WHERE
// SELECT FROM table WHERE


// Проверка на наличие пользователя в БД(id не заполняем)
$presence = mysqli_query( $link, "SELECT `id`, `user_name`, `user_phone`, `user_email` 
                                    FROM `users` 
                                    WHERE `user_name` = '{$_POST['UserName']}' OR `user_phone` = '{$_POST['number']}' OR `user_email` ='{$_POST['email']}' ");
$result = true;
$info = '';
// добавляем строку в БД в таблицу USERS
// mysqli_num_rows возвращяет количество найденных строчек
// есл кол-во строчек не равняеться 0 то мы что то нашли
if(mysqli_num_rows($presence) !=0 ){

    // превращяем ответ $presence в асациотивный масив
    $user = mysqli_fetch_assoc($presence);
    // получаем индефикатор и идём в question
    $userID = $user['id']; // записываем юзер ID в переменную

    // добавляем строку в таблицу question
    $query = "
        INSERT INTO `questions` (`user_id`, `questions`) 
        VALUES ('$userID', '{$_POST['texts']}');
    ";
    $resultInsertQuestion = mysqli_query($link, $query);


    
}else{
    $query = "
        INSERT INTO `users` ( `user_name`, `user_phone`, `user_email` ) 
        VALUES ( '{$_POST['UserName']}','{$_POST['number']}', '{$_POST['email']}');
    ";
    $result = mysqli_query($link, $query);

    // получаем индефикатор и идём в question
    $userID = mysqli_insert_id($link); // записываем юзер ID в переменную(получаем последний добавленный индефикатор в последнем запросе (параметр: наше соединение к БД))

    // добавляем строку в таблицу question
    $query = "
        INSERT INTO `questions` (`user_id`, `questions`) 
        VALUES ('$userID', '{$_POST['texts']}');
    ";
    $resultInsertQuestion = mysqli_query($link, $query);

    
}


if($result && $resultInsertQuestion){
    $info = 'Отлично! Ваш вопрос отправлен!';
}else{
    $info = 'Что- то пошло не так. Попробуй ещё раз!';
}

// страница вывода
include($_SERVER['DOCUMENT_ROOT'] . '/inc/head.php');
include($_SERVER['DOCUMENT_ROOT'] . '/inc/top.php');
include($_SERVER['DOCUMENT_ROOT'] . '/inc/header.php');

// echo'<main class="wrapper">';

// // print_r($_POST);

// // echo 'Привет я обработчик Формы';
// echo'</main>';

echo"
<main class='wrapper'>
$info


</main>";

include($_SERVER['DOCUMENT_ROOT'] . '/inc/footer.php');
include($_SERVER['DOCUMENT_ROOT'] . '/inc/script.php');


?>
