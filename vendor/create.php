<?php
session_start();

require_once "connect.php";
$title = $_POST ['title'];
$des = $_POST ['des'];
$price = $_POST ['price'];
$categories = $_POST['categories'];
$quantity = $_POST['quantity'];





    mysqli_query($connect, "INSERT INTO `products` (`id`, `title`, `description`, `price`, `categories`, `quantity`) VALUES (NULL, '$title', '$des', '$price', '$categories', '$quantity')");



header('Location: /');


?>