<?php include("include/header.php"); ?>
<?php include("include/menu.php"); 
if(empty($_SESSION['logged_in']))
{
	echo '<meta http-equiv="refresh" content="0;url=login.php">';
}
?>



<div class="cleaner_h10"><div id="space-white"><div id="inner-space-white-left"></div><div id="inner-space-white-right"></div></div></div>


<?php include("include/slider.php"); ?>

<div class="cleaner_h10"><div id="space-white"><div id="inner-space-white-left"></div><div id="inner-space-white-right"></div></div></div>

<div id="content">

	<div id="content-left">
	<div class="cleaner_h10"></div>
	<div class="cleaner_h5"></div>
		<ul id="crumbs" style="width:640px;">
			<li><a href="#">Home &raquo;</a></li>
			<li>Detail History Pesanan</li>
		</ul>
		
		<div class="cleaner_h10"></div>
		
		<div id="title-news">DETAIL HISTORY PESANAN </div>
		<div class="cleaner_h10"></div>
		<?php
			$kueri = "SELECT * FROM tbl_pemesanan_detail x left join (select a.nama, a.id_produk, b.kategori, a.keterangan, a.harga from tbl_produk a left join tbl_kategori b on a.id_kategori=b.id_kategori) y on x.id_produk=y.id_produk where x.id_pemesanan='".$_GET['id']."'";
			$STH = $DBH->prepare($kueri);
			$STH->execute();
			
			$total = "";
			while($data = $STH->fetch())
			{
				?>
					<div id="news-list">
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
	
	<div id="content-right">
	
	<?php include("include/kanan.php"); ?>
	
	</div><!--akhir content-right -->

<div class="cleaner_h0"></div>

</div><!--akhir content -->

<div class="cleaner_h10"><div id="space-white"><div id="inner-space-white-left"></div><div id="inner-space-white-right"></div></div></div>

<?php include("include/bottom.php"); ?>

<div class="cleaner_h20"></div>

<div id="footer-menu">
	<div id="center-footer-menu">
	<a href="">Beranda</a> | Profil Instansi | Layanan Kami | Peluang Investasi | Mekanisme Perijinan | Indexs Berita | Galeri Foto | Download | Hubungi Kami
	</div>
</div><!--akhir footer-menu -->

<div id="footer">
	<div class="cleaner_h20"></div>
		Copyright © 2012 Riau Aktual. All Rights Reserved.
			<div class="cleaner_h0"></div>
				Mirah Hotel, Yos Sudarso Street 28. Banyuwangi, East Java, Indonesia. Tel.-62 333 420600. Fax.-62 333 414890
			<div class="cleaner_h0"></div>
		You come here with the IP Address 180.247.235.203
	<div class="cleaner_h20"></div>
</div><!--akhir footer -->

</body>
</html>
