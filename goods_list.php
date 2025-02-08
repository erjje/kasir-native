<?php
include("connection.php");
//session untuk memulai atau melanjutkan sesi yang sedang berlangsung, untuk kasus ini untuk menampikan alert add, edit & delete
session_start();
// include("login_check.php");
try{
  $query=$db->query("SELECT * FROM goods");
  // echo"berhasil";
}catch(Exception $e){
  echo"gagal :" . $e->getMessage();
}
$data = $query->fetchAll();
// echo"<pre>";
// print_r($data);
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
  <div class="container" >
    <h1>LIST BARANG</h1>
    <!-- include untuk memanggil alert -->
      <?php include("alert_action.php"); ?>
      <a href="goods_add.php" class="btn btn-primary">Tambah Barang</a>
      <a href="dashboard.php" class="btn btn-primary">Dashboard</a>
    <table border="1" class="table table-bordered mt-3">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <?php foreach($data as $index => $barang) : ?>
      <tbody>
        <tr>
          <td><?= $index +1;?></td>
          <td width ="57%"><?= $barang['name'];?></td>
          <td width = "10%"><?= $barang['price'];?></td>
          <td width = "10%"><?= $barang['amount'];?></td>
          <td width = "15%">
            <a href="goods_edit.php?id=<?=$barang['id'];?>" class="btn btn-warning">Edit</a> |  
            <a href="goods_delete.php?id=<?=$barang['id'];?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data')">Hapus</a>
          </td>
        </tr>
      </tbody>
      <?php endforeach; ?>
    </table>
  </div>
</body>
</html>
