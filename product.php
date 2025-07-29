<?php

require_once 'config/connect.php';

$product_id = $_GET['id']; // получить id=? с getparams (url)
$product = mysqli_query($connect, "SELECT * FROM  `products` WHERE `id` = '$product_id'"); // выбрать по id из БД
$product = mysqli_fetch_assoc($product); // преобразовывает в массив ключей: Array ( [id] => 4 [title] => Player [price] => 399 [description] => MP3 Player )

// для списка комментарий к определнному продукту
$comments = mysqli_query($connect, "SELECT * FROM `comments` WHERE `product_id` = '$product_id'"); // выбрать по id из БД
$comments = mysqli_fetch_all($comments); // преобразовывает в массив [0: '...']: Array ( [id] => 4 [title] => Player [price] => 399 [description] => MP3 Player )


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poduct</title>
</head>
<body>
    <h2>Название: <?= $product['title'] ?></h2>
    <p>Описание: <?= $product['description'] ?></p>


    <form action="vendor/create_comment.php" method="post">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <textarea name="body"></textarea>
        <button type="submit">Add comment</button>
    </form>
    <h3>Comments</h3>
    <ul>
        <?php 
            foreach ($comments as $comment) {
        ?>
        <li><?= $comment[2] ?></li>

        <?php

            }
        ?>
    </ul>
</body>
</html>