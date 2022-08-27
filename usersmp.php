<?php 
namespace Usersmp;

use Koneksi\Koneksi;

class User {
    public function __construct()
    {
       
    }

public function showData()
	{
        $conn = new Koneksi();
        $db=$conn->metal();
		$stmt=$db->prepare("SELECT NIG,nama,kelas,Tingkatan,tgl_lahir,jk,alamat,nama FROM guru where Tingkatan='SMP'");
		$stmt->execute(); 
		return $stmt;
	}
}