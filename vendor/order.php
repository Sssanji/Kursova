<?php
require_once 'connect.php';

$id_order_product = $_GET['id'];
$order_product_query = mysqli_query($connect, "SELECT * FROM `products` WHERE `products`.`id` = '$id_order_product'");
$order_product_add = mysqli_fetch_all ($order_product_query);
$order_product = $order_product_add;
for ($order_product_add = 1; ; )
{
    $order_product[] = $x;
}



// echo '<pre>';
// print_r ($order_product);
// echo '</pre>';
?>