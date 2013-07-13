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
		
		<div id="title-news">HISTORY PESANAN </div>
		<div class="cleaner_h10"></div>
		<table cellpadding="5" border="1" style="border-collapse:collapse; width:95%;">
		<tr>
			<td>Kode Pemesanan</td>
			<td>Tanggal Pesanan</td>
			<td>Jumlah Item</td>
			<td>Jumlah barang</td>
			<td>Status</td>
			<td>Detail</td>
			<td>Konfirmasi</td>
		</tr>
		<?php
			$kueri = "SELECT id_member, stts, id_pemesanan, tgl_pesan, (select count(id_pemesanan_detail) from tbl_pemesanan_detail where id_pemesanan=a.id_pemesanan) as jum, (select sum(jumlah) from tbl_pemesanan_detail where id_pemesanan=a.id_pemesanan) as jum_total FROM `tbl_pemesanan` a where id_member='".$_SESSION['id_member']."'";
			$STH = $DBH->prepare($kueri);
			$STH->execute();
			
			$total = "";
			while($data = $STH->fetch())
			{
				?>
					<tr>
						<td><?php echo $data['id_pemesanan']; ?></td>
						<td><?php echo $data['tgl_pesan']; ?></td>
						<td><?php echo $data['jum']; ?> item</td>
						<td><?php echo $data['jum_total']; ?> barang</td>
						<td><?php echo $data['stts']; ?></td>
						<td><div class="index-button"><a href="detail-history.php?id=<?php echo $data['id_pemesanan']; ?>">Detail</a></div></td>
						<?php
							$kueri2 = "select count(*) from tbl_pembayaran where id_pemesanan='".$data['id_pemesanan']."'";
							//echo $kueri2;
							$STH2 = $DBH->prepare($kueri2);
							$STH2->execute();
							if($STH2->fetchColumn()>0)
							{
						?>
						<td>Confirmed</td>
						<?php } else { ?>
						<td><div class="index-button"><a href="set-konfirmasi.php?id=<?php echo $data['id_pemesanan']; ?>">Konfirmasi</a></div></td>
						<?php } ?>

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