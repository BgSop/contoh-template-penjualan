<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Barang</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<!-- /.row -->

			<!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tambah Data Barang
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" method="POST" role="form">
                                        <div class="form-group">
                                            <label>Kode Barang </label>
                                            <input type="text" name="kode_barang" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Barang </label>
                                            <input type="text" name="nama_barang" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Selects</label>
                                            <select class="form-control" name="id_kategori">
                                                <?php
                                                    $query = mysqli_query($koneksi,"select * from tbl_kategori");
                                                
                                                while($data = mysqli_fetch_assoc($query)) {
                                                    echo "<option value=\"$data[id_kategori]\">$data[nama_kategori]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Satuan </label>
                                            <input type="text" name="satuan" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Harga Beli </label>
                                            <input type="text" name="harga_beli" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Harga Jual </label>
                                            <input type="text" name="harga_jual" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal </label>
                                            <input type="date" name="tanggal" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Stok </label>
                                            <input type="text" name="stok" class="form-control">
                                        </div>

                                        <input type="submit" name="simpan" class="btn btn-primary" value="SIMPAN">
                                        <input type="reset" class="btn btn-danger" value="BATAL">
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->

        <?php 
            if(isset($_POST['simpan'])){
                $query = mysqli_query($koneksi,"INSERT INTO tbl_barang 
                    set id_barang='', 
                    kode_barang='$_POST[kode_barang]', 
                    nama_barang='$_POST[nama_barang]', 
                    id_kategori='$_POST[id_kategori]', 
                    satuan='$_POST[satuan]', 
                    harga_beli='$_POST[harga_beli]', 
                    harga_jual='$_POST[harga_jual]', 
                    tanggal='$_POST[tanggal]', 
                    stok='$_POST[stok]'");
                echo "<script>alert('Data Berhasil DI Simpan')
                        window.location='?page=data_barang';
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