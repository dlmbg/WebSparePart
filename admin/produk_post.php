<?php include("../include/koneksi.php"); 

$jenis = $_POST['jenis'];
if($jenis=="tambah")
{
	$kueri = "insert into tbl_produk(id_kategori,nama,gambar,harga,keterangan)
	values ('".$_POST['id_kategori']."','".$_POST['nama']."','".$_FILES['gambar']['name']."','".$_POST['harga']."','".$_POST['keterangan']."')";
	$STH = $DBH->prepare($kueri);
	$STH->execute();
	$tmp_name = $_FILES["gambar"]["tmp_name"];
    $name = $_FILES["gambar"]["name"];
    move_uploaded_file($tmp_name, "../produk/".$name."");
}
else if($jenis=="edit")
{
	if($_FILES['gambar']['name']=="")
	{
		$kueri = "update tbl_produk set id_kategori='".$_POST['id_kategori']."', nama='".$_POST['nama']."', harga='".$_POST['harga']."', keterangan='".$_POST['keterangan']."' where id_produk='".$_POST['id']."'";
		$STH = $DBH->prepare($kueri);
		$STH->execute();
	}
	else
	{
		$kueri = "update tbl_produk set id_kategori='".$_POST['id_kategori']."', nama='".$_POST['nama']."', harga='".$_POST['harga']."', keterangan='".$_POST['keterangan']."', gambar = '".$_FILES['gambar']['name']."' where id_produk='".$_POST['id']."'";
		$STH = $DBH->prepare($kueri);
		$STH->execute();
		$tmp_name = $_FILES["gambar"]["tmp_name"];
	    $name = $_FILES["gambar"]["name"];
	    move_uploaded_file($tmp_name, "../produk/".$name."");
	}
}
	echo '<meta http-equiv="refresh" content="0;url=produk.php">';
?>
