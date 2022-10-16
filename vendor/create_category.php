<?php
session_start();

require_once "connect.php";
$name_category = $_POST ['category_name'];

if ($_SESSION['user']['status'] == "admin") {
mysqli_query($connect, "INSERT INTO `categories` (`id`, `name`) VALUES (NULL, '$name_category')");
header('Location: /');
}
else{

        header($_SERVER['SERVER_PROTOCOL'].' 403 Forbidden');
        die('Ты тут без прав и граждантсва');


        /* echo '<script>
        alert( "У вас недостатньо прав!" );
        </script>'; */
}




?>