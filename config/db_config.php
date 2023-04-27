<?php
// проверка линка
    const DB_HOST= 'localhost';
    const DB_USER = 'zzzvas3d_eshop';
    const DB_PASS = '3ZqQDaAr';
    const DB_NAME = 'zzzvas3d_eshop';

    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if(!$link){
        echo'что то пошло не так';
        die();
    }
    // try{

    // }catch(){

    // }

    mysqli_set_charset($link, 'utf8');
?>