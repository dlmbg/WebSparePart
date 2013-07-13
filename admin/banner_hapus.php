<?php include("../include/koneksi.php"); 

	$kueri = "delete from tbl_banner where id_banner='".$_GET['id']."'";
	$STH = $DBH->prepare($kueri);
	$STH->execute();
	echo '<meta http-equiv="refresh" content="0;url=banner.php">';
?>
