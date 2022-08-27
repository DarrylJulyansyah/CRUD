<?php 
namespace Usersma;

use Koneksi\Koneksi;

class User {
    public function __construct()
    {
       
    }

public function showData()
	{
        $conn = new Koneksi();
        $db=$conn->metal();
		$stmt=$db->prepare("SELECT NIG,nama,kelas,Tingkatan,tgl_lahir,jk,alamat,nama FROM guru where Tingkatan='SMA'");
		$stmt->execute(); 
		return $stmt;
	}
}