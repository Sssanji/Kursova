<?php
session_start();


if (!$_SESSION['user']){
  header('Location: index.php');
}

if ($_SESSION['user']['status'] == "product_editor"){
  die("У вас недостатньо прав! Зверніться до адміністратора");
}



require_once "vendor/search.php";
require_once "vendor/connect.php";
require_once "vendor/order.php";
$category = mysqli_query ($connect, "SELECT * FROM `categories`");
$category = mysqli_fetch_all ($category);
$products = mysqli_query ($connect, "SELECT * FROM `products`");
$products = mysqli_fetch_all ($products);
$sellings = mysqli_query ($connect, "SELECT * FROM `sales`");
$sellings = mysqli_fetch_all ($sellings);



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
    <h2>Попередні замовлення</h2>
<table>
    <tr>
      <th>id</th>
      <th>Назва та Кількість</th>
      <th>Ціна замовлення</th>
      <th>Дата замовлення</th>
      <th>&#9998;</th>
    </tr>

    <?php
    foreach($sellings as $selling) {
        ?>
          <tr>
            <td><?= $selling[0] ?></td>
            <td><?= $selling[1] ?></td>
            <td><?= $selling[2] ?></td>
            <td><?= $selling[3] ?></td> 
            <td><a href="update_sale.php?id=<?= $selling[0] ?>">Редагувати</a></td>
          </tr>
        <?php
      }
       ?>
  </table>
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
      <th>&#9998;</th>
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


    <div class='search'>
    <form method = 'post'>
       
        <h1>Пошук товару</h1>
        <input type="text" name="search"> 
        <input type="submit" value="Пошук" name = "searchB">
     </form>
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
      <th>&#43;</th>
    </tr>

    <?php
    foreach($row as $resulte) {
        ?>
          <tr>
            <td><?= $resulte[0] ?></td>
            <td><?= $resulte[1] ?></td>
            <td><?= $resulte[2] ?></td>
            <td><?= $resulte[3] ?></td> 
            <td><?= $resulte[4] ?></td> 
            <td><?= $resulte[5] ?></td> 
            <td><a href="order.php?id=<?= $resulte[0] ?>">Додати до замовлення</a></td>
          </tr>
        <?php
      }
       ?>
  </table>
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