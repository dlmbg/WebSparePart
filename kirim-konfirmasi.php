<?php
include("include/koneksi.php");

$kueri = "insert into tbl_pembayaran(id_pemesanan, tgl_bayar, jumlah_bayar)
values('".$_POST['id_pemesanan']."','".$_POST['tgl_bayar']."','".$_POST['jumlah_bayar']."')";
$STH = $DBH->prepare($kueri);
$STH->execute();

?>
<script type="text/javascript">window.location="konfirmasi.php";</script>