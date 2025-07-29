<?php 
// форма в update.php
// пример SQL-запроса берём из PHPMyAdmin (в таблице есть карандашек он изменяет данные -> кнопка 'Предпросмотр SQL')
require_once '../config/connect.php';

$id = $_POST['id']; // в форме <input type="hidden" name="id" value="< $product['id'] >">
$title = $_POST['title']; // в форме name="title"
$price = $_POST['price'];
$description = $_POST['description'];

mysqli_query($connect, "UPDATE `products` SET `title` = '$title', `price` = '$price', `description` = '$description' WHERE `products`.`id` = '$id'");

// редирект
header('Location: ../index.php', true, 0);
?>