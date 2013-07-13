

<div class="cleaner_h10"></div>
	
	<div class="cleaner_h10"></div>
	<div class="cleaner_h5"></div>
			<?php
			if(!empty($_SESSION['logged_in']))
			{
		?>
		<div id="bg-sidebar">
		<div id="head-sidebar">MEMBER</div>
		<div id="content-sidebar">
			<div style="background-color:green; padding:5px; color:#fff;" id="wrong_password">Welcome <?php echo $_SESSION['username']; ?>....</div>
	<div class="cleaner_h5"></div>
		<ul>
			<li><a href="profil-member.php"><b>Lihat Profil</b></a></li>
			<li><a href="history.php"><b>Lihat History Pesanan</b></a></li>
			<li><a href="logout.php"><b>Log Out</b></a></li>
		</ul>
		</div>
		</div><!--akhir bg-sidebar -->
		<?php } ?>
	
	<div class="cleaner_h10"></div>
	<div class="cleaner_h5"></div>

		<div id="bg-sidebar">
		<div id="head-sidebar">KERANJANG PEMESANAN</div>
		<div id="content-sidebar">
		<ul>
			<li><?php 
			if(empty($_SESSION['item_pesan']))
			{
				echo "Pesanan masih kosong...";
			}
			else
			{
				echo "Terdapat <b>".count($_SESSION['item_pesan'])."</b> pesanan..";
			} 
			?></li>
			<li><a href="cart.php"><b>Lihat Pesanan</b></a></li>
			<li><a href="checkout.php"><b>Checkout Pesanan</b></a></li>
		</ul>
		</div>
		</div><!--akhir bg-sidebar -->
	
	
	<div class="cleaner_h10"></div>
	<div class="cleaner_h5"></div>