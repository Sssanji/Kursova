<?php
require_once 'connect.php';

 $id_order_product = $_GET['id'];
//  $order_product_query = mysqli_query($connect, "SELECT * FROM `products` WHERE `products`.`id` = '$id_order_product'");
// $order_product_add = mysqli_fetch_all ($order_product_query);
// $order_product = $order_product_add;



mysqli_query($connect, "INSERT INTO `orderr`(`id`, `title`, `price`, `quantity`) SELECT `id`, `title`, `price`, `quantity` FROM `products` WHERE `products`.`id` = '$id_order_product'") ;
$order_product_query = mysqli_query($connect, "SELECT * FROM `orderr`");
$order_product = mysqli_fetch_all ($order_product_query);
//mysqli_query($connect, "TRUNCATE TABLE `bd`.`orderr`");



// echo '<pre>';
// print_r ($order_product);
// echo '</pre>';
?>