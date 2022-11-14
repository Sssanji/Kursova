<?php
session_start();


if (!$_SESSION['user']){
  header('Location: index.php');
}


require_once "vendor/connect.php";
require_once "vendor/order.php";
$category = mysqli_query ($connect, "SELECT * FROM `categories`");
$category = mysqli_fetch_all ($category);
$products = mysqli_query ($connect, "SELECT * FROM `products`");
$products = mysqli_fetch_all ($products);


echo '<pre>';
print_r ($order_product);
echo '</pre>';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Order</title>
    <link rel='stylesheet' type='text/css' href='style/style.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">
    
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
  <form action="vendor/sale.php" method="post">
    <h2>Поточне замовлення</h2>
<table>
    <tr>
      <th>id</th>
      <th>Назва</th>
      <th>Ціна</th>
      <th>Кількість</th>
      <th>&#10006;</th>
    </tr>

    <?php
    foreach($order_product as $order_products) {
        ?>
          <tr>
            <td><?= $order_products[0] ?></td>
            <td><?= $order_products[1] ?></td>
            <td><?= $order_products[2] ?></td>
            <td><?= $order_products[3] ?></td> 
            <td><a href="update_order.php?id=<?= $order_products[0] ?>">Редагувати</a></td>
          </tr>
        <?php
      }
       ?>
  </table>
  
  <button type="submit">Оформити замовлення</button>
  </form>
    </div>



<div class='table'>
<h2>Перелік товарів</h2>
<form method="post">
<table>
    <tr>
      <th>id</th>
      <th>Назва</th>
      <th>Опис</th>
      <th>Ціна</th>
      <th>Категорія</th>
      <th>Кількість</th>
      <th>&#43;</th>
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
            <td><a href="order.php?id=<?= $product[0] ?>">Додати до замовлення</a></td>
          </tr>
        <?php
      }
       ?>
  </table>
    </form>
    </div>
  
  <!-- <a href="export.php">Експорт</a> -->

</div>
</body>
</html>