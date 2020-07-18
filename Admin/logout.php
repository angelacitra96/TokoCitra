<?php
session_start();
// menghapus semua nilai session
session_unset();
// menghancurkan session
session_destroy();

// kembali ke halaman login
header("location:../index.php");
?>