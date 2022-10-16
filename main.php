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
  <a href="export.php">Експорт</a>


        <h1>Додати товар</h1>
        <form action='vendor/create.php' method='post'>
          
          <input type='text' name='title' placeholder='Назва'>
          
          <input type='text' name='des' placeholder='Опис'>
          
          <input type='number' name='price' placeholder='Ціна'>

          <select name="categories">
                <?php
                foreach($category as $categorie) {
                    ?>
                            
                            
                            <option><?= $categorie[1] ?></option>
                          
                            <?php
                  }
                  ?>
          </select>

          <button type='submit'>Додати</button>
        </form>
        <h1>Додати категорію</h1>
        <form action='vendor/create_category.php' method='post'>
          
          <input type='text' name='category_name' placeholder='Назва'>

          <button type='submit'>Додати</button>
        </form>


  <!-- <form action="vendor/search.php" method = 'post'> -->
    <form method = 'post'>
        <h1>Пошук товару</h1>
        <input type="text" name="search"> 
        <input type="submit" value="Пошук" name = "searchB">
        
       
    </form>
    <?php 
        
          echo ($resulte); 
          echo ($_SESSION['user']['status']); 
         
      
      
      
   
   ?>
</body>
</html>