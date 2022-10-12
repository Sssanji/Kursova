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
    
    <link rel='stylesheet' type='text/css' href='style/form_style.css'>
    
</head>
<body>

    <form action="vendor/sign.php" method = "post">
        <label>Логин</label>
        <input type="text" name="login" placeholder='Login'>
        <label>Пароль</label>
        <input type="password" name = "password" placeholder='Password'>
        <button type="submit">Войти</button>
       
    </form>
</body>
</html>