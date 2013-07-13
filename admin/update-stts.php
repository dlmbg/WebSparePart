<?php include("../include/koneksi.php"); 

	$kueri = "update tbl_pemesanan set stts='".$_POST['stts']."' where id_pemesanan='".$_POST['id_pemesanan']."'";
	$STH = $DBH->prepare($kueri);
	$STH->execute();

	echo '<meta http-equiv="refresh" content="0;url=pesanan.php">';
?>
