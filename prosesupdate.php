<?php
 include "koneksi.php";
 
   $query = "UPDATE siswa SET 
    NIS=:NIS,
    Nama=:Nama, 
    Kelas=:Kelas,
    Tgl_lahir=:Tgl_lahir,
    Jk=:Jk,
    alamat=:alamat 
    WHERE NIS=:NIS";
 
   //prepare query for excecution
   $stmt = $conn->prepare($query);
     
   //bind the parameters
   $stmt->bindParam(':NIS', $_POST['NIS']);
   $stmt->bindParam(":Nama",  $_POST['Nama']);
   $stmt->bindParam(":Kelas",  $_POST['Kelas']);
   $stmt->bindParam(":Tgl_lahir",  $_POST['Tgl_lahir']);
   $stmt->bindParam(":Jk",  $_POST['Jk']);
   $stmt->bindParam(":Alamat",   $_POST['Alamat']);
   
   // eksekusi query
   if($stmt->execute()){
     echo "Data berhasil diupdate <br />";
   } else {
     die('Data gagal diupdate');
   }     
?>