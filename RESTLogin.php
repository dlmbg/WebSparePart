<?php
session_start();
include("include/koneksi.php");
header("content-type: application/json");
$data['st'] = "ok";
$data['callback'] = $_GET['callback'];
$data['username'] = $_GET['username'];
$data['password'] = md5($_GET['password']);

$kueri = "SELECT * FROM tbl_member where username='".$data['username']."' and password='".$data['password']."'";
$STH = $DBH->prepare($kueri);
$STH->execute();
if($STH->rowCount()>0)
{
	$_SESSION['logged_in'] = "yes";
	echo ''.$data['callback'].'({"ST":"OK","NAMA":"'.$data['username'].'"})';
	$data = $STH->fetch();
		$_SESSION['username'] = $data['username'];
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['jk'] = $data['jk'];
		$_SESSION['id_member'] = $data['id_member'];
		$_SESSION['tgl_lahir'] = $data['tgl_lahir'];
		$_SESSION['email'] = $data['email'];
		$_SESSION['alamat'] = $data['alamat'];
}
else
{

	echo ''.$data['callback'].'({"ST":"-"})';
}
?>