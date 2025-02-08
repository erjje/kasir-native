<?php
include("connection.php");
session_start();
//untuk menangkap data role, panggil querynya dulu dan tampilkan dala bentuk fetchAll agar dibungkus array agar bisa dipanggil id nya didalam option untuk dibandingkan
try{
  $role_query= $db->query("SELECT * FROM roles");
  $role_data = $role_query->fetchAll();
}catch(Exception $e){
  echo"Gagal :" . $e->getMessage();
}
//query menampilkan data users dan cukup tampilkan fetch saja untuk lagsung mendapatkan data tanpa dibungkus array
try{
  if(isset($_GET)){
    $id = $_GET['id'];
    $query_read = $db->query("SELECT * FROM users WHERE id = $id");
    $data_users = $query_read->fetch();
  }
}catch(Exception $e){
  echo"Gagal :" . $e->getMessage();
}
//tangkap data didalam form sesuai METHOD yang DIPAKAI dan simpan didalam variable lalu gunakan gunakan QUERY SEPERTI BIASA
try{
  if(isset($_POST['simpan'])){
    $id = $_POST['id'];
    $nama = $_POST['name'];
    $jk = $_POST['gender'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role_id'];
    $query_update = $db->query("UPDATE users 
    SET name = '$nama' , gender = '$jk' , username = '$username', password = '$password', role_id = '$role'
    WHERE id = $id ");
    //session untuk pesan alert jika update data berhasil
    $_SESSION['edit'] = '<strong>Berhasil</strong> Ubah data!!'; 
    header("location:users_list.php");
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
  <title>EDIT USERS</title>
</head>
<body>
    <form method="POST">
      <div class="container">
        <h1>Tambah Role</h1>
        <input type="hidden" value="<?= $data_users['id']; ?>" name="id">
        <label for="name">Nama</label>
        <input type="text" class="form-control" id="role" name ="name" 
        placeholder="Masukan Nama" value="<?= $data_users['name'];?>">
        <label for="gender">Jenis Kelamin</label>
        <select name="gender" id="gender" class="form-control">
          <option value="laki-laki" <?php if($data_users['gender'] == 'laki-Laki') echo "selected"?>>Laki-Laki</option>
          <option value="perempuan" <?php if($data_users['gender'] == 'perempuan') echo "selected"?>>Perempuan</option>
        </select>
        <br>
        <label for="username">Username</label>
        <input type="text" class="form-control" id="role" name ="username"
         placeholder="Masukan Username" value="<?= $data_users['username']; ?>">
        <br>
        <label for="password">Password</label>
        <input type="text" class="form-control" id="password" name ="password" 
        placeholder="masukan password" value="<?= $data_users['password']; ?>">
        <br>
        <label for="role">Pilih Role</label>
        <select name="role_id" id="role" class="form-control">
          <!-- <option value="">Pilih Role</option> -->
           <!-- untuk menampilkan data yang sesuai id role gunakan IF(pengkondisian) -->
          <?php foreach($role_data as $index => $option) :?>
          <option value="<?= $option['id'];?>" 
          <?php if($option['id'] == $data_users['role_id']) echo"selected"; ?> > <?= $option['name'];?> </option>
          <?php endforeach; ?>
        </select>
        <br>
          <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
          <a href="users_list.php"  class="btn btn-info">&laquo; Kembali</a>
      </div>
    </form>
</body>
</html>