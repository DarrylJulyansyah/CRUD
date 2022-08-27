<?php 
namespace Uservii;

use Koneksi\Koneksi;

class User {
    public function __construct()
    {
       
    }

public function showData()
	{
        $conn = new Koneksi();
        $db=$conn->metal();
		$stmt=$db->prepare("SELECT NIS,nama,kelas,tgl_lahir,jk,alamat,nama FROM siswa where kelas='VII'");
		$stmt->execute(); 
		return $stmt;
	}
}