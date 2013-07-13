<?php include("include/header.php"); ?>
<?php include("include/menu.php"); ?>
<script type="text/javascript">
   $(document).ready(function() {

        $("#kirim").click( function(e){
            
            e.preventDefault();

            var nama         = $("#nama").val();
            var email         = $("#email").val();
            var pesan         	= $("#pesan").val();

            if(nama=="" || email=="" || pesan=="")
            {
	            $('#gagal').show();
            }
            else
            {
	            $('#loading_panel').show();
	            KirimData();
            }
            
        });
    

        function KirimData(){
            
            var nama         = $("#nama").val();
            var email         = $("#email").val();
            var pesan         	= $("#pesan").val();
            
            $.ajax({
                        type : 'GET',
                        url : 'POSTHubungi.php',
                        async: true,
                        data: {
                        	str_nama:nama,
                        	str_email:email,
                        	str_pesan:pesan
                        },
                        beforeSend: function(x) {
                            if(x || x.overrideMimeType) {
                                 x.overrideMimeType("application/j-son;charset=UTF-8");
                            }
                        },
                        dataType : 'json',
                        success : function(data){
                                var cek = data.result;
                                if(cek=='Sukses'){
	            					$('#gagal').hide();
                                    $('#loading_panel').hide();
                                    $('#frmreg').hide();
                                    $('#sukses').show();
                                }
                        },
                        error: function(jqXHR, exception) {
                            $('#loading_panel').hide();
                            $('#conn_failed').show();
                        }
                }); 
        }
    

}); 
</script>


<div class="cleaner_h10"><div id="space-white"><div id="inner-space-white-left"></div><div id="inner-space-white-right"></div></div></div>


<?php include("include/slider.php"); ?>

<div class="cleaner_h10"><div id="space-white"><div id="inner-space-white-left"></div><div id="inner-space-white-right"></div></div></div>

<div id="content">

	<div id="content-left">
	<div class="cleaner_h10"></div>
	<div class="cleaner_h5"></div>
		<ul id="crumbs" style="width:640px;">
			<li><a href="#">Home &raquo;</a></li>
			<li>Hubungi Kami</li>
		</ul>
		
		<div class="cleaner_h10"></div>
		
		<div id="title-news">Hubungi Kami</div>
		
			<div style="display:none; background-color:#000; padding:5px; color:#fff;" id="loading_panel"><img src="images/loading.gif" width="20" style="float:left; margin-right:10px;">Loading....
	<div class="cleaner_h0"></div></div>
			<div style="display:none; background-color:red; padding:5px; color:#fff;" id="gagal">Form belum lengkap....</div>
			<div style="display:none; background-color:red; padding:5px; color:#fff;" id="sukses">Data berhasil dikirim....</div>
	<div class="cleaner_h5"></div>
		<form id="frmreg">
			<table cellpadding="10">
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><input type="text" name="nama" id="nama" required></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><input type="text" name="email" id="email" required></td>
				</tr>
				<tr>
					<td>Pesan</td>
					<td>:</td>
					<td><textarea name="pesan" id="pesan"></textarea></td>
				</tr>
				<tr>
					<td colspan="3"><input type="submit" id="kirim"></td>
				</tr>
			</table>
		</form>	
		
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