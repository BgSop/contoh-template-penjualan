<?php 
	include "../koneksi.php";
if (@$_GET['dari'] != "" and $_GET['sampai'] != "") {
        $squ = "where date(tanggal_jual) between '$_GET[dari]' and '$_GET[sampai]' ";
        $ket = "$_GET[dari] s/d $_GET[sampai]";
    }else{

    $squ = "ORDER BY a.id_penjualan";
}
?>
<body onload="javascript:print()">
<table align="center">
	<tr>
		<td><img src="../images/logo.png" width="100px"></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>
			<h3 align="center" style="margin: 0px">PT. ABC SEJAHTERA SENTOSA</h3>
			<h5 align="center" style="margin: 0px">Jl. Bypass KM 20 Padang Barat, Sumatera Barat</h5>
			<h4 align="center" style="margin: 0px">Laporan Data Penjualan</h4>
      <h4 align="center" style="margin-top: 0px">(<?php echo $ket; ?>)</h4>
		</td>
	</tr>
</table>
<br>
<table width="100%" border="1" align="center" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Member</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Jual</th>
                                    <th>Harga Jual</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = mysqli_query($koneksi,"SELECT * FROM tbl_penjualan a join tbl_member b on a.id_member=b.id_member join tbl_barang c on a.id_barang=c.id_barang $squ");
                                $cek = mysqli_num_rows($sql);
                                if ($cek < 1) {
                                ?>
                    <tr>
                        <td colspan="13" class="p-3">Data tidak ditemukan</td>
                    </tr>
                    <?php
                } else {
                    $no = 1;
                    $total_penjualan = 0;
                    while ($data = mysqli_fetch_array($sql)) {
                        $sup = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tbl_penjualan a join tbl_member b on a.id_member=b.id_member join tbl_barang c on a.id_barang=c.id_barang $squ"));
                            $total_harga = $data['jumlah_jual'] * $data['harga_jual'];
                            $total_penjualan += $total_harga;
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data['tanggal_jual']; ?></td>
                            <td><?php echo $data['nama_member']; ?></td>
                            <td><?php echo $data['kode_barang']; ?></td>
                            <td><?php echo $data['nama_barang']; ?></td>
                            <td><?php echo $data['jumlah_jual']; ?></td>
                            <td>Rp. <?php echo number_format($data['harga_jual']); ?></td>
                            <td>Rp. <?php echo number_format($total_harga); ?></td>
                        </tr>
                    <?php
                        }
                        } ?>
                            </tbody>
                                <tr>
                                    <td colspan="7" align="center">Total Penjualan</td>
                                    <td>Rp. <?php echo number_format($total_penjualan); ?></td>
                                </tr>
                        </table>
          <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
          		<tr>
          			<td width="63%">
          				&nbsp;
          			</td>
          			<td width="37%">
          				<div align="center">
          					<?php 
          						$tgl = date('d M Y');
          						echo "Padang, $tgl";
          					?>
          					<br>
          					<br>
          					<br>
          					Pimpinan
          				</div>
          			</td>
          		</tr>
          </table>
</body>