<?php 
namespace UserGuru;

use Koneksi\Koneksi;
use PDOException;
class UserGuru 
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
		$stmt=$db->prepare("SELECT NIG,nama,kelas,Tingkatan,tgl_lahir,jk,alamat,nama FROM guru where kelas='VII' OR kelas='VIII' OR kelas='IX' OR kelas='X' OR kelas='XI' OR kelas='XII'");
		$stmt->execute(); 
		return $stmt;
	}
    public function insertDataGuru($NIG,$nama,$kelas,$Tingkatan,$tgl_lahir,$jk,$alamat)
	{
        if(isset($_POST['input']))
		{
                $conn = new Koneksi();
                $db=$conn->metal();
                $sql="INSERT INTO guru (NIG,nama,kelas,Tingkatan,tgl_lahir,jk,alamat) VALUES (:NIG,:nama,:kelas,:Tingkatan,:tgl_lahir,:jk,:alamat)";
                $stmt=$db->prepare($sql);
				$stmt->bindParam(":NIG", $NIG);
				$stmt->bindParam(":nama", $nama);
                $stmt->bindParam(":kelas", $kelas);
                $stmt->bindParam(":Tingkatan", $Tingkatan);
                $stmt->bindParam(":tgl_lahir", $tgl_lahir);
                $stmt->bindParam(":jk", $jk);
                $stmt->bindParam(":alamat", $alamat);               
				$stmt->execute();
				return true;
                header("location:guru.php");
		}
        
    }
    
    public function delete($NIG)
	{
        $conn = new Koneksi();
        $db=$conn->metal();
        $sql ="DELETE FROM guru WHERE NIG = :NIG";
        $stmt =$db->prepare($sql);
         $stmt->bindParam(":NIG", $NIG);
         $stmt->execute();
        return true;
        header("location:guru.php");
	}
    public function editGuru($NIG,$nama,$kelas,$Tingkatan,$tgl_lahir,$jk,$alamat)
    {
        if(isset($_POST['edit']))
        {
            $NIS = $_POST['NIG'];
            $nama = $_POST['nama'];
            $kelas = $_POST['kelas'];
            $Tingkatan = $_POST['Tingkatan'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $jk = $_POST['jk'];
            $alamat = $_POST['alamat'];
        }try {
            $conn = new Koneksi();
            $db=$conn->metal();
            $query = "UPDATE guru SET NIG=:NIG, nama=:nama, kelas=:kelas, Tingkatan=:Tingkatan, tgl_lahir=:tgl_lahir, jk=:jk, alamat=:alamat WHERE NIG=:NIG";
            $statement = $db->prepare($query);
            $data = [
                ':NIG' => $NIG,
                ':nama' => $nama,
                ':kelas' => $kelas,
                ':Tingkatan' => $Tingkatan,
                ':tgl_lahir' => $tgl_lahir,
                ':jk' => $jk,
                ':alamat' => $alamat
            ];
            $query_execute = $statement->execute($data);
            if($query_execute)
            {
                header('Location:guru.php');
                exit(0);
            }
            else
            {
                header('Location:guru.php');
                exit(0);
            }
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


}


