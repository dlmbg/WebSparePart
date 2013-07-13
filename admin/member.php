<?php include("include/header.php"); ?>
<?php include("include/menu_admin.php"); ?>


<div class="cleaner_h10"><div id="space-white"><div id="inner-space-white-left"></div><div id="inner-space-white-right"></div></div></div>

<div id="content">

	<div id="content-admin">
	<div class="cleaner_h10"></div>
	<div class="cleaner_h5"></div>
		<ul id="crumbs" style="width:99%;">
			<li><a href="#">Home &raquo;</a></li>
			<li>Member</li>
		</ul>
		
		
		<div class="cleaner_h20"></div>
		
		<table cellpadding="3" border="1" style="border-collapse:collapse; width:98%;">
		<tr>
			<td>No.</td>
			<td>Nama</td>
			<td>Username</td>
			<td>Jenis Kelamin</td>
			<td>TGL Lahir</td>
			<td>Email</td>
			<td>Alamat</td>
			<td>Telepon</td>
			<td width="60"></td>
		</tr>
		<?php
			$kueri = "SELECT * from tbl_member";
			$STH = $DBH->prepare($kueri);
			$STH->execute();
			
			$total = "";
			$no = 1;
			while($data = $STH->fetch())
			{
				?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data['nama']; ?></td>
						<td><?php echo $data['username']; ?></td>
						<td><?php echo $data['jk']; ?></td>
						<td><?php echo $data['tgl_lahir']; ?></td>
						<td><?php echo $data['email']; ?></td>
						<td><?php echo $data['alamat']; ?></td>
						<td><?php echo $data['telepon']; ?></td>
						<td>
							<div class="index-button"><a href="member_hapus.php?id=<?php echo $data['id_member']; ?>">Hapus</a></div>
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
