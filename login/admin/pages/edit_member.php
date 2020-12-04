<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Member</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<!-- /.row -->

			<!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Data Member
                        </div>
                        <?php 
                            $member = mysqli_query($koneksi,"SELECT * FROM tbl_member WHERE id_member='$_GET[id]'");
                        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php 
                                        while($data = mysqli_fetch_array($member)) { 
                                    ?>
                                    <form action="" method="POST" role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Nama Member </label>
                                            <input type="hidden" class="form-control" name="id_member" value="<?php echo $data['id_member']; ?>">
                                            <input type="text" name="nama_member" class="form-control" value="<?php echo $data['nama_member']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>No HP </label>
                                            <input type="text" name="nohp" value="<?php echo $data['nohp']; ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" name="alamat">
                                                <?php echo $data['alamat']; ?>
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Email </label>
                                            <input type="email" value="<?php echo $data['email']; ?>" name="email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control" name="jenis_kelamin">
                                               <?php
                                                    if($data['jenis_kelamin']=="Laki-Laki"){
                                               ?>
                                                <option value="Laki-Laki" selected>Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            <?php }else{ ?>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan" selected>Perempuan
                                        <?php } ?>
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                               <?php
                                                    if($data['status']=="Aktif"){
                                               ?>
                                                <option value="Aktif" selected>Aktif</option>
                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                            <?php }else{ ?>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Tidak Aktif" selected>Tidak Aktif
                                        <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Foto </label>
                                            <img width="50px" src="../images/<?php echo $data['foto']; ?>">
                                            <input type="file" name="foto" class="form-control">
                                        </div>
                                        <input type="submit" name="simpan" class="btn btn-primary" value="SIMPAN">
                                        <input type="reset" class="btn btn-danger" value="BATAL">
                                    </form>
                            <?php } ?>
                                </div>
                            </div>
                            <!-- /.row (nested) -->

        <?php 
            if(isset($_POST['simpan'])){
                $nama_foto      = $_FILES['foto']['name'];
                $lokasi_foto    = $_FILES['foto']['tmp_name'];
                $ipe_foto       = $_FILES['foto']['type'];

                if($lokasi_foto==""){
                    $query = "UPDATE tbl_member 
                    set nama_member='$_POST[nama_member]', 
                    nohp='$_POST[nohp]', 
                    alamat='$_POST[alamat]', 
                    email='$_POST[email]', 
                    jenis_kelamin='$_POST[jenis_kelamin]', 
                    status='$_POST[status]' WHERE id_member='$_POST[id_member]'";
                    $proses = mysqli_query($koneksi,$query) or die (mysqli_error());
                }else{
                move_uploaded_file($lokasi_foto, "../images/$nama_foto");
                $query = "UPDATE tbl_member 
                    set nama_member='$_POST[nama_member]', 
                    nohp='$_POST[nohp]', 
                    alamat='$_POST[alamat]', 
                    email='$_POST[email]', 
                    jenis_kelamin='$_POST[jenis_kelamin]', 
                    status='$_POST[status]', 
                    foto='$nama_foto' WHERE id_member='$_POST[id_member]'";
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