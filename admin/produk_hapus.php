<?php include("../include/koneksi.php"); 

	$kueri = "delete from tbl_produk where id_produk='".$_GET['id']."'";
	$STH = $DBH->prepare($kueri);
	$STH->execute();
	echo '<meta http-equiv="refresh" content="0;url=produk.php">';
?>
