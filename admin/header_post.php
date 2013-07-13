<?php include("../include/koneksi.php"); 

$jenis = $_POST['jenis'];
if($jenis=="tambah")
{
	$kueri = "insert into tbl_header(gambar) values ('".$_FILES['gambar']['name']."')";
	$STH = $DBH->prepare($kueri);
	$STH->execute();
	$tmp_name = $_FILES["gambar"]["tmp_name"];
    $name = $_FILES["gambar"]["name"];
    move_uploaded_file($tmp_name, "../header/".$name."");
}
else if($jenis=="edit")
{
	$kueri = "update tbl_header set gambar = '".$_FILES['gambar']['name']."' where id_header='".$_POST['id']."'";
	$STH = $DBH->prepare($kueri);
	$STH->execute();
	$tmp_name = $_FILES["gambar"]["tmp_name"];
    $name = $_FILES["gambar"]["name"];
    move_uploaded_file($tmp_name, "../header/".$name."");
}
	echo '<meta http-equiv="refresh" content="0;url=header.php">';
?>
