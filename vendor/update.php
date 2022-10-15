<?php
require_once 'connect.php';

$id = $_POST['id'];
$title = $_POST['title'];
$price = $_POST['price'];
$description = $_POST['description'];
$categories = $_POST['categories'];

mysqli_query($connect, "UPDATE `products` SET `title` = '$title', `price` = '$price', `description` = '$description', `categories` = '$categories' WHERE `products`.`id` = '$id'");

header('Location: /');