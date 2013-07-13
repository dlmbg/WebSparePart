<?php include("include/header.php"); ?>
<?php include("include/menu.php"); 
if(!empty($_SESSION['logged_in_admin']))
{
	echo '<meta http-equiv="refresh" content="0;url=dashboard.php">';
}
 ?>
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
						
					if(response.ST=="-")
					{
						$('#wrong_password').show();
					}
					else
					{
						window.location = "index.php";
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


<div class="cleaner_h10"><div id="space-white"><div id="inner-space-white-left"></div><div id="inner-space-white-right"></div></div></div>

<div id="content">

	<div id="content-admin">
	<div class="cleaner_h10"></div>
	<div class="cleaner_h5"></div>
		<ul id="crumbs" style="width:99%;">
			<li><a href="#">Home &raquo;</a></li>
			<li>Log In Admin</li>
		</ul>
		
		
		<div class="cleaner_h20"></div>
		
		<div id="bg-sidebar" style="margin:0px auto;">
		<div id="head-sidebar">LOGIN ADMIN</div>
		<div id="content-sidebar">
			<div style="display:none; background-color:#000; padding:5px; color:#fff;" id="infologin"><img src="images/loading.gif" width="20" style="float:left; margin-right:10px;">Loading....
	<div class="cleaner_h0"></div></div>
			<div style="display:none; background-color:red; padding:5px; color:#fff;" id="wrong_password">Username dan Password salah....</div>
	<div class="cleaner_h5"></div>
		<form>
			<input type="text" id="username" style="width:92%; padding:5px;" placeholder="Masukkan Username...">
			<input type="password" id="password" style="width:92%; padding:5px;" placeholder="Masukkan Password...">
			<input type="reset" value="RESET" class="index-button">
			<input type="submit" value="LOG IN" id="login" class="index-button">
			<div class="cleaner_h5"></div>
		</form>
		</div>
		</div><!--akhir bg-sidebar -->
			
		
	<div class="cleaner_h10"></div>
	<div class="cleaner_h5"></div>
	</div><!--akhir content-left -->

<div class="cleaner_h0"></div>

</div><!--akhir content -->

<div class="cleaner_h10"><div id="space-white"><div id="inner-space-white-left"></div><div id="inner-space-white-right"></div></div></div>

<?php include("../include/bottom.php"); ?>

<div class="cleaner_h20"></div>
<?php include("include/footer.php"); ?>
