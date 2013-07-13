<?php include("../include/koneksi.php"); 

$jenis = $_POST['jenis'];
if($jenis=="tambah")
{
	$kueri = "insert into tbl_banner(judul,gambar,keterangan)
	values ('".$_POST['judul']."','".$_FILES['gambar']['name']."','".$_POST['keterangan']."')";
	$STH = $DBH->prepare($kueri);
	$STH->execute();
	$tmp_name = $_FILES["gambar"]["tmp_name"];
    $name = $_FILES["gambar"]["name"];
    move_uploaded_file($tmp_name, "../banner/".$name."");
}
else if($jenis=="edit")
{
	if($_FILES['gambar']['name']=="")
	{
		$kueri = "update tbl_banner set judul='".$_POST['judul']."', keterangan='".$_POST['keterangan']."' where id_banner='".$_POST['id']."'";
		$STH = $DBH->prepare($kueri);
		$STH->execute();
	}
	else
	{
		$kueri = "update tbl_banner set judul='".$_POST['judul']."', keterangan='".$_POST['keterangan']."', gambar = '".$_FILES['gambar']['name']."' where id_banner='".$_POST['id']."'";
		$STH = $DBH->prepare($kueri);
		$STH->execute();
		$tmp_name = $_FILES["gambar"]["tmp_name"];
	    $name = $_FILES["gambar"]["name"];
	    move_uploaded_file($tmp_name, "../banner/".$name."");
	}
}
    echo "asu";
	echo '<meta http-equiv="refresh" content="0;url=banner.php">';
?>
