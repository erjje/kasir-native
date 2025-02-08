<?php
include("connection.php");
session_start();
try{
  $query = $db->query("SELECT * FROM roles");
  $data = $query->fetchAll();
}catch(Exception $e){
  echo"Gagal :" . $e->getMessage();
}
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
    <div class="container">
      <h2>LIST ROLE</h2>
      <a href="role_add.php" class="btn btn-primary">Tambah Data</a> |
      <a href="dashboard.php" class="btn btn-primary">Dashboard</a>
      <br>
    <?php include("alert_action.php"); ?>
    <table border="1" class="table table-bordered mt-3">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <?php foreach($data as $index => $role) : ?>
      <tbody>
        <tr>
          <td><?= $index +1;?></td>
          <td width= "70%"><?= $role['name'];?></td>
          <td width = "20%">
            <a href="role_edit.php?id=<?=$role['id'];?>" class="btn btn-warning">Edit</a> |  
            <a href="role_delete.php?id=<?=$role['id'];?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data')">Hapus</a>
          </td>
        </tr>
      </tbody>
      <?php endforeach; ?>
    </table>
    </div>
</body>
</html>