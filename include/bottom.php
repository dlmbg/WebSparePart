<div id="content-bottom">
	<div id="inner-content-bottom">
		<div id="sub-inner-content-bottom">
			<div id="title-content-bottom">PRODUK ACAK</div>
				<?php
					$kueri = "SELECT * FROM tbl_produk order by RAND() LIMIT 5";
					$STH = $DBH->prepare($kueri);
					$STH->execute();
					 
					while($data = $STH->fetch())
					{
						echo '<span><a href="kategori.php?id='.$data['id_produk'].'">'.$data['nama'].'</a></span>';
					}
				?>
		</div>
		
		<div id="sub-inner-content-bottom">
			<div id="title-content-bottom">KATEGORI PRODUK</div>
				<?php
					$kueri = "SELECT * FROM tbl_kategori";
					$STH = $DBH->prepare($kueri);
					$STH->execute();
					 
					while($data = $STH->fetch())
					{
						echo '<span><a href="kategori.php?id='.$data['id_kategori'].'">'.$data['kategori'].'</a></span>';
					}
				?>
		</div>
		
		<div class="cleaner_h0"></div>
	</div><!--akhir inner-content-bottom -->
</div><!--akhir content-bottom -->