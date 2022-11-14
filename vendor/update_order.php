<?php
require_once 'connect.php';

$id = $_POST['id'];
$quantity = $_POST['quantity'];

mysqli_query($connect, "UPDATE `orderr` SET `quantity` = '$quantity' WHERE `orderr`.`id` = '$id'");

header('Location: ../order.php');