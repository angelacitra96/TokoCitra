<?php
require_once "koneksi.php";
$namabrng = $_POST['namaBarang'];
$satuanbrng = $_POST['satuan'];
$hargabrng = $_POST['harga'];

$sql = "INSERT INTO tb_barang VALUES(null,'$namabrng','$satuanbrng','$hargabrng')";

if($conn->query($sql) === TRUE){
    echo "<script>alert('Data berhasil disimpan')</script>";
    echo "<script>window.location.assign('index.php?p=formBarang')</script>";
}else{
    echo "<script>alert('Data gagal disimpan.$conn->error')</script>";
    echo "<script>window.location.assign('index.php?p=formBarang')</script>";
}

?>