<?php
session_start();


require_once "connect.php";
$login = $_POST ['login'];
$password = $_POST ['password']; 
   

   $check_user = mysqli_query ($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
 
  if (mysqli_num_rows($check_user) > 0){
    $user = mysqli_fetch_assoc($check_user);

    $_SESSION['user'] = [
      'name' => $user['name'],
      'status' => $user['status']
    ];

    header ("Location: ../main.php");
  }

  else{
    header ("Location: ../index.php");
  }
  
?>