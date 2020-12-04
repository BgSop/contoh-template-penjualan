<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Member</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<!-- /.row -->

			<!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tambah Data Member
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" method="POST" role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Nama Member </label>
                                            <input type="text" name="nama_member" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>No HP </label>
                                            <input type="text" name="no_hp" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" name="alamat"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Email </label>
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control" name="jenis_kelamin">
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="Aktif">Aktif</option>
                                                <option value="Tidak Aktif">Tiddak Akrif</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Foto </label>
                                            <input type="file" name="foto" class="form-control">
                                        </div>
                                        <input type="submit" name="simpan" class="btn btn-primary" value="SIMPAN">
                                        <input type="reset" class="btn btn-danger" value="BATAL">
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->

        <?php 
            if(isset($_POST['simpan'])){
                $nama_foto      = $_FILES['foto']['name'];
                $lokasi_foto    = $_FILES['foto']['tmp_name'];
                $ipe_foto       = $_FILES['foto']['type'];

                if($lokasi_foto==""){
                    $query = "INSERT INTO tbl_member 
                    set nama_member='$_POST[nama_member]', 
                    nohp='$_POST[nohp]', 
                    alamat='$_POST[alamat]', 
                    email='$_POST[email]', 
                    jenis_kelamin='$_POST[jenis_kelamin]', 
                    status='$_POST[status]'";
                }else{
                move_uploaded_file($lokasi_foto, "../images/$nama_foto");
                $query = "INSERT INTO tbl_member 
                    set nama_member='$_POST[nama_member]', 
                    nohp='$_POST[nohp]', 
                    alamat='$_POST[alamat]', 
                    email='$_POST[email]', 
                    jenis_kelamin='$_POST[jenis_kelamin]', 
                    status='$_POST[status]', 
                    foto='$nama_foto'";
                $proses = mysqli_query($koneksi,$query) or die (mysqli_error());
        }
                echo "<script>alert('Data Berhasil Di Simpan')
                        window.location='?page=data_member';
                        </script>";
            }
        ?>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

</div>