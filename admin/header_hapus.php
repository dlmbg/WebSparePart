<?php include("../include/koneksi.php"); 

	$kueri = "delete from tbl_header where id_header='".$_GET['id']."'";
	$STH = $DBH->prepare($kueri);
	$STH->execute();
	echo '<meta http-equiv="refresh" content="0;url=header.php">';
?>
