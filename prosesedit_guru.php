<?php
require "user_guru.php";
require "koneksi.php";

use UserGuru\UserGuru;

$edit = new UserGuru();
$edit->editGuru($_POST["NIG"],$_POST["nama"],$_POST["kelas"],$_POST["Tingkatan"],$_POST["tgl_lahir"],$_POST["jk"],$_POST["alamat"],$_POST["nama_jurusan"]);

?>
<h1>data berhasil di edit<h1>
    <a href ="guru.php">selesai<a>