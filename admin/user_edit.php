<?php include("include/header.php"); ?>
<?php include("include/menu_admin.php"); ?>


<div class="cleaner_h10"><div id="space-white"><div id="inner-space-white-left"></div><div id="inner-space-white-right"></div></div></div>

<div id="content">

	<div id="content-admin">
	<div class="cleaner_h10"></div>
	<div class="cleaner_h5"></div>
		<ul id="crumbs" style="width:99%;">
			<li><a href="#">Home &raquo;</a></li>
			<li>Username</li>
		</ul>
		
		
		<div class="cleaner_h20"></div>
		<?php
			$kueri = "SELECT * from tbl_user where id_user='".$_GET['id']."'";
			$STH = $DBH->prepare($kueri);
			$STH->execute();
			
			$data = $STH->fetch();
		?>
		<form method="post" action="user_post.php">
		<table cellpadding="3" border="0" style="border-collapse:collapse; width:98%;">
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><input type="text" name="username" value="<?php echo $data['username']; ?>"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
		</tr>
		<tr>
			<td colspan="3"><input type="submit"></td>
			<input type="hidden" name="jenis" value="edit">
			<input type="hidden" name="id" value="<?php echo $data['id_user']; ?>">
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
