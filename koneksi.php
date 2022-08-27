<?php

namespace Koneksi;

use PDO;

class Koneksi {
    public function metal(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = new PDO("mysql:host=$servername;dbname=sekolah", $username, $password);
        return $conn;
    }

}
?>