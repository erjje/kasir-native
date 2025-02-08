<?php
include("connection.php");
//session untuk memulai atau melanjutkan sesi yang sedang berlangsung
session_start();
try{
if(isset($_POST['simpan'])){
$name = $_POST['name'];
$price = $_POST['price'];
$amount = $_POST['amount'];
//simpan ke database
$query = $db->query("INSERT INTO goods(name, price, amount)
VALUES ('$name', '$price', '$amount')");
//alert untuk menampilkan pesan jika data berhasil ditambah
$_SESSION['add'] = "<strong>Berhasil</strong> tambah data!!";
//diarahkan kemana setelah klik simpan
header("location:goods_list.php");
// echo"<pre>";
// print_r($_POST);
}
}catch(Exception $e){
  echo"gagal :" . $e->getMessage();
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
<form method="POST">
  <div class="container">
    <h1>Tambah Barang</h1>
    <label for="name">Nama Barang</label>
    <input type="text" class="form-control" id="name" name ="name" placeholder="Nama Barang">
    <label for="price">Harga</label>
    <input type="number" class="form-control" id="price" name="price" placeholder="Harga">
    <label for="amount">Jumlah</label>
    <input type="number" class="form-control" id="amount" name="amount" placeholder="Jumlah">
     <br>
      <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
      <a href="list.php"  class="btn btn-info">&laquo; Kembali</a>
  </div>
</form>

  <!-- <div class="container">
    <form method="POST">
      <label for="name" class="form-group">Nama Barang</label>
      <input type="text" name="name" id="name" placeholder="Nama Barang">
      <br>
      <label for="price">Harga</label>
      <input type="number" name="price" id="proce" placeholder="Harga">
      <br>
      <label for="amount">Jumlah</label>
      <input type="number" name="amount" id="amount" placeholder="Jumlah">
      <br>
      <button type="submit" name="simpan">Simpan</button>
    </form>
  </div> -->
</body>
</html>