<?php
session_start();


if (!$_SESSION['user']){
  header('Location: index.php');
}

require_once "vendor/connect.php";
$products = mysqli_query ($connect, "SELECT * FROM `products`");
$products = mysqli_fetch_all ($products);


?>
<!DOCTYPE html>
<html>
<head>
    <title>Main</title>
    <link rel='stylesheet' type='text/css' href='main.css'>
    
</head>
<body>
  <h2>Добро пожаловать: <?= $_SESSION['user']['name']?></h2>
<table>
    <tr>
      <th>id</th>
      <th>Название</th>
      <th>Описание</th>
      <th>Цена</th>
    </tr>

    <?php
    foreach($products as $product) {
        ?>
          <tr>
            <td><?= $product[0] ?></td>
            <td><?= $product[1] ?></td>
            <td><?= $product[2] ?></td>
            <td><?= $product[3] ?></td> 
          </tr>
        <?php
      }
       ?>
  </table>
  <a href="vendor/exit.php">Выход</a>
</body>
</html>