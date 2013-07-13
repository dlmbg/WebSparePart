<?php include("../include/koneksi.php"); 

	$kueri = "delete from tbl_kategori where id_kategori='".$_GET['id']."'";
	$STH = $DBH->prepare($kueri);
	$STH->execute();
	echo '<meta http-equiv="refresh" content="0;url=kategori.php">';
?>
