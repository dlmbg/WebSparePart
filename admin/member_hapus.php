<?php include("../include/koneksi.php"); 

	$kueri = "delete from tbl_member where id_member='".$_GET['id']."'";
	$STH = $DBH->prepare($kueri);
	$STH->execute();
	echo '<meta http-equiv="refresh" content="0;url=member.php">';
?>
