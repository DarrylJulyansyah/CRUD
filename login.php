<?php 
session_start();
if (isset($_SESSION['username'])){
    header("Location: index.php");
}
?>

    <head>
    <title> LOGIN </title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    </head>
    <body>
        <br>
        <div class="kotak_login">
        
        <center>
        <h3 class="tulisan_login">Selamat datang di halaman login</h3>
            <p class="tulisan_login">silahkan Login</p>
        <form action = "proseslogin.php" method ="POST" name="login">
        <label>Username</label>
            <input type = "text" name="username" class="form_login" placeholder="username...">
            <label>Password</label>
            <input type = "password" name="password" class="form_login" placeholder="password...">
            <br>
            <input type ="submit" class="tombol_login" name = "submit" value = "Login">
        </form>
        </center>
