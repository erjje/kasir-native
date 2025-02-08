<?php
include("connection.php");
session_start();
if(isset($_POST['barang'])){
  $goods_id = $_POST['barang'];
  $jumlah = $_POST['qty'];
  $query = $db->query("SELECT * FROM goods WHERE id = $goods_id");
  $goods_data = $query->fetch();
  $goods_carts = [
    'id' => $goods_data['id'],
    'nama' => $goods_data['name'],
    'harga' => $goods_data['price'],
    'qty' => $jumlah,
  ];
  $_SESSION['cart'][] = $goods_carts;
  header("location:cashier.php");
  // echo"<pre>";
  // print_r($goods_carts);
}
?>