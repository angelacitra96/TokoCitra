<div style="min-height: 650px; padding: 4rem!important">
    <div class= "container-fluid text-center"><h1><b>FORM BARANG</b></h1></div>
                <form action="prosesInsertBarang.php" method="post">
                    <div class="form-group">
                        <label class="control-label">Nama Barang:</label>
                        <input type="text" name="namaBarang" placeholder="Masukkan Nama" required autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Satuan Barang:</label>
                         <input type="text" name="satuan" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Harga Barang:</label>
                        <input type="number" name="harga" required class="form-control"><br>
                        
                        <input type="submit" value="Simpan" class="btn btn-info">
                   </div>
                </form>
                <br>
                <!-- Tabel data -->
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Satuan Barang</th>
                            <th>Harga Barang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // jika $_GET['q'] ada isinya
                        if(isset($_GET['q'])){
                            // yang dijalankan jika ada isinya
                            $q = $_GET['q'];
                            $sql = "SELECT*FROM tb_barang WHERE nama_barang LIKE '%$q%'";
                        }else{
                            // jika $_GET['q'] tidak ada isinya
                            $sql = "SELECT*FROM tb_barang";
                        }
                           
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                // Akan dijalankan jika recordnya ada
                                while($row = $result->fetch_assoc()){ ?> 
                                    <tr>
                                        <td><?=$row['id_barang']?></td>
                                        <td><?=$row['nama_barang']?></td>
                                        <td><?=$row['satuan_barang']?></td>
                                        <td><?=$row['harga_barang']?></td>
                                        <td>
                                            <a onclick="return confirm('Anda yakin akan menghapus record ini?')" class="btn btn-danger"
                                            href="prosesDeleteBarang.php?id=<?=$row['id_barang']?>">Delete</a>
                                            
                                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="showUpdateForm('<?=$row['id_barang']?>', '<?=$row['nama_barang']?>', '<?=$row['satuan_barang']?>', '<?=$row['harga_barang']?>')"
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
 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><h5>FORM UPDATE DATA BARANG</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form action="prosesUpdateBarang.php" method="POST">
                    <div class="form-group row">
                        <label class="control-label">
                            ID Barang:
                        </label>
                        <input type="text" name="id_barang"  style="width: 450px" id="modal-id-user" required autocomplete="off" class="form-control" readonly>
                    </div>
                    <div class="form-group row">
                        <label class="control-label">
                        Nama User: 
                        </label>
                        <input type="text" name="namaBarang"  style="width: 450px" placeholder="Masukkan Nama" required autocomplete="off" id="modal-nama-user" class="form-control">
                    </div>
                    <div>
                        <label class="form-group row">
                        Satuan Barang:
                        </label>
                        <input type="text" name="satuan" required id="modal-email-user" class="form-control">
                    </div>
                    <div>
                        <label class="form-group row">
                        Harga Barang:
                        </label>
                        <input type="number" name="harga" required id="modal-email-user" class="form-control">
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
        <script>
//  <!-- Fungsi untuk menampilkan nilai pada form update -->
 function showUpdateForm (id,nama,email,password){
    //  <!-- document.getElementById adalah cara pada js DOM untuk mengambil elemen pada hal -->
     document.getElementById('modal-id-user').value = id;
     document.getElementById('modal-nama-user').value = nama;
     document.getElementById('modal-email-user').value = email;
    

 }
</script>  