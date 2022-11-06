<?php
require_once 'connect.php';

if ($_POST['searchB']){
    $inputSearch = $_POST['search'];
    $result = mysqli_query ($connect, "SELECT * FROM `products` WHERE `title` = '$inputSearch'");
    $row = mysqli_fetch_all($result);
    
    // $resulte = ("<h1>".$row['title']."</h1><p>".$row['description']."</p><p>".$row['price']."</p><br>");
//     $resulte = (
//     "<h1>".$row['title']."</h1><p>".$row['description']."</p><p>".$row['price']."</p><br>"


//     );
}
?>