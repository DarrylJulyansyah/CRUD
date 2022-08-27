<?php
require 'user_smp.php';
require 'koneksi.php';

use Koneksi\Koneksi;
use User\User;

$edit = new User();

?>

<head>
    <title>Edit Siswa</title>
</head>
<link rel="stylesheet" type="text/css" href="css/smp.css">
<body>
   
<?php

if(!isset($_GET['NIS'])){
    die("Error: ID Tidak Dimasukkan");
}

//Ambil data
$conn = new Koneksi();
$db=$conn->metal();
$query = $db->prepare("SELECT * FROM siswa WHERE NIS = :NIS");
$query->bindParam(":NIS", $_GET['NIS']);
// Jalankan perintah sql
$query->execute();
if($query->rowCount() == 0){
    // Tidak ada hasil
    die("Error: ID Tidak Ditemukan");
}else{
    // ID Ditemukan, Ambil data
    $data = $query->fetch();
}


?>
    
    <form action="prosesedit_smp.php" method="POST" name="submit">
        <center>

        <h1>EDIT SISWA</h1>
        <p>
            <label>NIS:</label>
            <input type="text" name="NIS" value="<?=$data['NIS']; ?>"/>
        </p>
        <p>
            <label>Nama:</label>
            <input type="text" name="nama" value="<?=$data['nama']; ?>"/>
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
            <input type="date" name="tgl_lahir" value="<?=$data['tgl_lahir']; ?>" />
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
            <input type="text" name="alamat" value="<?=$data['alamat']; ?>"/>
        </p>
        <p>
            <input type="submit" name="submit" value="edit" />
        </p>

        </center>
    </form>
</body>
</html>
