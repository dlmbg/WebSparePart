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
			<li>Headline News</li>
		</ul>
		
		<div class="cleaner_h10"></div>
		
		<div id="title-news">KERANJANG PESANAN </div>
		<div class="cleaner_h10"></div>
		Tanggal Pesan : <?php echo gmdate("d/M/Y H:i:s",time()+3600*7); ?>
		<div class="cleaner_h10"></div>
		<?php
		if(count($_SESSION['item_pesan'])>0)
		{
			$arr = "";
			foreach($_SESSION['item_pesan'] as $key => $value) 
			{
				if($arr=="")
				{
					$arr .= $value;
				}
				else
				{
					$arr .= ",".$value;
				}
			}
			$kueri = "SELECT * FROM tbl_produk a left join tbl_kategori b on a.id_kategori=b.id_kategori where a.id_produk IN(".$arr.")";
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
							<div class="index-button"><a href="pesan.php?id=<?php echo $data['id_produk']; ?>">TAMBAH JUMLAH</a></div>
							<div class="index-button"><a href="unset_pesan.php?id=<?php echo $data['id_produk']; ?>">HAPUS</a></div>
							<div class="index-button">Sub Total : <?php echo number_format($data['harga']*$_SESSION['count_pesan'][$data['id_produk']],"2",",","."); ?></div>
							<div class="index-button">Harga : <?php echo number_format($data['harga'],"2",",","."); ?></div>
							<div class="index-button">Jumlah Pesan : <?php echo $_SESSION['count_pesan'][$data['id_produk']]; ?></div>
						<div class="cleaner_h5"></div>
					</div>
				<?php
				$total += $data['harga']*$_SESSION['count_pesan'][$data['id_produk']];
			}
			echo '<div class="index-button">Total Harga : '.number_format($total,"2",",",".").'</div>';
			echo '<div class="index-button"><a href="checkout.php">CheckOut Pesanan</a></div>';
		}
		else
		{
			echo "Tidak ada pesanan";
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
