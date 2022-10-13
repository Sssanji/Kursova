<?php
session_start();

require_once "connect.php";
$title = $_POST ['title'];
$des = $_POST ['des'];
$price = $_POST ['price'];

mysqli_query($connect, "INSERT INTO `products` (`id`, `title`, `description`, `price`) VALUES (NULL, '$title', '$des', '$price')");

header('Location: /');


?>