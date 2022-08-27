<?php 
namespace Userix;

use Koneksi\Koneksi;

class User {
    public function __construct()
    {
       
    }

public function showData()
	{
        $conn = new Koneksi();
        $db=$conn->metal();
		$stmt=$db->prepare("SELECT NIS,nama,kelas,tgl_lahir,jk,alamat,nama FROM siswa where kelas='IX'");
		$stmt->execute(); 
		return $stmt;
	}
}