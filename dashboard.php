<?php
include("connection.php");
// session_start();
include("login_check.php");
  // echo"<pre>";
  // print_r($_SESSION);
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
    <h1>Halaman dashboard</h1>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="goods_list.php">Data Barang</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link active " href="role_list.php">Data Role</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active " href="users_list.php">Data users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active " href="logout.php">Logout</a>
        </li>
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>
  </div>
</body>
</html>