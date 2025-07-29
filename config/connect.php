<?php
// подключение к БД
// какой host? 
// В проекте phpMyAdmin есть файлик config.inc.php. В нём: $cfg['Servers'][$i]['host'] =
$connect = mysqli_connect('MySQL-8.2', 'root', '', 'crud');

if(!$connect) {
    // echo 'Error connect to database';
    die('Error connect to database');
}