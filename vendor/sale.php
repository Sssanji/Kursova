<?php
require_once 'connect.php';

$sale = mysqli_query ($connect, "SELECT `title`, `price`, `quantity` FROM `orderr`");
$sale = mysqli_fetch_all ($sale);

foreach($sale as $sales) { 
    $product_sale [] = $sales[0];
    $price_sale []  = $sales[1];
    $quantity_sale [] = $sales[2];
}

 $product_sale = (implode(", ", $product_sale));

 $price_result = [];

 for($i = 0; $i < sizeof($price_sale); $i++)
 {
     $price_result[$i] = $price_sale[$i] * $quantity_sale[$i];
 }
 $price_sale = array_sum($price_result);
 

$quantity_sale = (implode("шт, ", $quantity_sale));
$title_quantity = $product_sale.' : '.$quantity_sale;

 $sale_date = date('Y-m-d');

 mysqli_query($connect, "INSERT INTO `sales` (`id_sale`, `title products and quantity`, `sale_price`, `date`) VALUES (NULL, '$title_quantity', '$price_sale', '$sale_date')");
 mysqli_query($connect, "TRUNCATE TABLE `bd`.`orderr`");
 header('Location: ../order.php');
?>