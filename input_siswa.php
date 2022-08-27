<?php 
require 'user_smp.php';
require 'koneksi.php';
use User\User;

$obj = new User();
?>
<head>
    <title>Input Siswa</title>
    <link rel="stylesheet" type="text/css" href="css/smp.css">
</head>
<body>
    <form action="prosesinsert.php" method="POST" name="insert">
        
        <center>
        <legend>Input Siswa</legend>
        
        <p>
            <label>NIS:</label>
            <input type="text" class ="form" name="NIS"  />
        </p>
        <p>
            <label>Nama:</label>
            <input type="text" class ="form" name="nama"  />
        </p>
        <p>
            <label for="kelas">Pilih Kelas :</label>
            <select id="kelas" name="kelas">
            <option value="VII">VII</option>
            <option value="VIII">VIII</option>
            <option value="IX">IX</option>
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
            <input type="submit" class="tombol_input1" name="input" value="input" />
        </p>
        

        </center>
    </form>
</body>


    
        <form action = "smp.php" method ="POST" name="kembali">
<input type ="submit" class="tombol_input" name = "submit" value = "kembali">
        