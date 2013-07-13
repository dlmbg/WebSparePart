<?php include("../include/koneksi.php"); 

$jenis = $_POST['jenis'];
if($jenis=="tambah")
{
	$kueri = "insert into tbl_kategori(kategori)
	values ('".$_POST['kategori']."')";
	$STH = $DBH->prepare($kueri);
	$STH->execute();
}
else if($jenis=="edit")
{
	$kueri = "update tbl_kategori set kategori='".$_POST['kategori']."' where id_kategori='".$_POST['id']."'";
	$STH = $DBH->prepare($kueri);
	$STH->execute();
}
	echo '<meta http-equiv="refresh" content="0;url=kategori.php">';
?>
