<?php
session_start();
include("include/koneksi.php");
header("content-type: application/json");

if($_GET['str_password']=="")
{
	$kueri = "update tbl_member set username='".$_GET['str_username']."',
	nama='".$_GET['str_nama']."',
	jk='".$_GET['str_jk']."',
	tgl_lahir='".$_GET['str_tgl_lahir']."',
	email='".$_GET['str_email']."',
	alamat='".$_GET['str_alamat']."',
	telepon='".$_GET['str_telepon']."' where id_member='".$_SESSION['id_member']."'";
$STH = $DBH->prepare($kueri);
$STH->execute();
}
else
{
	$kueri = "update tbl_member set username='".$_GET['str_username']."',
	password='".md5($_GET['str_password'])."',
	nama='".$_GET['str_nama']."',
	jk='".$_GET['str_jk']."',
	tgl_lahir='".$_GET['str_tgl_lahir']."',
	email='".$_GET['str_email']."',
	alamat='".$_GET['str_alamat']."',
	telepon='".$_GET['str_telepon']."' where id_member='".$_SESSION['id_member']."'";
$STH = $DBH->prepare($kueri);
$STH->execute();
}

$arr['status'] = "Data berhasil dikirim.";
$arr['result'] = "Sukses";
echo json_encode($arr); 
?>