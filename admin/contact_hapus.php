<?php include("../include/koneksi.php"); 

	$kueri = "delete from tbl_contact where id_contact='".$_GET['id']."'";
	$STH = $DBH->prepare($kueri);
	$STH->execute();
	echo '<meta http-equiv="refresh" content="0;url=contact.php">';
?>
