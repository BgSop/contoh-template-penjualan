<?php
    $squ=""; 
    if(@$_POST['status'] !="") {
    if($_POST['status']=='Semua Data') {
    $squ = "ORDER BY id_member";
    }else{
        $squ = "WHERE status='$_POST[status]' ";
    }
}
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan Member</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                <form action="" method="POST">
                    <div class="panel-heading">
                        <label>Pilih Status</label>
                        <select class="form-control" name="status">
                            <option value="Semua Data">Semua Data</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                       
                        <button type="submit" name="cari" class="btn btn-danger">Cari</button>
                        <a class="btn btn-warning" target="_blank" href="cetak_laporan_member.php?status=<?php echo $_POST['status']; ?>"><i class="fa fa-print"> Cetak Laporan</i></a>
                </form>
                    <!-- /.panel-heading -->
                   
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Member</th>
                                    <th>No HP</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = mysqli_query($koneksi,"SELECT * FROM tbl_member $squ");
                                $cek = mysqli_num_rows($sql);
                                if ($cek < 1) {
                                ?>
                    <tr>
                        <td colspan="13" class="p-3">Data tidak ditemukan</td>
                    </tr>
                    <?php
                } else {
                    $no = 1;
                    while ($data = mysqli_fetch_array($sql)) {
                        $sup = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tbl_member $squ"));
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data['nama_member']; ?></td>
                            <td><?php echo $data['nohp']; ?></td>
                            <td><?php echo $data['alamat']; ?></td>
                            <td><?php echo $data['email']; ?></td>
                            <td><?php echo $data['jenis_kelamin']; ?></td>
                            <td><?php echo $data['status']; ?></td>
                        </tr>
                    <?php
                        }
                        } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
</div>

