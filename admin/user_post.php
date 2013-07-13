<?php include("../include/koneksi.php"); 

$jenis = $_POST['jenis'];
if($jenis=="tambah")
{
	$kueri = "insert into tbl_user(username,password,nama)
	values ('".$_POST['username']."','".md5($_POST['password'])."','".$_POST['nama']."')";
	$STH = $DBH->prepare($kueri);
	$STH->execute();
}
else if($jenis=="edit")
{
	if($_POST['password']=="")
	{
		$kueri = "update tbl_user set username='".$_POST['username']."', nama='".$_POST['nama']."' where id_user='".$_POST['id']."'";
		$STH = $DBH->prepare($kueri);
		$STH->execute();
	}
	else
	{
		$kueri = "update tbl_user set username='".$_POST['username']."', nama='".$_POST['nama']."', password='".md5($_POST['password'])."' where id_user='".$_POST['id']."'";
		$STH = $DBH->prepare($kueri);
		$STH->execute();
	}
}
	echo '<meta http-equiv="refresh" content="0;url=user.php">';
?>
