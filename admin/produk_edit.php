<?php include("include/header.php"); ?>
<?php include("include/menu_admin.php"); ?>


<div class="cleaner_h10"><div id="space-white"><div id="inner-space-white-left"></div><div id="inner-space-white-right"></div></div></div>

<div id="content">

	<div id="content-admin">
	<div class="cleaner_h10"></div>
	<div class="cleaner_h5"></div>
		<ul id="crumbs" style="width:99%;">
			<li><a href="#">Home &raquo;</a></li>
			<li>Produk</li>
		</ul>
		
		
		<div class="cleaner_h20"></div>
		<?php
			$kueri = "SELECT * from tbl_produk where id_produk='".$_GET['id']."'";
			$STH = $DBH->prepare($kueri);
			$STH->execute();
			
			$data = $STH->fetch();
		?>
		<form method="post" action="produk_post.php" enctype="multipart/form-data">
		<table cellpadding="3" border="0" style="border-collapse:collapse; width:98%;">
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
		</tr>
		<tr>
			<td>Kategori</td>
			<td>:</td>
			<td>
				<select name="id_kategori">
					<?php
						$kueri = "SELECT * from tbl_kategori";
						$STH = $DBH->prepare($kueri);
						$STH->execute();
						
						$total = "";
						$no = 1;
						while($data_kat = $STH->fetch())
						{
							if($data['id_kategori']==$data['id_kategori'])
							{
							?>
								<option value="<?php echo $data_kat['id_kategori']; ?>" selected><?php echo $data_kat['kategori']; ?></option>
							<?php
							}
							else
							{
								?>
								<option value="<?php echo $data_kat['id_kategori']; ?>"><?php echo $data_kat['kategori']; ?></option>
								<?php
							}
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Harga</td>
			<td>:</td>
			<td><input type="text" name="harga" value="<?php echo $data['harga']; ?>"></td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td>:</td>
			<td><textarea name="keterangan" id="redactor_txt" class="redactor"><?php echo $data['keterangan']; ?></textarea></td>
		</tr>
		<tr>
			<td>Gambar</td>
			<td>:</td>
			<td><input type="file" name="gambar"></td>
		</tr>
		<tr>
			<td colspan="3"><input type="submit"></td>
			<input type="hidden" name="jenis" value="edit">
			<input type="hidden" name="id" value="<?php echo $data['id_produk']; ?>">
		</tr>
		</table>
		</form>
		
	<div class="cleaner_h10"></div>
	<div class="cleaner_h5"></div>
	</div><!--akhir content-left -->

<div class="cleaner_h0"></div>

</div><!--akhir content -->

<div class="cleaner_h10"><div id="space-white"><div id="inner-space-white-left"></div><div id="inner-space-white-right"></div></div></div>

<?php include("../include/bottom.php"); ?>

<div class="cleaner_h20"></div>
<?php include("include/footer.php"); ?>
