<?php
session_start();


if (!$_SESSION['user']){
  header('Location: index.php');
}
  require_once 'vendor/connect.php';
  
  $sale_id = $_GET['id'];
  $sellings = mysqli_query ($connect, "SELECT * FROM `sales` WHERE `id_sale` = '$sale_id'");
  $sellings = mysqli_fetch_assoc ($sellings);
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel='stylesheet' type='text/css' href='style/style.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">
  <title>Update</title>
</head>
<body>

  
 

  <h2>Оновити</h2>
  <div class = 'update'>
  <form action="vendor/update_sale.php" method="post">
    <input type="hidden" name="id" value="<?= $sellings['id_sale'] ?>">
    <p>Назва та кількість</p>
    <input type="text" name="title" value="<?= $sellings['title products and quantity'] ?>">
    <p>Ціна замовлення</p>
    <input type="number" name="price" value="<?= $sellings['sale_price'] ?>">
    <p>Дата</p>
    <input type="date" name="date" value="<?= $sellings['date'] ?>">
    
    
  
    <button type="submit">Оновити</button>
  </form>
  
    </div>





  


</body>
</html>