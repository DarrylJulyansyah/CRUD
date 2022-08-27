<?php
require 'user_sma.php';
require 'koneksi.php';

use UserSma\UserSma;

$delete = new UserSma();

$delete->delete($_GET['NIS']);
?>
<h1>DATA Berhasil di Hapus</h1>
<a href="sma.php">Selesai</a>