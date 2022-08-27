<?php
require 'user_smp.php';
require 'koneksi.php';

use User\User;

$edit= new User();

$edit->editSiswa($_POST['NIS'],$_POST['nama'],$_POST['kelas'],$_POST['tgl_lahir'],$_POST['jk'],$_POST['alamat']);

var_dump($_POST['alamat']);
die;
?>
<h1>DATA Berhasil di tambahkan</h1>
<a href="smp.php">Selesai</a>