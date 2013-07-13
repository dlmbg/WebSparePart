<script type="text/javascript">window.print();</script>
<?php include("../include/koneksi.php"); ?>

		<table cellpadding="5" border="1" style="border-collapse:collapse; width:95%;">
		
		<?php
			$kueri = "SELECT a.id_member, c.nama, a.stts, a.id_pemesanan, a.tgl_pesan, b.tgl_bayar, b.jumlah_bayar, (select count(id_pemesanan_detail) from tbl_pemesanan_detail where id_pemesanan=a.id_pemesanan) as jum, (select sum(jumlah) from tbl_pemesanan_detail where id_pemesanan=a.id_pemesanan) as jum_total FROM `tbl_pembayaran` b left join tbl_pemesanan a on b.id_pemesanan=a.id_pemesanan left join tbl_member c on a.id_member=c.id_member";
			$STH = $DBH->prepare($kueri);
			$STH->execute();
			
			$total = "";
			while($data = $STH->fetch())
			{
				?>	<tr>
						<td>Kode Pemesanan</td>
						<td>Pemesan</td>
						<td>Tanggal Pesanan</td>
						<td>Tanggal Bayar</td>
						<td>Jumlah Item</td>
						<td>Jumlah barang</td>
						<td>Status</td>
						<td>Bayar</td>
					</tr>
					<tr>
						<td><?php echo $data['id_pemesanan']; ?></td>
						<td><?php echo $data['nama']; ?></td>
						<td><?php echo $data['tgl_pesan']; ?></td>
						<td><?php echo $data['tgl_bayar']; ?></td>
						<td><?php echo $data['jum']; ?> item</td>
						<td><?php echo $data['jum_total']; ?> barang</td>
						<td><?php echo $data['stts']; ?></td>
						<td><?php echo number_format($data['jumlah_bayar'],2,',','.'); ?></td>
					</tr>
					<tr>
						<td colspan="8">
				<?php
				$kueri2 = "SELECT * FROM tbl_pemesanan_detail x left join (select a.nama, a.id_produk, b.kategori, a.keterangan, a.harga from tbl_produk a left join tbl_kategori b on a.id_kategori=b.id_kategori) y on x.id_produk=y.id_produk where x.id_pemesanan='".$data['id_pemesanan']."'";
				$STH2 = $DBH->prepare($kueri2);
				$STH2->execute();
				
				$total = "";
				while($data = $STH2->fetch())
				{
					?>
						<div id="news-list" style="width:98%;">
							<h5>Kategori : <?php echo $data['kategori'].' | Harga : Rp. '.number_format($data['harga'],"2",",","."); ?></h5>
							<h3><?php echo $data['nama']; ?></h3>
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
				echo "<br><br><br></td></tr>";
			}
		?>
		</table>
