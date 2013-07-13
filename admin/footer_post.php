<?php include("../include/koneksi.php"); 

	$kueri = "update tbl_footer set keterangan = '".$_POST['keterangan']."'";
	$STH = $DBH->prepare($kueri);
	$STH->execute();

	echo '<meta http-equiv="refresh" content="0;url=footer.php">';
?>
