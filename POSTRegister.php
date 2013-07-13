<?php
include("include/koneksi.php");
header("content-type: application/json");

$kueri = "insert into tbl_member(username,password,nama,jk,tgl_lahir,email,alamat,telepon)
values ('".$_GET['str_username']."',
	'".md5($_GET['str_password'])."',
	'".$_GET['str_nama']."',
	'".$_GET['str_jk']."',
	'".$_GET['str_tgl_lahir']."',
	'".$_GET['str_email']."',
	'".$_GET['str_alamat']."',
	'".$_GET['str_telepon']."'
	)";
$STH = $DBH->prepare($kueri);
$STH->execute();

$arr['status'] = "Data berhasil dikirim.";
$arr['result'] = "Sukses";
echo json_encode($arr); 
?>