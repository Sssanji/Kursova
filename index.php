<?php
session_start();


if ($_SESSION['user']){
    header('Location: main.php');
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='style/form_style.css'>
    
    
</head>
<body>
    <div class='form'>
        
        <form action="vendor/sign.php" method = "post">
        <label>Логін</label>
        <input type="text" name="login" placeholder='Login'>
        <label>Пароль</label>
        <input type="password" name = "password" placeholder='Password'>
        <button type="submit">Увійти</button>
        </form>

    
    </div>
<div class='icons'>    
<a href='https://github.com/Sssanji/Kursova'><img src='image/git.png' width='50px'></a>
<a href='http://127.0.0.1/openserver/phpmyadmin/index.php?route=/table/structure/save'><img src='image/db.png' width='50px'></a>
</div>
</body>
</html>