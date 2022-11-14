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
    <title>Add</title>
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


    <h2>На цій сторінці ви можете додати товар чи додати категорію </h2>
    <div class='main'>
        <div class='add'>
        <h1>Додати товар</h1>
        <form action='vendor/create.php' method='post'>
          
          <input type='text' name='title' placeholder='Назва'>
          
          <input type='text' name='des' placeholder='Опис'>
          
          <input type='number' name='price' placeholder='Ціна'>

          <input type='number' name='quantity' placeholder='Кількість'>

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

                </div>
        <div class='addc'>        
        <h1>Додати категорію</h1>
        <form action='vendor/create_category.php' method='post'>
          
          <input type='text' name='category_name' placeholder='Назва'>

          <button type='submit'>Додати</button>
        </form>
                </div>

                </div>
</body>
</html>