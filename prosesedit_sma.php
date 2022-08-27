<?php
require "user_sma.php";
require "koneksi.php";

use UserSma\UserSma;

$edit = new UserSma();
$edit->editSiswa($_POST["NIS"],$_POST["nama"],$_POST["kelas"],$_POST["tgl_lahir"],$_POST["jk"],$_POST["alamat"],$_POST["nama_jurusan"]);

?>
<h1>data berhasil di edit<h1>
    <a href ="sma.php">selesai<a>