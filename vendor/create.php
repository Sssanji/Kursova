<?php
session_start();

require_once "connect.php";
$title = $_POST ['title'];
$des = $_POST ['des'];
$price = $_POST ['price'];
$categories = $_POST['categories'];




    mysqli_query($connect, "INSERT INTO `products` (`id`, `title`, `description`, `price`, `categories`) VALUES (NULL, '$title', '$des', '$price', '$categories')");



header('Location: /');


?>