<?php
require_once 'connect.php';

$quantity = $_POST['quantity'];
mysqli_query($connect, "UPDATE `orderr` SET `quantity` = '$quantity'");
?>