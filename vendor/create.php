<?php

require_once '../config/connect.php';
// $_POST глоабльная переменная, доступная если в форме method="post" (index.php) 
// print_r($_POST); // Пример: Array ( [title] => Player [description] => MP3 Player [price] => 399 )

$title = $_POST['title']; // в форме name="title"
$price = $_POST['price'];
$description = $_POST['description'];

mysqli_query($connect, "INSERT INTO `products` (`id`, `title`, `price`, `description`) VALUES (NULL, '$title', '$price', '$description')");

// редирект
header('Location: ../index.php', true, 0);
