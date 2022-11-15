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


// $p = mysqli_query($connect, "SELECT `id`, `quantity` FROM `products`");
// $p = mysqli_fetch_all ($p);


// $o = mysqli_query($connect, "SELECT `id`, `quantity` FROM `orderr`");
// $o = mysqli_fetch_all ($o);

// foreach($p as $pp) { 
//     $p_id [] = $pp[0];
//     $p_q []  = $pp[1];
// }
// foreach($o as $oo) { 
//     $o_id [] = $oo[0];
//     $o_q []  = $oo[1];
// }

// $ppp = array_combine($p_id, $p_q);

// $ooo = array_combine($o_id, $o_q);

// echo '<pre>';
// print_r ($p_id);
// echo '</pre>';

// echo '<pre>';
// print_r ($p_q);
// echo '</pre>';

// echo '<pre>';
// print_r ($ppp);
// echo '</pre>';

// echo '<pre>';
// print_r ($o_id);
// echo '</pre>';

// echo '<pre>';
// print_r ($o_q);
// echo '</pre>';

// echo '<pre>';
// print_r ($ooo);
// echo '</pre>';

// $op = (array_intersect_key($ppp, $ooo));

// echo '<pre>';
// print_r (array_keys($op));
// echo '</pre>';

?>