  <?php
  session_start();

  if (!isset($_SESSION['id_user'])) {
      $_SESSION['not_login'] = "Anda Harus <strong>Login</strong> terlebih dahuluu";
      header("location:login.php");
      exit();
  }

  // Jika role adalah 3 dan halaman ini bukan dashboard.php, arahkan ke dashboard
  //untuk login kasir
  if ($_SESSION['role'] == 3 && basename($_SERVER['PHP_SELF']) != "cashier.php") {
      header("location:cashier.php");
      exit();
  }
  //untuk login admin
  if ($_SESSION['role'] == 2 && basename($_SERVER['PHP_SELF']) != "dashboard.php") {
    header("location:dashboard.php");
    exit();
  }
  ?>
