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
  <h2>Ласкаво просимо: <?= $_SESSION['user']['name']?></h2>
<table>
    <tr>
      <th>id</th>
      <th>Назва</th>
      <th>Опис</th>
      <th>Ціна</th>
      <th>Категорія</th>
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
            <td><a href="update.php?id=<?= $product[0] ?>">Оновити</a></td>
            <td><a href="vendor/delete.php?id=<?= $product[0] ?>">Видалити</a></td>
          </tr>
        <?php
      }
       ?>
  </table>
  <a href="vendor/exit.php">Вихід</a>

  <form action='vendor/create.php' method='post'>
    
    <input type='text' name='title' placeholder='Назва'>
    
    <input type='text' name='des' placeholder='Опис'>
    
    <input type='number' name='price' placeholder='Ціна'>

    <button type='submit'>Додати</button>
  </form>

  <!-- <form action="vendor/search.php" method = 'post'> -->
    <form method = 'post'>
        <p>Пошук товару<input type="text" name="search" > 
        <input type="submit" value="Пошук" name = "searchB">
        </p>
       
    </form>
    <?php 
        if ($_POST['searchB']){
          $inputSearch = $_POST['search'];
          $result = mysqli_query ($connect, "SELECT * FROM `products` WHERE `title` = '$inputSearch'");
          $row = mysqli_fetch_assoc($result);
          $resulte = ("<h1>".$row['title']."</h1><p>".$row['description']."</p><p>".$row['price']."</p><br>");
          echo ($resulte); 
          
         
      }
      else if (!$_POST['searchB']){
          $resulte = 3;
          echo ($resulte);  
      }
      
   
   ?>
</body>
</html>