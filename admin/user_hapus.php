<?php include("../include/koneksi.php"); 

	$kueri = "delete from tbl_user where id_user='".$_GET['id']."'";
	$STH = $DBH->prepare($kueri);
	$STH->execute();
	echo '<meta http-equiv="refresh" content="0;url=user.php">';
?>
