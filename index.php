<?php include("include/header.php"); ?>
<?php include("include/menu.php"); ?>


<div class="cleaner_h10"><div id="space-white"><div id="inner-space-white-left"></div><div id="inner-space-white-right"></div></div></div>

<?php include("include/slider.php"); ?>

<div class="cleaner_h10"><div id="space-white"><div id="inner-space-white-left"></div><div id="inner-space-white-right"></div></div></div>

<div id="content">

	<div id="content-left">
	<div class="cleaner_h10"></div>
	<div class="cleaner_h5"></div>
		<ul id="crumbs" style="width:640px;">
			<li><a href="#">Home &raquo;</a></li>
			<li>Headline News</li>
		</ul>
		
		<div class="cleaner_h10"></div>
		
		<div id="title-news">PRODUK TERBARU - WEB PENJUALAN SPARE PART </div>
		
		<?php
			$kueri = "SELECT * FROM tbl_produk a left join tbl_kategori b on a.id_kategori=b.id_kategori order by id_produk DESC LIMIT 3";
			$STH = $DBH->prepare($kueri);
			$STH->execute();
			 
			while($data = $STH->fetch())
			{
				?>
					<div id="news-list">
						<img src="produk/<?php echo $data['gambar']; ?>" />
						<h4>Kategori : <?php echo $data['kategori'].' | Harga : Rp. '.number_format($data['harga'],"2",",","."); ?></h4>
						<h1><?php echo $data['nama']; ?></h1>
						<?php echo $data['keterangan']; ?>
						<div class="cleaner_h5"></div>
							<div class="index-button"><a href="pesan.php?id=<?php echo $data['id_produk']; ?>">Harga : <?php echo number_format($data['harga'],"2",",","."); ?> | PESAN PAKET INI</a></div>
						<div class="cleaner_h5"></div>
					</div>
				<?php
			}
		?>
			
		
	<div class="cleaner_h10"></div>
	<div class="cleaner_h5"></div>
	</div><!--akhir content-left -->
	
	<div id="content-right">
	
	<?php include("include/kanan.php"); ?>
	
	</div><!--akhir content-right -->

<div class="cleaner_h0"></div>

</div><!--akhir content -->

<div class="cleaner_h10"><div id="space-white"><div id="inner-space-white-left"></div><div id="inner-space-white-right"></div></div></div>

<?php include("include/bottom.php"); ?>

<div class="cleaner_h20"></div>
<?php include("include/footer.php"); ?>
