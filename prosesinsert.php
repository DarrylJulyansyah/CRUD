<?php
require 'user_smp.php';
require 'koneksi.php';

use User\User;

$insert = new User();

$insert->insertDataSiswa($_POST['NIS'],$_POST['nama'],$_POST['kelas'],$_POST['tgl_lahir'],$_POST['jk'],$_POST['alamat']);
?>
<center>
<h1>DATA Berhasil di tambahkan</h1>
<center>
<link rel="stylesheet" type="text/css" href="css/proses_insert.css">
<form action = "smp.php" method ="POST" name="login">
<input type ="submit" class="tombol_input" name = "submit" value = "kembali">
