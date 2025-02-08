<?php 
include("connection.php");
session_start();
$query = $db->query("SELECT users.*, roles.name AS role_name
                      FROM users  
                      INNER JOIN roles 
                      ON users.role_id = roles.id");
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
  <div class="container">
    <h2>LIST USERS</h2>
    <a href="users_add.php" class="btn btn-primary">Tambah Data</a> |
    <a href="dashboard.php" class="btn btn-primary">Dashboard</a>
    <br>
    <!-- include untuk memanggil aksi alert -->
    <?php include("alert_action.php"); ?>
<table border="1" class="table table-bordered mt-3">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Username</th>
          <th>Role</th>
          <th>jenis kelamin</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <?php foreach($data as $index => $users) : ?>
      <tbody>
        <tr>
          <td><?= $index +1;?></td>
          <td width ="30%"><?= $users['name'];?></td>
          <td width = "20%"><?= $users['username'];?></td>
          <td width = "20%"><?= $users['role_name'];?></td>
          <td width = "15%"><?= $users['gender'];?></td>
          <td width = "15%">
            <a href="users_edit.php?id=<?=$users['id'];?>" class="btn btn-warning">Edit</a> |  
            <a href="users_delete.php?id=<?=$users['id'];?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data')">Hapus</a>
          </td>
        </tr>
      </tbody>
      <?php endforeach; ?>
    </table>
    </div>
</body>
</html>