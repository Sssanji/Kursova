<?php
session_start();


if (!$_SESSION['user']){
  header('Location: index.php');
}


require_once "vendor/connect.php";
require_once "vendor/search.php";
$category = mysqli_query ($connect, "SELECT * FROM `categories`");
$category = mysqli_fetch_all ($category);
$products = mysqli_query ($connect, "SELECT * FROM `products`");
$products = mysqli_fetch_all ($products);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
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
      <a href='#'>пап</a>
      <a href="vendor/exit.php" style='color: red;'>Вихід</a>
  </div>



     <div class='sosi'>
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
      <th>&#9998;</th>
      <th>&#10006;</th>
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
            <td><a href="update.php?id=<?= $resulte[0] ?>">Оновити</a></td>
            <td><a href="vendor/delete.php?id=<?= $resulte[0] ?>">Видалити</a></td>
          </tr>
        <?php
      }
       ?>
  </table>
    </div>

 </body>
 </html>