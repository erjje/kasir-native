<?php
try{
  $db = new PDO("mysql:host=localhost;dbname=kasir_db;", "root", "");
  // $db = mysqli_connect("localhost", "root", "" , "kasir_db");
  // echo"berhasil";
}catch(Exception $e){
  echo"gagal :" . $e->getMessage();
}
?>