<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Penjualan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<!-- /.row -->

			<!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tambah Data Penjualan
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" method="POST" role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Kode Barang </label>
<select type="text" name="id_barang" id="id_barang" class="form-control" onchange="changeValue(this.value)">
    <option value="">Pilih Kode</option>
        <?php 
        $result = mysqli_query($koneksi,"select * from tbl_barang");
        $jsArray = "var dtpgj = new Array ();\n";
        while($row=mysqli_fetch_array($result)){
            echo'<option value="'. $row['id_barang'].'">'. $row['kode_barang'] .'</option>';
            $jsArray .="dtpgj ['".$row['id_barang']."']= {kode_barang :'" . addslashes($row['kode_barang']). "',nama_barang :'" . addslashes($row['nama_barang']). "',harga_jual :'" . addslashes($row['harga_jual']). "'};\n";

        }
     ?>
</select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Barang </label>
                                            <input type="text" id="nama_barang" name="nama_barang" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Harga Jual </label>
                                            <input type="text" id="harga_jual" name="harga_jual" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Member </label>
                                            <select class="form-control" name="id_member">
                                                <?php
                                                    $member = mysqli_query($koneksi,"select * from tbl_member");
                                                
                                                while($mem = mysqli_fetch_assoc($member)) {
                                                    echo "<option value=\"$mem[id_member]\">$mem[nama_member]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Jual </label>
                                            <input type="text" name="jumlah_jual" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal </label>
                                            <input type="date" name="tanggal_jual" class="form-control">
                                        </div>
                                        <input type="submit" name="simpan" class="btn btn-primary" value="SIMPAN">
                                        <input type="reset" class="btn btn-danger" value="BATAL">
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->

        <?php 
            if(isset($_POST['simpan'])){
                $query = mysqli_query($koneksi,"INSERT INTO tbl_penjualan 
                    set  
                    id_barang='$_POST[id_barang]', 
                    id_member='$_POST[id_member]', 
                    jumlah_jual='$_POST[jumlah_jual]', 
                    tanggal_jual='$_POST[tanggal_jual]'");
                echo "<script>alert('Data Berhasil Di Simpan')
                        window.location='?page=data_penjualan';
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

<script type ="text/javascript">
             <?php echo $jsArray; ?>
             function changeValue (id_barang){
             document.getElementById('nama_barang').value = dtpgj[id_barang].nama_barang;
             document.getElementById('harga_jual').value = dtpgj[id_barang].harga_jual;
             document.getElementById('kode_barang').value = dtpgj[id_barang].kode_barang;
            };
</script>