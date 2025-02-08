<?php
include("connection.php");
session_start();
//untuk memanggil table role dan tampilkan fetchAll agar dapat dipanggil id nya
try{
  $role_query = $db->query("SELECT * FROM roles");
  $role_data = $role_query->fetchAll();  
}catch(Exception $e){
  echo"Gagal :" . $e->getMessage();
}
//query tidak jauh berbeda seperti insert into lainnya
try{
  if(isset($_POST['simpan'])){
    $nama = $_POST['name'];
    $jk = $_POST['gender'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role_id'];
    $users_query = $db->query("INSERT INTO users (name, gender,username, password, role_id) 
    VALUES ('$nama' ,'$jk','$username','$password','$role')");
    //session alert untuk menampikan pesan bila add data berhasil
    $_SESSION['add'] = '<strong>Berhasil</strong> Tambah Data!!';
    header("location:users_list.php");
  }
}catch(Exception $e){
  echo"Gagal :" . $e->getMessage();
}
// echo"<pre>";
// print_r($_POST);
// $users_query = $db->query("INSERT INTO users (name, username, password, role_id)")

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
    <label for="name">Nama</label>
    <input type="text" class="form-control" id="role" name ="name" placeholder="Masukan Nama">
     <br>
     <label for="gender">Jenis Kelamin</label>
     <select name="gender" id="gender" class="form-control">
      <option value="laki-laki">Laki-Laki</option>
      <option value="perempuan">Perempuan</option>
     </select>
     <br>
    <label for="username">Username</label>
    <input type="text" class="form-control" id="role" name ="username" placeholder="Masukan Username">
    <br>
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name ="password" 
    placeholder="masukan password">
    <br>
    <label for="role">Pilih Role</label>
    <select name="role_id" id="role" class="form-control">
       <!-- values berisi data yang akan dimasukan ke database yaitu id nya dan
        didalam option adalah data yang akan ditampilkan 
        dan yang di LOOPING adalah data dari roles yang sudah dipanggil dari query diatas-->
      <?php foreach($role_data as $index => $role) :?>
      <option value="<?= $role['id'];?>"><?= $role['name'];?></option>
      <?php endforeach; ?>
    </select>
    <br>
      <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
      <a href="users_list.php"  class="btn btn-info">&laquo; Kembali</a>
  </div>
</form>
</body>
</html>