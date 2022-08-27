<?php
require 'user_smp.php';
require 'koneksi.php';

use User\User;

$delete = new User();

$delete->delete($_GET['NIS']);
?>
<center>
<h1>DATA Berhasil di Hapus</h1>
<center>
<link rel="stylesheet" type="text/css" href="css/proses_insert.css">
<form action = "smp.php" method ="POST" name="login">
<input type ="submit" class="tombol_input" name = "submit" value = "kembali">
