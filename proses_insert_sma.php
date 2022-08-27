<?php
require 'user_sma.php';
require 'koneksi.php';

use UserSma\UserSma;

$insert = new UserSma();

$insert->insertDataSiswa($_POST['NIS'],$_POST['nama'],$_POST['kelas'],$_POST['tgl_lahir'],$_POST['jk'],$_POST['alamat'],$_POST['nama_jurusan']);
?>
<center>
<h1>DATA Berhasil di tambahkan</h1>
<center>
<link rel="stylesheet" type="text/css" href="css/proses_insert.css">
<form action = "sma.php" method ="POST" name="login">
<input type ="submit" class="tombol_input" name = "submit" value = "kembali">
