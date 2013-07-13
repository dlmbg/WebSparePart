
<div id="footer-menu">
	<div id="center-footer-menu"></div>
</div><!--akhir footer-menu -->

<div id="footer">
	<div class="cleaner_h20"></div>
		<?php
			$kueri = "SELECT * from tbl_footer";
			$STH = $DBH->prepare($kueri);
			$STH->execute();
			
			$data = $STH->fetch();
			echo $data['keterangan'];
		?>
	<div class="cleaner_h20"></div>
</div><!--akhir footer -->

</body>
</html>