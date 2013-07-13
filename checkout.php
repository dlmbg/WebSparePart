<?php 
session_start();
include("include/koneksi.php"); 
if(empty($_SESSION['logged_in']))
{
	echo '<meta http-equiv="refresh" content="0;url=login.php">';
}
else
{
	if(count($_SESSION['item_pesan'])>0)
	{
		$arr = "";
		foreach($_SESSION['item_pesan'] as $key => $value) 
		{
			if($arr=="")
			{
				$arr .= $value;
			}
			else
			{
				$arr .= ",".$value;
			}
		}

		$kueri = "insert into tbl_pemesanan (id_member,tgl_pesan) values('".$_SESSION['id_member']."','".gmdate("d/M/Y H:i:s",time()+3600*7)."')";
		$STH = $DBH->prepare($kueri);
		$STH->execute();

		$id_pemesanan = $DBH->lastInsertId();

		$q = "SELECT * FROM tbl_produk a left join tbl_kategori b on a.id_kategori=b.id_kategori where a.id_produk IN(".$arr.")";
		$get_produk = $DBH->prepare($q);
		$get_produk->execute();
		
		$total = "";
		while($data = $get_produk->fetch())
		{
			$kueri = "insert into tbl_pemesanan_detail (id_pemesanan,id_produk,jumlah) values('".$id_pemesanan."','".$data['id_produk']."','".$_SESSION['count_pesan'][$data['id_produk']]."')";
			$STH = $DBH->prepare($kueri);
			$STH->execute();
		}
		unset($_SESSION['item_pesan']);
		unset($_SESSION['count_pesan']);
		echo '<meta http-equiv="refresh" content="0;url=history.php">';
	}
	else
	{
		echo "Tidak ada pesanan";
	}
}
?>
