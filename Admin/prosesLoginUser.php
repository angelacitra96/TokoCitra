<?php
require_once "koneksi.php";
$nama = $_POST['namaUser'];
$password = md5($_POST['passwordUser']);

// mengambil data berdasarkan nama & password
$sql = "SELECT*FROM tb_users WHERE nama_user= '$nama' AND password_user='$password'";
$result = $conn->query($sql);

// jika data tersedia
if ($result->num_rows > 0){
    while($row=$result->fetch_assoc()){
        // menyimpan ke dalam session
        session_start();
        $_SESSION['statusLogin']= 1;
        $_SESSION['idUser']=$row['id_user'];
        $_SESSION['namaUser']=$row['nama_user'];
    }
    header("location:index.php");
    
}else{
    // jika data tidak tersedia
    echo "<script>alert('Username atau password salah, ulangi kembali')</script>";
    echo "<script>window.location.assign('../index.php')</script>";
}
?>