<?php include("include/header.php"); ?>
<?php include("include/menu_admin.php"); ?>


<div class="cleaner_h10"><div id="space-white"><div id="inner-space-white-left"></div><div id="inner-space-white-right"></div></div></div>

<div id="content">

	<div id="content-admin">
	<div class="cleaner_h10"></div>
	<div class="cleaner_h5"></div>
		<ul id="crumbs" style="width:99%;">
			<li><a href="#">Home &raquo;</a></li>
			<li>User</li>
		</ul>
		
		
		<div class="cleaner_h20"></div>
		
		<table cellpadding="3" border="1" style="border-collapse:collapse; width:98%;">
		<tr>
			<td>No.</td>
			<td>Username</td>
			<td>Nama</td>
			<td width="100"><div class="index-button"><a href="user_tambah.php">Tambah</a></div></td>
		</tr>
		<?php
			$kueri = "SELECT * from tbl_user";
			$STH = $DBH->prepare($kueri);
			$STH->execute();
			
			$total = "";
			$no = 1;
			while($data = $STH->fetch())
			{
				?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data['username']; ?></td>
						<td><?php echo $data['nama']; ?></td>
						<td>
							<div class="index-button"><a href="user_edit.php?id=<?php echo $data['id_user']; ?>">Edit</a></div>
							<div class="index-button"><a href="user_hapus.php?id=<?php echo $data['id_user']; ?>">Hapus</a></div>
						</td>
					</tr>
				<?php
				$no++;
			}
		?>
		</table>
			
		
	<div class="cleaner_h10"></div>
	<div class="cleaner_h5"></div>
	</div><!--akhir content-left -->

<div class="cleaner_h0"></div>

</div><!--akhir content -->

<div class="cleaner_h10"><div id="space-white"><div id="inner-space-white-left"></div><div id="inner-space-white-right"></div></div></div>

<?php include("../include/bottom.php"); ?>

<div class="cleaner_h20"></div>
<?php include("include/footer.php"); ?>
