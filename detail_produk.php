		<!-- banner -->
		<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">

					<ul class="short">
						<li>
							<a href="index.html">Home</a>
							<i>|</i>
						</li>
						<li>Detail Produk</li>
					</ul>
				</div>
			</div>

		</div>
		
	</div>
		<!--//banner -->
		<!--/shop-->
		<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
			<div class="container">
				<div class="inner-sec-shop pt-lg-4 pt-3">
		<?php 
			$barang = mysqli_query($koneksi,"SELECT * FROM tbl_barang WHERE nama_barang='$_GET[id]'");
			while($data = mysqli_fetch_array($barang)) { 
		?>
					<div class="row">
								<div class="col-lg-4 single-right-left ">
									<div class="grid images_3_of_2">
										<div class="flexslider1">
					
											<ul class="slides">
												<div class="thumb-image"> <img src="<?= $base_url ?>/login/img/<?php echo $data['foto']; ?>" data-imagezoom="true" class="img-fluid" alt=" "> </div>
											</ul>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="col-lg-8 single-right-left simpleCart_shelfItem">
									<h3><?php echo $data['nama_barang']; ?></h3>
									<p><span class="item_price">Rp. <?php echo number_format($data['harga_jual']); ?></span>
									</p>
									<div class="color-quality">
										<div class="color-quality-right">
											<h5>Stok : <?php echo $data['stok']; ?> PCS</h5>
										</div>
									</div>
									<div class="occasional">
										<h5>Deskripsi Produk :</h5>
										<div class="col-lg-12">
											<label><i></i> <?php echo $data['deskripsi']; ?></label>
										</div>
										<div class="clearfix"> </div>
									</div>

										<a href="#" target="_blank" class="btn btn-info">Belanja Sekarang</a>

									<ul class="footer-social text-left mt-lg-4 mt-3">
											<li>Share On : </li>
											<li class="mx-2">
												<a href="#">
													<span class="fab fa-facebook-f"></span>
												</a>
											</li>
											<li class="mx-2">
												<a href="#">
													<span class="fab fa-twitter"></span>
												</a>
											</li>
											<li class="mx-2">
												<a href="#">
													<span class="fab fa-google-plus-g"></span>
												</a>
											</li>
											<li class="mx-2">
												<a href="#">
													<span class="fab fa-linkedin-in"></span>
												</a>
											</li>
											<li class="mx-2">
												<a href="#">
													<span class="fas fa-rss"></span>
												</a>
											</li>
											
										</ul>
			
								</div>
								<div class="clearfix"> </div>
					</div>
			<?php } ?>
				</div>
			</div>
				
		</section>