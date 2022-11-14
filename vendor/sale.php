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
 $price_sale = array_sum($price_sale);
 $quantity_sale = (implode("шт, ", $quantity_sale));
 $title_quantity = $product_sale.' : '.$quantity_sale;
 echo ($qwe);
 $sale_date = date('Y-m-d');
 echo ($sale_date);
// mysqli_query($connect, "INSERT INTO `sales` (`id_sale`, `title products and quantity`, `sale_price`, `price`, `date`) VALUES (NULL, '$title_quantity', '$price_sale', '$price')");


?>

<!DOCTYPE html>
<html>
<head>
    
</head>
<body>

  <?php

 
   
    // $merge = array_merge($product_sale, $price_sale, $quantity_sale);
    // $merge = array_combine($product_sale, $quantity_sale);

    // echo ($merge);

    // echo '<pre>';
    // print_r ($merge);
    // echo '</pre>';
  ?>


</body>
</html>