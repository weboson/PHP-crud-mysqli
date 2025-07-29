<?php
// скрипт на изменения в vendor\update.php
require_once 'config/connect.php';


// print_r($_GET); // Array ( [id] => 4 )
$product_id = $_GET['id']; // получить id=? с getparams (url)
$product = mysqli_query($connect, "SELECT * FROM  `products` WHERE `id` = '$product_id'"); // выбрать по id из БД
$product = mysqli_fetch_assoc($product); // получить массив [ключей]: Array ( [id] => 4 [title] => Player [price] => 399 [description] => MP3 Player )
print_r($product);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>

<body>
    <h3>Update</h3>
    <form action="vendor/update.php" method="post">
        <!-- для получения id для SQL в update.php -->
        <input type="hidden" name="id" value="<?= $product['id'] ?>">

        <p>Title</p>
        <input type="text" name="title" value="<?= $product['title'] ?>">
        <p>Description</p>
        <textarea name="description" rows="5"><?= $product['description'] ?></textarea>
        <p>Price</p>
        <input type="number" name="price" value="<?= $product['price'] ?>">
        <br><br>
        <button type="submit">Update Product</button>
    </form>
</body>

</html>