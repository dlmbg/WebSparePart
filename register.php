<?php include("include/header.php"); ?>
<?php include("include/menu.php"); ?>
<script type="text/javascript">
   $(document).ready(function() {

        $("#kirim").click( function(e){
            
            e.preventDefault();

            var username         = $("#username").val();
            var password         = $("#password").val();
            var nama         	= $("#nama").val();
            var jk        		= $("#jk").val();
            var tgl_lahir     	= $("#tgl_lahir").val();
            var email         	= $("#email").val();
            var alamat      	= $("#alamat").val();
            var telepon       	= $("#telepon").val();

            if(username=="" || password=="" || nama=="" || jk=="" || tgl_lahir=="" || email=="" || alamat=="" || telepon=="")
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
            
            var username         = $("#username").val();
            var password         = $("#password").val();
            var nama         	= $("#nama").val();
            var jk        		= $("#jk").val();
            var tgl_lahir     	= $("#tgl_lahir").val();
            var email         	= $("#email").val();
            var alamat      	= $("#alamat").val();
            var telepon       	= $("#telepon").val();
            
            $.ajax({
                        type : 'GET',
                        url : 'POSTRegister.php',
                        async: true,
                        data: {
                        	str_username:username,
                        	str_password:password,
                        	str_nama:nama,
                        	str_jk:jk,
                        	str_tgl_lahir:tgl_lahir,
                        	str_email:email,
                        	str_alamat:alamat,
                        	str_telepon:telepon,
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
			<li>Register</li>
		</ul>
		
		<div class="cleaner_h10"></div>
		
		<div id="title-news">REGISTER MEMBER</div>
		
			<div style="display:none; background-color:#000; padding:5px; color:#fff;" id="loading_panel"><img src="images/loading.gif" width="20" style="float:left; margin-right:10px;">Loading....
	<div class="cleaner_h0"></div></div>
			<div style="display:none; background-color:red; padding:5px; color:#fff;" id="gagal">Form belum lengkap....</div>
			<div style="display:none; background-color:red; padding:5px; color:#fff;" id="sukses">Registrasi berhasil....</div>
	<div class="cleaner_h5"></div>
		<form id="frmreg">
			<table cellpadding="10">
				<tr>
					<td>Username</td>
					<td>:</td>
					<td><input type="text" name="username" id="username" required></td>
				</tr>
				<tr>
					<td>Password</td>
					<td>:</td>
					<td><input type="password" name="password" id="password" required></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><input type="text" name="nama" id="nama" required></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td><select name="jk" id="jk" required><option value="Laki-Laki">Laki-Laki</option><option value="Perempuan">Perempuan</option></select></td>
				</tr>
				<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td><input type="date" name="tgl_lahir" id="tgl_lahir" required></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><input type="text" name="email" id="email" required></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><input type="text" name="alamat" id="alamat" required></td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>:</td>
					<td><input type="text" name="telepon" id="telepon" required></td>
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