<?php
session_start();


if (!$_SESSION['user']){
  header('Location: index.php');
}
  require_once 'vendor/connect.php';
  
  $product_id = $_GET['id'];
  $product = mysqli_query($connect, "SELECT * FROM `products` WHERE `id`='$product_id'");
  $product = mysqli_fetch_assoc($product);
  $category = mysqli_query ($connect, "SELECT * FROM `categories`");
  $category = mysqli_fetch_all ($category);
 
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title>Update</title>
</head>
<body>

  
 

  <h2>Оновити</h2>
  <form action="vendor/update.php" method="post">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
    <p>Назва</p>
    <input type="text" name="title" value="<?= $product['title'] ?>">
    <p>Опис</p>
    <textarea name="description"><?= $product['description'] ?></textarea>
    <p>Ціна</p>
    <input type="number" name="price" value="<?= $product['price'] ?>">
    <p>Категорія</p>
    <select name="categories">
    <?php
    foreach($category as $categorie) {
        ?>
                
                
                <option><?= $categorie[1] ?></option>
               
                <?php
      }
       ?>
      </select>
  
    <button type="submit">Оновити</button>
  </form>
  






  <table>
    <tr>
      <th>id</th>
      <th>Назва</th>
    </tr>

    <?php
    foreach($category as $categorie) {
        ?>
          <tr>
            <td><?= $categorie[0] ?></td>
            <td><?= $categorie[1] ?></td>
          </tr>
        <?php
      }
       ?>
  </table>


</body>
</html>