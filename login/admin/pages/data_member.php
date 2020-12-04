<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Member</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a class="btn btn-info" href="?page=tambah_member">Tambah Data</a>
                    </div>
                    <!-- /.panel-heading -->
                    <?php 
                        $barang = mysqli_query($koneksi,"SELECT * FROM tbl_member");
                        $no=1;
                    ?>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama Member</th>
                                    <th>No HP</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        <?php while($data = mysqli_fetch_array($barang)) {
                        ?>
                            <tbody>
                                <tr class="odd gradeX">
                                    <td><?php echo $no++ ?></td>
                                    <td><img width="100px" src="../images/<?php echo $data['foto']; ?>"></td>
                                    <td><?php echo $data['nama_member']; ?></td>
                                    <td><?php echo $data['nohp']; ?></td>
                                    <td><?php echo $data['alamat']; ?></td>
                                    <td><?php echo $data['email']; ?></td>
                                    <td><?php echo $data['jenis_kelamin']; ?></td>
                                    <td><?php echo $data['status']; ?></td>
                                    <td><a class="fa fa-edit fa-2x" href="?page=edit_member&id=<?php echo $data['id_member'] ?>"></a>  <a class="fa fa-trash  fa-2x" href="?page=hapus_member&id=<?php echo $data['id_member'] ?>"></a></td>
                                </tr>
                            </tbody>
                        <?php } ?>
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