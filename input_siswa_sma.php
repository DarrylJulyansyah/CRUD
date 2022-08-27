<?php 
require 'user_sma.php';
require 'koneksi.php';

use UserSma\UserSma;

$obj = new UserSma();
?>

<head>
    <title>Input Siswa</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="css/smp.css">
    <form action="proses_insert_sma.php" method="POST" name="insert">
            <center>
        <legend>Input Siswa </legend>
        <p>
            <label>NIS:</label>
            <input type="text" name="NIS"  />
        </p>
        <p>
            <label>Nama:</label>
            <input type="text" name="nama"  />
        </p>
        <p>
            <label for="kelas">Pilih Kelas :</label>
            <select id="kelas" name="kelas">
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
            </select>
        </p>
        <p>
            <label>Tanggal Lahir:</label>
            <input type="date" name="tgl_lahir"  />
        </p>
        <p>
        <label for="jk">Pilih Jenis Kelamin:</label>
            <select id="jk" name="jk">
            <option value="laki-laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
            </select>
        </p>
        <p>
            <label>Alamat:</label>
            <textarea name="alamat"></textarea>
        </p>
        <p>
            <label for="nama_jurusan">Pilih jurusan :</label>
            <select id="nama_jurusan" name="nama_jurusan">
            <option value="IPA">IPA</option>
            <option value="IPS">IPS</option>
            </select>
        </p>
        <p>
            <input type="submit" class="tombol_input1" name="input" value="input" />
        </p>
        <center>
</form>
        <form action = "sma.php" method ="POST" name="kembali">
<input type ="submit" class="tombol_input" name = "submit" value = "kembali">
<body>
