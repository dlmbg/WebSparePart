<?php
include("include/koneksi.php");
header("content-type: application/json");

$kueri = "insert into tbl_contact(nama,email,pesan)
values ('".$_GET['str_nama']."',
	'".$_GET['str_email']."',
	'".$_GET['str_pesan']."'
	)";
$STH = $DBH->prepare($kueri);
$STH->execute();

$arr['status'] = "Data berhasil dikirim.";
$arr['result'] = "Sukses";
echo json_encode($arr); 
?>