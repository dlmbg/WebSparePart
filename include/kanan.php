<script type="text/javascript">
$(document).ready(function() {
	
	$("#login").click(function(e){
		
        e.preventDefault();
		var username	= document.getElementById('username').value
		var password	= document.getElementById('password').value
		var dataString	= 'username='+ username + '&password=' + password
		$('#wrong_password').hide();

		if(username=="" && password=="")
		{
			$('#wrong_password').show();
			return false;
		}

		$('#infologin').show();

		$.ajax({
			url:'RESTLogin.php',
			dataType:'jsonp',
			timeout: 15000,
			cache: false,
			data: dataString,
			success:function(response){
				$('#infologin').hide();
					var st			= response.ST;
					var nama			= response.NAMA;
						
					if(response.ST=="-")
					{
						$('#wrong_password').show();
					}
					else
					{
						$('#nama').text(nama);
						$('#frmlogin').hide();
						$('#after').show();
					} 
				
				
					
			},
			error: function (xhr, ajaxOptions, thrownError) {
				if(thrownError==="timeout") {
					$('#infologin').hide();
					$('#connection_failed').show();
				} else {
					$('#infologin').hide();
					$('#connection_failed').show();
				}
			}
		}); //Tutup Ajax
	
	
	}); //Tutup Button Click
	
}); //Tutup Document Ready

</script>

<div class="cleaner_h10"></div>
	<div class="cleaner_h5"></div>
		<?php
			if(empty($_SESSION['logged_in']))
			{
		?>
		<div id="bg-sidebar">
		<div id="head-sidebar">LOGIN MEMBER</div>
		<div id="content-sidebar">
			<div style="display:none; background-color:#000; padding:5px; color:#fff;" id="infologin"><img src="images/loading.gif" width="20" style="float:left; margin-right:10px;">Loading....
	<div class="cleaner_h0"></div></div>
			<div style="display:none; background-color:red; padding:5px; color:#fff;" id="wrong_password">Username dan Password salah....</div>
	<div class="cleaner_h5"></div>
		<form id="frmlogin">
			<input type="text" id="username" style="width:92%; padding:5px;" placeholder="Masukkan Username...">
			<input type="password" id="password" style="width:92%; padding:5px;" placeholder="Masukkan Password...">
			<input type="reset" value="RESET" class="index-button">
			<input type="submit" value="LOG IN" id="login" class="index-button">
			<div class="cleaner_h5"></div>
		</form>
		<div id="after" style="display:none;">
			<div style="background-color:green; padding:5px; color:#fff;" id="wrong_password">Welcome <span id="nama"></span>....</div>
	<div class="cleaner_h5"></div>
		<ul>
			<li><a href="profil-member.php"><b>Lihat Profil</b></a></li>
			<li><a href="history.php"><b>Lihat History Pesanan</b></a></li>
			<li><a href="konfirmasi.php"><b>Lihat Konfirmasi Pembayaran</b></a></li>
			<li><a href="logout.php"><b>Log Out</b></a></li>
		</ul>
		</div>
		</div>
		</div><!--akhir bg-sidebar -->
		<?php } else { ?>

		<div id="bg-sidebar">
		<div id="head-sidebar">MEMBER</div>
		<div id="content-sidebar">
			<div style="background-color:green; padding:5px; color:#fff;" id="wrong_password">Welcome <?php echo $_SESSION['username']; ?>....</div>
	<div class="cleaner_h5"></div>
		<ul>
			<li><a href="profil-member.php"><b>Lihat Profil</b></a></li>
			<li><a href="history.php"><b>Lihat History Pesanan</b></a></li>
			<li><a href="konfirmasi.php"><b>Lihat Konfirmasi Pembayaran</b></a></li>
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