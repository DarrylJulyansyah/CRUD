<?php  
    session_start();
require 'user_smp.php';  
require 'koneksi.php';  

  
use User\User;  
use koneksi\koneksi;  
  
$conn = new koneksi();  
$db=$conn->metal();  
$stmt=$db->prepare("SELECT * FROM user");  
$stmt->execute();  
$data=$stmt->fetchAll();  
$dbusername=$data[0]['username'];  
$dbpassword=$data[0]['password'];  
$username = $_POST['username'];  
$password = $_POST['password'];  

if(($username==$dbusername)&&($password==$dbpassword)){  
    session_start();
    $_SESSION['username'] = $username;
    $ceklogin = new User();  
    $ceklogin->login($_POST['username'],$_POST['password']);
    header("Location: index.php");  
}else {
    header("Location: login.php");
}

