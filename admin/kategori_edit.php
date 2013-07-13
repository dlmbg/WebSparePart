<?php include("include/header.php"); ?>
<?php include("include/menu_admin.php"); ?>


<div class="cleaner_h10"><div id="space-white"><div id="inner-space-white-left"></div><div id="inner-space-white-right"></div></div></div>

<div id="content">

	<div id="content-admin">
	<div class="cleaner_h10"></div>
	<div class="cleaner_h5"></div>
		<ul id="crumbs" style="width:99%;">
			<li><a href="#">Home &raquo;</a></li>
			<li>Kategori</li>
		</ul>
		
		
		<div class="cleaner_h20"></div>
		<?php
			$kueri = "SELECT * from tbl_kategori where id_kategori='".$_GET['id']."'";
			$STH = $DBH->prepare($kueri);
			$STH->execute();
			
			$data = $STH->fetch();
		?>
		<form method="post" action="kategori_post.php">
		<table cellpadding="3" border="0" style="border-collapse:collapse; width:98%;">
		<tr>
			<td>Kategori</td>
			<td>:</td>
			<td><input type="text" name="kategori" value="<?php echo $data['kategori']; ?>"></td>
		</tr>
		<tr>
			<td colspan="3"><input type="submit"></td>
			<input type="hidden" name="jenis" value="edit">
			<input type="hidden" name="id" value="<?php echo $data['id_kategori']; ?>">
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
