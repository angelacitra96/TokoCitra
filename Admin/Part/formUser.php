<div style="min-height: 650px; padding: 4rem!important">
    <div class="container-fluid text-center"><h1><b>FORM USER</b></h1></div>
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
                                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="showUpdateForm('<?=$row['id_user']?>', '<?=$row['nama_user']?>', '<?=$row['email_user']?>')"
                                            >
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
            <!-- modal -->
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
            <script>
//  <!-- Fungsi untuk menampilkan nilai pada form update -->
 function showUpdateForm (id,nama,email,password){
    //  <!-- document.getElementById adalah cara pada js DOM untuk mengambil elemen pada hal -->
     document.getElementById('modal-id-user').value = id;
     document.getElementById('modal-nama-user').value = nama;
     document.getElementById('modal-email-user').value = email;
    

 }
</script>   