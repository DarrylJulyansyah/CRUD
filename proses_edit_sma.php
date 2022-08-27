<?php
require 'user_sma.php';
require 'koneksi.php';

use UserSma\UserSma;
use Koneksi\Koneksi;

$edit = new UserSma();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Siswa</title>
</head>
<body>
    <?php
    if(isset($_GET['edit']))
        {
        $conn = new Koneksi();
        $db=$conn->metal();
        $NIS = $_GET['NIS'];
        $query = "SELECT * FROM siswa WHERE NIS=? LIMIT 1";
        $statement = $db->prepare($query);
        $statement->bindParam(1, $NIS, PDO::PARAM_INT);
        $statement->execute();

        $data = $statement->fetch(PDO::FETCH_ASSOC);
    ?>
    <form action="proses_edit_sma.php" method="POST" name="edit">
        <fieldset>
        <legend>Edit Siswa</legend>
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
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
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
            <input type="text" name="nama" value="<?=$data['alamat']; ?>"/>
        </p>
        <p>
        <label for="nama_jurusan">Pilih jurusan:</label>
            <select id="nama_jurusan" name="nama_jurusan">
            <option value="IPA">IPA</option>
            <option value="IPS">IPS</option>
            </select>
        </p>
        <p>
            <input type="submit" name="edit" value="edit" />
        </p>
        </fieldset>
    </form>
    <?php
     } else{
         echo "<h5>No ID Found</h5>";
            }
     ?>
</body>
</html>
