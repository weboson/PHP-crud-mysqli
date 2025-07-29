<?php 
require_once '../config/connect.php';
// <td><a style="color: red;" href="vendor/delete.php?id=< $product[0] >">Delete</a></td>
$product_id = $_GET['id']; // получить id=? с getparams (url)
mysqli_query($connect, "DELETE FROM products WHERE `products`.`id` ='$product_id'");

// редирект
header('Location: ../index.php', true, 0);

?>