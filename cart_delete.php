<?php
include("connection.php");
//seperti biasa start sesi dlu
session_start();
//lalu dapatkan data dari parameter id di halaman hasil yang mengarah ke halaman ini dan ditangkap dengan method $_GET
$id_cart = $_GET['id'];
//lalu buat variabel untuk menangkap data session dari keranjang yang disimpan oleh sesi
$cart = $_SESSION['cart'];
//berfungsi untuk menyaring data secara spesifik  sesuai parameter yang digunakan
//pertama panggil variable yang menyimpan sesi keranjang lalu buat anon fungsi beserta parameternya bebas dan gunakan use untuk mengggunakan variabel diluar fungsi gunakan use untuk menangkap data variable yang nanti data dari variabel id akan dimasukan kedalam parameter
//lalu tinggal di return data sesuai parameter dengan array dari variabel yang dipanggil menggunakan use
$cart_delete = array_filter($cart, function ($delete) USE ($id_cart){
  return ($delete['id'] == $id_cart);
});
//perulangan dilakukan untuk mendaatkan data secara lebih spesifik saat mau menghapus sesi sesuai index yang di dapat dari variabel cart_delete
foreach($cart_delete AS $index => $data ){
  unset($_SESSION['cart'][$index]);
}
//fungsi untuk mengatur ulang nilai array agar kembali berurutan, karena saat dihapus menggunakan unset misal 0,1,2,, jika nomor 1 dihapus jadi nya 0,2 , untuk mengatur penomooran digunakan fungsi ini \\ note: ini masih dasar dan belum sempurna dan tidak efisien karena terlalu banyak sesi yang digunakan
$_SESSION['cart'] = array_values($_SESSION['cart']);
header("location:cashier.php");
?>