<?php
require_once "koneksi.php";
$idbrng = $_GET['id'];

$sql = "DELETE FROM tb_barang WHERE id_barang='$idbrng'";

if($conn->query($sql) === TRUE){
    echo "<script>alert('Data berhasil dihapus')</script>";
    echo "<script>window.location.assign('index.php?p=formBarang')</script>";
}else{
    echo "<script>alert('Data gagal dihapus.$conn->error')</script>";
    echo "<script>window.location.assign('index.php?p=formBarang')</script>";
}

?>