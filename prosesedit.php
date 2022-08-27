<?php
require 'user_smp.php';
require 'koneksi.php';

use User\User;
use Koneksi\Koneksi;

$edit = new User();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Siswa</title>
</head>
<body>
    <?php
 {
    if(isset($_GET['edit']))
    {
        $NIS = $_POST['NIS'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $jk = $_POST['jk'];
        $alamat = $_POST['alamat'];
    }try {
        $conn = new Koneksi();
        $db=$conn->metal();
        $query = "UPDATE Siswa SET NIS=:NIS, nama=:nama, kelas=:kelas, tgl_lahir=:tgl_lahir, jk=:jk, alamat=:alamat WHERE NIS=:NIS";
        $statement = $db->prepare($query);
        $data = [
            ':NIS' => $NIS,
            ':nama' => $nama,
            ':kelas' => $kelas,
            ':tgl_lahir' => $tgl_lahir,
            ':jk' => $jk,
            ':alamat' => $alamat
        ];
        $query_execute = $statement->execute($data);
        if($query_execute)
        {
            header('Location:prosesedit.php');
            exit(0);
        }
        else
        {
            echo "tidak bisa di edit";
            exit(0);
        }
    }catch (PDOException $e) {
        echo $e->getMessage();
    }}
?>
    ?>
    <form action="prosesedit.php" method="POST" name="edit">
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
            <input type="text" name="nama" value="<?=$data['alamat']; ?>"/>
        </p>
        <p>
            <input type="submit" name="edit" value="edit" />
        </p>
        </fieldset>
    </form>
    <?php
     
     ?>
</body>
</html>
