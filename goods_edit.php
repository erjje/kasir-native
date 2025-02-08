<?php 
include 'connection.php';
//session untuk memulai atau melanjutkan sesi yang sedang berlangsung
session_start();
//menampilkan data kedalam form
try{
  if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = $db->query("SELECT * FROM goods WHERE id = $id");
    $barang = $query->fetch();
  }
}catch(Exception $e){
  echo"Gagal : " . $e->getMessage();
}
//aksi untuk mengubah data
try{
  if(isset($_POST['update'])){
    //jika ingin menangkapdata menggunakan method get bisa langsung saja tanpa menambahkan inut hidden pada form yang berisikan method post
    // $id = $_GET['id];
    $id = $_POST['id'];

    $nama = $_POST['name'];
    $harga = $_POST['price'];
    $jumlah = $_POST['amount'];
    $query = $db->query("UPDATE goods SET
      name = '$nama',
      price = '$harga',
      amount = '$jumlah'
      WHERE id = $id");
    // pesan alert jika berhasil ubah data
    $_SESSION['edit'] = "<strong>Berhasil</strong> ubah data!!";
  //mengembalikan ke halaman yang ingin dituju setelah tombo simpan di tekan
    header("location:goods_list.php");
  }
}catch(Exception $e){
  echo"Gagal :" . $e->getMessage();
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
      <input type="hidden" value="<?= $barang['id']; ?>" name="id">
      
      <label for="name">Nama Barang</label>
      <input type="text" name="name" id="name" placeholder="Nama Barang" 
      value="<?= $barang['name'];?>" class="form-control">
      <br>
      <label for="price">Harga</label>
      <input type="number" name="price" id="price" placeholder="Harga" 
      value="<?= $barang['price'];?>" class="form-control">
      <br>
      <label for="amount">Jumlah</label>
      <input type="number" name="amount" id="amount" placeholder="Jumlah" 
      value="<?= $barang['amount'];?>" class="form-control">
      <br>
      <button type="submit" name="update" class="btn btn-primary" onclick="return confirm('yakin ingin mengubah data?')">Simpan</button>
      <a href="list.php" class="btn btn-info">&laquo; Kembali</a>
    </form>
  </div>
</body>
</html>