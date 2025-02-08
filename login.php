<?php
include("connection.php");
session_start();
// include("login_check.php");
try{
if(isset($_POST['simpan'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $db->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
    $login_data = $query->fetch();
    //jika ingin menggunakan rowCount untuk menghitung nilai 0 atau 1, langsung panggil $query karena rowCount tidak bisa menerima hasil dari fatch, rowCount hanya bisa menerima hasil dari Php Document Objeck(PDO) dan pengkondisian di if diganti jadi !check dan session failed ditukar keatas
    $check = $query->rowCount(); 
    if ($check >0) { 
      $_SESSION['id_user'] = $login_data['id'];
      $_SESSION['name'] = $login_data['name'];
      $_SESSION['role'] = $login_data['role_id'];
      header("location:login_check.php");
    } else {
      $_SESSION['failed'] = '<strong>Username</strong> atau <strong>Password</strong> anda salah';
    }
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
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <title>Login Form</title>
</head>
<body>
  <div class="container">
    <h3>Login Form</h3>
    <!-- include untuk memanggil alert error jika belum login -->
    <?php include("alert_action.php"); ?>
    <form method="POST">
      <div class="form-group">
        <label for="username">Email address</label>
        <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Masukan Username" name="username">
        <small id="emailHelp" class="form-text text-muted">Never give your username and Password to anybody</small>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Masukan Password" name="password">
      </div>
      <button type="submit" class="btn btn-primary" name="simpan">Submit</button>
    </form>
</div>
</body>
</html>