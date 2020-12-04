<?php 
	include "../koneksi.php";
if (@$_GET['dari'] != "" and $_GET['sampai'] != "") {
        $squ = "where date(tanggal) between '$_GET[dari]' and '$_GET[sampai]' ";
        $ket = "$_GET[dari] s/d $_GET[sampai]";
    }else{

    $squ = "ORDER BY a.id_barang";
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
			<h4 align="center" style="margin: 0px">Laporan Data Barang</h4>
      <h4 align="center" style="margin-top: 0px">(<?php echo $ket; ?>)</h4>
		</td>
	</tr>
</table>
<br>
<table width="100%" border="1" align="center" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Nama Kategori</th>
                                    <th>Satuan</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Tanggal</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
			$sql = mysqli_query($koneksi,"SELECT * FROM tbl_barang a left join tbl_kategori b ON a.id_kategori=b.id_kategori $squ") or die(mysqli_error());
			$cek = mysqli_num_rows($sql);
			if ($cek < 1) {
			?>
				<tr>
					<td colspan="13" style="padding:10px;">Data tidak ditemukan</td>
				</tr>
					<?php
						} else {
							$no = 1;
							while ($data = mysqli_fetch_array($sql)) {
						$sup = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tbl_barang a left join tbl_kategori b ON a.id_kategori=b.id_kategori $squ"));
					?>
				<tr>
					 <td><?php echo $no++ ?></td>
            <td><?php echo $data['kode_barang']; ?></td>
            <td><?php echo $data['nama_barang']; ?></td>
            <td><?php echo $data['nama_kategori']; ?></td>
            <td><?php echo $data['satuan']; ?></td>
            <td><?php echo $data['harga_beli']; ?></td>
            <td><?php echo $data['harga_jual']; ?></td>
            <td><?php echo $data['tanggal']; ?></td>
            <td><?php echo $data['stok']; ?></td>
				</tr>
				<?php } ?>
			<?php	} ?>
                            </tbody>
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