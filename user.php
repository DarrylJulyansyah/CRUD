<?php 
namespace User;

use Koneksi\Koneksi;
use PDOException;
class User {
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
		$stmt=$db->prepare("SELECT NIS,nama,kelas,tgl_lahir,jk,alamat FROM siswa where kelas='VII' OR kelas='VIII' OR kelas='IX'");
		$stmt->execute(); 
		return $stmt;
	}
    public function insertDataSiswa($NIS,$nama,$kelas,$tgl_lahir,$jk,$alamat)
	{
        if(isset($_POST['input']))
		{
                $conn = new Koneksi();
                $db=$conn->metal();
                $sql="INSERT INTO siswa (NIS,nama,kelas,tgl_lahir,jk,alamat) VALUES (:NIS,:nama,:kelas,:tgl_lahir,:jk,:alamat)";
                $stmt=$db->prepare($sql);
				$stmt->bindParam(":NIS", $NIS);
				$stmt->bindParam(":nama", $nama);
                $stmt->bindParam(":kelas", $kelas);
                $stmt->bindParam(":tgl_lahir", $tgl_lahir);
                $stmt->bindParam(":jk", $jk);
                $stmt->bindParam(":alamat", $alamat);               
				$stmt->execute();
				return true;
                header("location:smp.php");
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
        header("location:smp.php");
	}
    public function editSiswa($NIS,$nama,$kelas,$tgl_lahir,$jk,$alamat)
    {
        if(isset($_POST['edit']))
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
            $query = "UPDATE students SET NIS=:NIS, nama=:nama, kelas=:kelas, tgl_lahir=:tgl_lahir, jk=:jk, alamat=:alamat WHERE NIS=:NIS";
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
                header('Location:smp.php');
                exit(0);
            }
            else
            {
                header('Location:smp.php');
                exit(0);
            }
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


}


