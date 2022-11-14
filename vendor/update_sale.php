<?php
require_once 'connect.php';

$id = $_POST['id'];
$title = $_POST['title'];
$price = $_POST['price'];
$date = $_POST['date'];

mysqli_query($connect, "UPDATE `sales` SET `title products and quantity` = '$title', `sale_price` = '$price', `date` = '$date' WHERE `sales`.`id_sale` = '$id'");

header('Location: ../order.php');