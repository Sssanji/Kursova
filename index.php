<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel='stylesheet' type='text/css' href='main.css'>
    
</head>
<body>

    <form method="post" action="vendor/sign.php">
        <label>Логин</label>
        <input type="text" name="login">
        <label>Пароль</label>
        <input type="password" name = "password">
        <button type="submit">Войти</button>
    </form>
</body>
</html>