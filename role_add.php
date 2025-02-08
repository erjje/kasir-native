<?php 
include("connection.php");
session_start();
try{
  if(isset($_POST['simpan'])) {
    $nama = $_POST['role_name'];
    $query = $db->query("INSERT INTO roles (name) VALUES ('$nama')");
    $_SESSION['add'] = '<strong>Berhasil</strong> tambah data!!';
    header("location:role_list.php");
  }
}catch(Exception $e){
  echo"Gagal :" > $e->getMessage();
}
// echo"<pre>";
// print_r($_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Role ADD</title>
</head>
<body>
<form method="POST">
  <div class="container">
    <h1>Tambah Role</h1>
    <label for="role">Nama Role</label>
    <input type="text" class="form-control" id="role" name ="role_name" placeholder="Nama Role">
     <br>
      <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
      <a href="role_list.php"  class="btn btn-info">&laquo; Kembali</a>
  </div>
</form>
</body>
</html>