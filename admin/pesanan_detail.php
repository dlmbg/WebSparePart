<?php include("include/header.php"); ?>
<?php include("include/menu_admin.php"); ?>


<div class="cleaner_h10"><div id="space-white"><div id="inner-space-white-left"></div><div id="inner-space-white-right"></div></div></div>

<div id="content">

	<div id="content-admin">
	<div class="cleaner_h10"></div>
	<div class="cleaner_h5"></div>
		<ul id="crumbs" style="width:99%;">
			<li><a href="#">Home &raquo;</a></li>
			<li>Detail Pesanan</li>
		</ul>
		
		
		<div class="cleaner_h20"></div>
		
		
		<?php
			$kueri = "SELECT * FROM tbl_pemesanan_detail x left join (select a.nama, a.id_produk, b.kategori, a.keterangan, a.harga from tbl_produk a left join tbl_kategori b on a.id_kategori=b.id_kategori) y on x.id_produk=y.id_produk where x.id_pemesanan='".$_GET['id']."'";
			$STH = $DBH->prepare($kueri);
			$STH->execute();
			
			$total = "";
			while($data = $STH->fetch())
			{
				?>
					<div id="news-list" style="width:98%;">
						<img src="produk/<?php echo $data['gambar']; ?>" />
						<h4>Kategori : <?php echo $data['kategori'].' | Harga : Rp. '.number_format($data['harga'],"2",",","."); ?></h4>
						<h1><?php echo $data['nama']; ?></h1>
						<?php echo $data['keterangan']; ?>
						<div class="cleaner_h5"></div>
							<div class="index-button">Sub Total : <?php echo number_format($data['harga']*$data['jumlah'],"2",",","."); ?></div>
							<div class="index-button">Harga : <?php echo number_format($data['harga'],"2",",","."); ?></div>
							<div class="index-button">Jumlah Pesan : <?php echo $data['jumlah']; ?></div>
						<div class="cleaner_h5"></div>
					</div>
				<?php
				$total += $data['harga']*$data['jumlah'];
			}
			echo '<div class="index-button">Total Harga : '.number_format($total,"2",",",".").'</div>';
		?>
			
		
	<div class="cleaner_h10"></div>
	<div class="cleaner_h5"></div>
	</div><!--akhir content-left -->

<div class="cleaner_h0"></div>

</div><!--akhir content -->

<div class="cleaner_h10"><div id="space-white"><div id="inner-space-white-left"></div><div id="inner-space-white-right"></div></div></div>

<?php include("../include/bottom.php"); ?>

<div class="cleaner_h20"></div>
<?php include("include/footer.php"); ?>
