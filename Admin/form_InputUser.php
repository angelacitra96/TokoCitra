<?php require_once "koneksi.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-dark text-center" style="height: 100px; background-color: antiquewhite"> <b> FORM INPUT USER </b>
            </div>
            <nav class="navbar col-12 navbar-expand-lg navbar-dark bg-dark sticky-top">
                <a class="navbar-brand" href="#">Masukkan Data User</a>
                <button class="navbar-toggler navbar-toggler-right"
                    type="button" data-toggle="collapse"
                    data-target="#navb">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navb">
                    <!-- <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Facilities</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Guest Book</a>
                            <div class="form-group">
                        </li>
                    </ul> -->
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="text"
                        placeholder="Search.." name="q">
                        <button class="btn btn-success my-2 my-sm-0"
                        type="submit">Search</button>
                    </form>
                </div>
                </div>

            </nav>
            <div style="min-height: 650px; padding: 4rem!important">
                <form action="prosesinsert.php" method="post">
                    <div class="form-group">
                        <label class="control-label">Nama User:</label>
                        <input type="text" name="namaUser" placeholder="Masukkan Nama" required autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email User:</label>
                         <input type="email" name="emailUser" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password:</label>
                        <input type="password" name="passwordUser" required class="form-control"><br>
                        
                        <input type="submit" value="Simpan" class="btn btn-info">
                   </div>
                </form>
                <br>
                <!-- Tabel data -->
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // jika $_GET['q'] ada isinya
                        if(isset($_GET['q'])){
                            // yang dijalankan jika ada isinya
                            $q = $_GET['q'];
                            $sql = "SELECT*FROM tb_users WHERE nama_user LIKE '%$q%'";
                        }else{
                            // jika $_GET['q'] tidak ada isinya
                            $sql = "SELECT*FROM tb_users";
                        }
                           
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                // Akan dijalankan jika recordnya ada
                                while($row = $result->fetch_assoc()){ ?> 
                                    <tr>
                                        <td><?=$row['id_user']?></td>
                                        <td><?=$row['nama_user']?></td>
                                        <td><?=$row['email_user']?></td>
                                        <td>
                                            <a onclick="return confirm('Anda yakin akan menghapus record ini?')" class="btn btn-danger"
                                            href="prosesDeleteUser.php?id=<?=$row['id_user']?>">Delete</a>
                                            <!-- <a href="formUpdate.php?id=<?=$row['id_user']?>" data-toggle="modal " data-target="#exampleModal" class="btn btn-primary">Update</a> -->
                                            <a href="?id=<?=$row['id_user']?>" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="showUpdateForm('<?=$row['id_user']?>', '<?=$row['nama_user']?>', '<?=$row['email_user']?>')"
                                            href="">
                                            Update
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                }else{
                                    // akan dijelaskan jika recordnya hilang
                                    echo "<tr><td colspan='3'>Record masih kosong</td></tr>";

                                }
                                ?>
                    </tbody>
                </table>
            </div>
        
        </div>
    </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><h5>FORM UPDATE DATA USER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form action="prosesUpdateUser.php" method="POST">
                    <div class="form-group row">
                        <label class="control-label">
                            ID User:
                        </label>
                        <input type="text" name="idUser"  style="width: 450px" id="modal-id-user" required autocomplete="off" class="form-control" readonly>
                    </div>
                    <div class="form-group row">
                        <label class="control-label">
                        Nama User: 
                        </label>
                        <input type="text" name="namaUser"  style="width: 450px" placeholder="Masukkan Nama" required autocomplete="off" id="modal-nama-user" class="form-control">
                    </div>
                    <div>
                        <label class="form-group row">
                        Email User:
                        </label>
                        <input type="email" name="emailUser" required id="modal-email-user" class="form-control">
                    </div>
                        
                    <div>
                        <input type="submit" value="Update" class="btn btn-primary">
                    </div>
                   
                </form>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
            </div>
        </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
 <script>
 <!-- Fungsi untuk menampilkan nilai pada form update -->
 function showUpdateForm (id,nama,email,password){
    //  <!-- document.getElementById adalah cara pada js DOM untuk mengambil elemen pada hal -->
     document.getElementById('modal-id-user').value = id;
     document.getElementById('modal-nama-user').value = nama;
     document.getElementById('modal-email-user').value = email;
    

 }
</script>   
</body>
</html>

