<?php
require 'user_guru.php';
require 'koneksi.php';

use UserGuru\UserGuru;

$insert = new UserGuru();

$insert->insertDataGuru($_POST['NIG'],$_POST['nama'],$_POST['kelas'],$_POST['Tingkatan'],$_POST['tgl_lahir'],$_POST['jk'],$_POST['alamat']);
?>
<center>
<h1>DATA Berhasil di tambahkan</h1>
<link rel="stylesheet" type="text/css" href="css/proses_insert.css">
<form action = "guru.php" method ="POST" name="login">
<input type ="submit" class="tombol_input" name = "submit" value = "kembali">
<center>