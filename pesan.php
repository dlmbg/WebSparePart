<?php 
session_start();
include("include/koneksi.php"); 
if(empty($_SESSION['logged_in']))
{
	echo '<meta http-equiv="refresh" content="0;url=login.php">';
}
else
{
	$id = $_GET['id'];
	$_SESSION['item_pesan'][$id] = $id;
	$_SESSION['count_pesan'][$id] += 1;
	echo '<meta http-equiv="refresh" content="0;url=cart.php">';
}
?>
