<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Kategori</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<!-- /.row -->

			<!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Data Kategori
                        </div>
                        <?php 
                            $kategori = mysqli_query($koneksi,"SELECT * FROM tbl_kategori WHERE id_kategori='$_GET[id]'");
                        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php 
                                        while($data = mysqli_fetch_array($kategori)) { 
                                    ?>
                                    <form action="" method="POST" role="form">
                                        <div class="form-group">
                                            <label>Nama Kategori </label>
                                            <input type="hidden" class="form-control" name="id_kategori" value="<?php echo $data['id_kategori']; ?>">
                                            <input type="text" class="form-control" name="nama_kategori" value="<?php echo $data['nama_kategori']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea  class="form-control" class="form-control" name="keterangan"><?php echo $data['keterangan']; ?></textarea>
                                        </div>

                                        <input type="submit" name="edit" class="btn btn-primary" value="UPDATE">
                                        <input type="reset" class="btn btn-danger" value="BATAL">
                                    </form>
                        <?php } ?>
                                </div>
                            </div>
                            <!-- /.row (nested) -->

		        <?php 
            if(isset($_POST['edit'])){
                $query = mysqli_query($koneksi,"UPDATE tbl_kategori 
                    set nama_kategori='$_POST[nama_kategori]', 
                    keterangan='$_POST[keterangan]' WHERE id_kategori='$_POST[id_kategori]'");
                echo "<script>alert('Data Berhasil Di Edit')
                        window.location='?page=data_kategori';
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