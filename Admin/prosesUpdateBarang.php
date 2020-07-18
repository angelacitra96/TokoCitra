<?php
require_once "koneksi.php";
$idbrng = $_POST['id_barang'];
$namabrng = $_POST['namaBarang'];
$satuanbrng = $_POST['satuan'];
$hargabrng = $_POST['harga'];
// $password = md5($_POST['passwordUser']);

$sql = "UPDATE tb_barang SET nama_barang='$namabrng', satuan_barang='$satuanbrng', harga_barang='$hargabrng' WHERE id_barang='$idbrng'";

if($conn->query($sql) === TRUE){
    echo "<script>alert('Data berhasil diupdate')</script>";
    echo "<script>window.location.assign('formTabelBarang.php')</script>";
}else{
    echo "<script>alert('Data gagal diupdate.$conn->error')</script>";
    echo "<script>window.location.assign('formTabelBarang.php')</script>";
}

?>