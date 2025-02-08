<?php
include("connection.php");
include("login_check.php");
// session_start();
$goods_query = $db->query("SELECT * FROM goods");
$goods_data = $goods_query->fetchAll();
// code untuk menyimpan data kedalam tabel kasir 
//sebelum membuat kondisi ini buat dlu file cart nya beserta logikanya 
//dan totals memakai tambah atau sama dengan karena setiap barang yang ditambah harganya juga ditambahkan, jika tidak ditambah '+' maka variabel total akan mengambil nilai total dari barang terbaru yang ditambahkan
$totals = 0;
if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] AS $index => $data){
        $totals += $data['harga'] * $data['qty'];
    }
}
// echo "<pre>";
// print_r($goods_data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- CSS Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- JS Select2 (pastikan jQuery sudah disertakan) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <title>Halaman Kasir</title>
</head>
<body>
     <div class="container mt-3">
        <h3>Hallo <?= $_SESSION['name'] ?>, Selamat BerAktivitas</h3>
        <!-- form select produk yang dimasukan kedala tabel -->
        <div class="row">
          <div class="col-md-6">
              <form action="carts.php" method="POST" class="form-inline">
                  <div>
                    <select name="barang" id="barang" class="form-control">
                      <?php foreach($goods_data AS $index => $barang) : ?>
                      <option value="<?= $barang['id'];?>"> <?= $barang['name'];?> </option>
                      <?php endforeach; ?>
                    </select> 
                    <input type="text" name="qty" class="form-control" placeholder="jumlah">
                      <span class="input-group-btn">
                          <button class="btn btn-outline-primary" type="submit" id="simpan" name="simpan">Tambah</button>
                      </span>
                  </div>
              </form>
          </div>
        </div>
        <br>
        <!-- untuk tabel kasir yang menerima data dari select form diatas -->
          <a href="carts_reset.php" class="btn  btn-warning" onclick="return confirm('Yakin ingin mereset keranjang??')">RESET KERANJANG</a>
          <a href="logout.php" class="btn btn-outline-secondary">logout</a>
          <h5 align="right">total Harga Belanja : Rp.  <?= number_format($totals);?> </h5>
          <br>
          <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>no</th>
                    <th>nama</th>
                    <th>Harga satuan</th>
                    <th>jumlah</th>
                    <th>Total semua</th>
                    <th>Hapus</th>
                  </tr>
                </thead>
                <tbody>
                <!-- <form action="cart_update.php" method="POST"> -->
                  <?php foreach($_SESSION['cart'] AS $index => $data) :?>
                  <tr>
                    <td><?= $index +1;?></td>
                    <td width="30%"><?= $data['nama'];?></td>
                    <td width ="25%" align="right"> Rp <?= number_format($data['harga']);?></td>
                    <!-- <td align="right" width="15%"><input type="number" name="qty" value="<?= $data['qty'];?>" class="form-control" ></td> -->
                    <td align="right" width="15%"><?= $data['qty'];?></td>
                    <td width ="20%" align="right"> Rp <?= number_format($data['qty'] * $data['harga']);?></td>
                    <td width="20%">
                      <a href="cart_delete.php?id=<?= $data['id'];?>" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus data??')">X</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  <!-- <button type="submit" name="cart_update" class="btn btn-warning">Tambah</button> -->
                  <!-- </form> -->
                </tbody>
          </table>
          
      </div>
      <!-- scrip untuk select bisa sekalia search -->
  <script>
  $(document).ready(function() {
    $('#barang').select2({
      placeholder: "Pilih barang",
      allowClear: true
    });
  });
</script>
</body>
</html>