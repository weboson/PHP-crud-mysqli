<?php

//! Этот вариант работы с БД (CRUD) - НЕ БЕЗОПАСЕН (лучше использовать PDO или ORM), легко сделать SQL - инъекции: https://youtu.be/GDVWdYZLM7w?t=3790
// Изучаю по видео канала "AreaWeb" - "PHP и PhpMyAdmin - создание, вывод, изменение и удаление данных": https://www.youtube.com/watch?v=GDVWdYZLM7w

// CRUD - Create Read Update Delete
// create - create.php
// read - index.php (this)
// update - 

// require - Генерирует фатальную ошибку, если файл не найден или не загружается
// require_once - Проверяет, был ли файл уже включён, и если да — не включает его снова
// include - Генерирует предупреждение, если файл не найден, но скрипт продолжает выполнение
// include_once - Проверяет, был ли файл уже включён, и если да — игнорирует его. Однако генерирует предупреждение, если файл не может быть включён. 

require_once 'config/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Products</title>
</head>

<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Price</th>
            <th>Description</th>
        </tr>
        <?php
        $products = mysqli_query($connect, "SELECT * FROM `products`"); // SQL запросы беру из PHPMyAdmin
        // var_dump($products);
        // print_r($products);
        $products = mysqli_fetch_all($products);
        // -----вариант 1----
        // foreach ($products as $product) {
        //     echo '
        //     <tr>
        //     <td>' . $product[0] . '</td>
        //     <td>' . $product[1] . '</td>
        //     <td>' . $product[2] . '</td>
        //     <td>' . $product[3] . '</td>
        // </tr>
        //     ';
        // }

        // -----вариант 2----   
        foreach ($products as $product) {
        ?>

            <tr>
                <td><?= $product[0] ?></td>
                <td><?= $product[1] ?></td>
                <td><?= $product[2] ?></td>
                <td><?= $product[3] ?></td>
                <td><a href="product.php?id=<?= $product[0] ?>">View</a></td>
                <td><a href="update.php?id=<?= $product[0] ?>">Update</a></td>
                <td><a style="color: red;" href="vendor/delete.php?id=<?= $product[0] ?>">Delete</a></td>
            </tr>

        <?php
        }

        ?>
    </table>
    <h3>Create form -> create.php</h3>
    <form action="vendor/create.php" method="post">
        <p>Title</p>
        <input type="text" name="title">
        <p>Description</p>
        <textarea name="description" rows="5"></textarea>
        <p>Price</p>
        <input type="number" name="price">
        <br><br>
        <button type="submit">Add New Product</button>
    </form>
</body>

</html>