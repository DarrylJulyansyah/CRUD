<?php 
namespace UserSma;

use Koneksi\Koneksi;
use PDOException;
class UserSma 
{
    public function __construct()
    {
       
    }

    public function login($username,$password) 
    {
        $conn = new Koneksi();
        $db=$conn->metal();
        $kelompok=$db->prepare("SELECT * FROM user");
        $kelompok->execute();
        $hasil=$kelompok->fetchAll();

        $dbusername=$hasil[0]['username'];
        $dbpassword=$hasil[0]['password'];
        if(($username==$dbusername)&&($password==$dbpassword)){
           header("location:index.php");
        }else{
           header("location:login.php");
        }        
    }

    public function showData()
	{
        $conn = new Koneksi();
        $db=$conn->metal();
		$stmt=$db->prepare("SELECT NIS,nama,kelas,tgl_lahir,jk,alamat,nama_jurusan FROM siswa where kelas='X' OR kelas='XI' OR kelas='XII'");
		$stmt->execute(); 
		return $stmt;
	}
    public function insertDataSiswa($NIS,$nama,$kelas,$tgl_lahir,$jk,$alamat,$nama_jurusan)
	{
        if(isset($_POST['input']))
		{
                $conn = new Koneksi();
                $db=$conn->metal();
                $sql="INSERT INTO siswa (NIS,nama,kelas,tgl_lahir,jk,alamat,nama_jurusan) VALUES (:NIS,:nama,:kelas,:tgl_lahir,:jk,:alamat,:nama_jurusan)";
                $stmt=$db->prepare($sql);
				$stmt->bindParam(":NIS", $NIS);
				$stmt->bindParam(":nama", $nama);
                $stmt->bindParam(":kelas", $kelas);
                $stmt->bindParam(":tgl_lahir", $tgl_lahir);
                $stmt->bindParam(":jk", $jk);
                $stmt->bindParam(":alamat", $alamat);
                $stmt->bindParam(":nama_jurusan", $nama_jurusan);

				$stmt->execute();
				return true;
                header("location:sma.php");
		}
        
    }
    public function delete($NIS)
	{
        $conn = new Koneksi();
        $db=$conn->metal();
        $sql ="DELETE FROM siswa WHERE NIS = :NIS";
        $stmt =$db->prepare($sql);
         $stmt->bindParam(":NIS", $NIS);
         $stmt->execute();
        return true;
        header("location:sma.php");
	}
    public function editSiswa($NIS,$nama,$kelas,$tgl_lahir,$jk,$alamat,$nama_jurusan)
    {
        if(isset($_POST['edit']))
        {
            $NIS = $_POST['NIS'];
            $nama = $_POST['nama'];
            $kelas = $_POST['kelas'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $jk = $_POST['jk'];
            $alamat = $_POST['alamat'];
            $nama_jurusan = $_POST['nama_jurusan'];
        }try {
            $conn = new Koneksi();
            $db=$conn->metal();
            $query = "UPDATE Siswa SET NIS=:NIS, nama=:nama, kelas=:kelas, tgl_lahir=:tgl_lahir, jk=:jk, alamat=:alamat, nama_jurusan=:nama_jurusan WHERE NIS=:NIS";
            $statement = $db->prepare($query);
            $data = [
                ':NIS' => $NIS,
                ':nama' => $nama,
                ':kelas' => $kelas,
                ':tgl_lahir' => $tgl_lahir,
                ':jk' => $jk,
                ':alamat' => $alamat,
                ':nama_jurusan' => $nama_jurusan
            ];
            $query_execute = $statement->execute($data);
            if($query_execute)
            {
                header('Location:sma.php');
                exit(0);
            }
            else
            {
                header('Location:sma.php');
                exit(0);
            }
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


}


