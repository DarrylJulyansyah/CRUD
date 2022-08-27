<?php
require 'user_guru.php';
require 'koneksi.php';

use UserGuru\UserGuru;

$delete = new UserGuru();

$delete->delete($_GET['NIG']);
?>
<link rel="stylesheet" type="text/css" href="css/proses_insert.css">
<h1>DATA Berhasil di Hapus</h1>
<center>
<form action = "guru.php" method ="POST" name="login">
<input type ="submit" class="tombol_input" name = "submit" value = "kembali">
</center>
