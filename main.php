<?php
session_start();


if (!$_SESSION['user']){
  header('Location: index.php');
}


require_once "vendor/connect.php";

$category = mysqli_query ($connect, "SELECT * FROM `categories`");
$category = mysqli_fetch_all ($category);
$products = mysqli_query ($connect, "SELECT * FROM `products`");
$products = mysqli_fetch_all ($products);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Main</title>
    <link rel='stylesheet' type='text/css' href='style/style.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="image/db.png">
</head>
<body>
 
  <h2>Ласкаво просимо: <?= $_SESSION['user']['name']?></h2>


  <div class='menu'>
      <a href='main.php'>Головна</a>
      <a href='add.php'>Додати</a>
      <a href='search.php'>Пошук</a>
      <a href='order.php'>Замовлення</a>
      <a href="vendor/exit.php" style='color: red;'>Вихід</a>
  </div>

<div class='table'>
<table>
    <tr>
      <th>id</th>
      <th>Назва</th>
      <th>Опис</th>
      <th>Ціна</th>
      <th>Категорія</th>
      <th>Кількість</th>
      <th>&#9998;</th>
      <th>&#10006;</th>
    </tr>

    <?php
    foreach($products as $product) {
        ?>
          <tr>
            <td><?= $product[0] ?></td>
            <td><?= $product[1] ?></td>
            <td><?= $product[2] ?></td>
            <td><?= $product[3] ?></td> 
            <td><?= $product[4] ?></td> 
            <td><?= $product[5] ?></td> 
            <td><a href="update.php?id=<?= $product[0] ?>">Оновити</a></td>
            <td><a href="vendor/delete.php?id=<?= $product[0] ?>">Видалити</a></td>
          </tr>
        <?php
      }
       ?>
  </table>
    </div>
  
  <!-- <a href="export.php">Експорт</a> -->

        

 
    
</body>
</html>