<?php
// form in product.php
//! на видео (https://youtu.be/GDVWdYZLM7w?t=3622) таймкод 1:00:22 - показано, как удалять комментарий, если удалить продукт, к тоторому привзязан комментарий

require_once '../config/connect.php';

$product_id = $_POST['id']; // получить id=? с getparams (url)
$body = $_POST['body']; // из формы (method="post") в product.php

mysqli_query($connect, "INSERT INTO `comments` (`id`, `product_id`, `body`) VALUES (NULL, '$product_id', '$body')");


// редирект
header('Location: ../product.php?id='.$product_id, true, 0);
?>