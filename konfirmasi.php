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
			<li>Konfirmasi Pembayaran</li>
		</ul>
		
		<div class="cleaner_h10"></div>
		
		<div id="title-news">KONFIRMASI PEMBAYARAN </div>
		<div class="cleaner_h10"></div>
		<table cellpadding="5" border="1" style="border-collapse:collapse; width:95%;">
		<tr>
			<td>Kode Pemesanan</td>
			<td>Tanggal Pesanan</td>
			<td>Tanggal Bayar</td>
			<td>Jumlah Item</td>
			<td>Jumlah barang</td>
			<td>Status</td>
			<td>Bayar</td>
			<td>Detail</td>
		</tr>
		<?php
			$kueri = "SELECT a.id_member, a.stts, a.id_pemesanan, a.tgl_pesan, b.tgl_bayar, b.jumlah_bayar, (select count(id_pemesanan_detail) from tbl_pemesanan_detail where id_pemesanan=a.id_pemesanan) as jum, (select sum(jumlah) from tbl_pemesanan_detail where id_pemesanan=a.id_pemesanan) as jum_total FROM `tbl_pembayaran` b left join tbl_pemesanan a on b.id_pemesanan=a.id_pemesanan where a.id_member='".$_SESSION['id_member']."'";
			$STH = $DBH->prepare($kueri);
			$STH->execute();
			
			$total = "";
			while($data = $STH->fetch())
			{
				?>
					<tr>
						<td><?php echo $data['id_pemesanan']; ?></td>
						<td><?php echo $data['tgl_pesan']; ?></td>
						<td><?php echo $data['tgl_bayar']; ?></td>
						<td><?php echo $data['jum']; ?> item</td>
						<td><?php echo $data['jum_total']; ?> barang</td>
						<td><?php echo $data['stts']; ?></td>
						<td><?php echo number_format($data['jumlah_bayar'],2,',','.'); ?></td>
						<td><div class="index-button"><a href="detail-history.php?id=<?php echo $data['id_pemesanan']; ?>">Detail</a></div></td>
						

					</tr>
				<?php
			}
		?>
		</table>
		
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