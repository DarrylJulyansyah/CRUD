<?php
require 'user_guru.php';
require 'koneksi.php';

use UserGuru\UserGuru;
use Koneksi\Koneksi;

$edit = new UserGuru();

?>
<body>
<link rel="stylesheet" type="text/css" href="css/smp.css">
    <?php
    if(!isset($_GET['NIG'])){
        die("Error: ID Tidak Dimasukkan");
    }
    
    //Ambil data
    $conn = new Koneksi();
    $db=$conn->metal();
    $query = $db->prepare("SELECT * FROM guru WHERE NIG = :NIG");
    $query->bindParam(":NIG", $_GET['NIG']);
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
    <form action="prosesedit_guru.php" method="POST" name="edit">
        <fieldset>
            <center>
        <legend>Edit GURU</legend>
        <p>
            <label>NIG:</label>
            <input type="text" name="NIG" value="<?=$data['NIG']; ?>"/>
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
            <option value="XI">XI</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
            </select>
        </p>
        <p>
        <label for="Tingkatan">tingkatan:</label>
            <select id="Tingkatan" name="Tingkatan">
            <option value="SMA">SMA</option>
            <option value="SMP">SMP</option>
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
            <input type="submit" name="edit" value="edit" />
        </p>
        </fieldset>
        </center>
    </form>
</body>
</html>
