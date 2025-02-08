<?php
include("connection.php");
session_start();

try{
  if(isset($_GET)){
  $id = $_GET['id'];
  $query = $db->query("SELECT * FROM roles WHERE id = $id");
  $role = $query->fetch();
}
}catch(Exception $e){
  echo "Gagal :" . $e->getMessage();
}
if(isset($_POST['update'])){
  $id = $_POST['id'];
  $nama = $_POST['role_name'];
  $query = $db->query("UPDATE roles SET 
  name = '$nama' WHERE id = $id");
  $_SESSION['edit'] = '<strong>Berhasil</strong> mengubah data!!';
  header("location:role_list.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
<div class="container">
    <h2>EDIT DATA BARANG</h2>
    <form method="POST">
    <!-- input hidden dibawah ini untuk mendapatkan id barangnya dan tambahkan name agar datanyadapat ditangkap-->
      <input type="hidden" value="<?= $role['id']; ?>" name="id">
      
      <label for="name">Nama Barang</label>
      <input type="text" name="role_name" id="name" placeholder="Nama Barang" 
      value="<?= $role['name'];?>" class="form-control">
      <br>
      <button type="submit" name="update" class="btn btn-primary" onclick="return confirm('yakin ingin mengubah data?')">Simpan</button>
      <a href="role_list.php" class="btn btn-info">&laquo; Kembali</a>
    </form>
  </div>
</body>
</html>