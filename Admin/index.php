
<!-- include_once -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style>
        .float_right{
            float: right;
            padding-right:2px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-dark text-center" style="height: 100px; background-color: rgb(151, 142, 91)"> <h1><b> FORM INPUT</b></h1>
            </div>
            <nav class="navbar col-12 navbar-expand-lg navbar-dark bg-dark sticky-top">
                <a class="navbar-brand" href="#">My Logo</a>
                <button class="navbar-toggler navbar-toggler-right"
                    type="button" data-toggle="collapse"
                    data-target="#navb">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navb">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="?p=formUser">User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?p=formBarang">Barang</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                Transaksi
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="?p=formTransaksi">Form Transaksi</a>
                                <a class="dropdown-item" href="?p=dataTransaksi">Data Transaksi</a>
                                <a class="dropdown-item" href="#">Link 3</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php" onclick="return confirm('Anda yakin ingin keluar?')">logout</a>
                        </li>
                    </ul>
                    <span class="text-dark ml-auto">
                        <div style="font-weight:bold"><span class="text-primary">
                                <?php
                                    echo $_SESSION['namaUser'];
                                ?>
                            </span> | <span id="clock"></span>
                        </div>
                    
                    </span>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="text"
                        placeholder="Search.." name="q">
                        <button class="btn btn-success my-2 my-sm-0"
                        type="submit">Search</button>
                    </form>
                </div>

            </nav>

            <div class="col-12 col-md-4 col-lg-2 bg-success text-light">More Info</div>

            <div class="col-12 col-md-8 col-lg-10 bg-light text-dark" style="min-height: 650px">
                
            <?php 
            require_once "koneksi.php";
            session_start();
            if($_SESSION['statusLogin']!=1){
                header("location:../index.php");

            }
             if (isset($_GET['p'])){
                $page =$_GET['p'];
                switch ($page) {    
                case 'formUser':
                include "Part/formUser.php";
                break;
                case 'formBarang':
                include "Part/formBarang.php";
                break;
                case 'formTransaksi':
                include "Part/formTransaksi.php";
                break;	
                case 'dataTransaksi':
                include "DataTransaksi.php";
                break;			
                default:
                echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
                break;
                }
            }else{
            include "Part/formHome.php";
  
            }
            ?>
            
            </div>

            
           

            <div class="col-12 bg-primary text-light">Footer</div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../assets/js/jquery-3.5.1.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/myScript.js"></script>
</body>
</html>