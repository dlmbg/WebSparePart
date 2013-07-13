<div id="slider">
<div id="top-content">
<div id="featured" > 
	<ul class="ui-tabs-nav"> 
		<?php
			$kueri = "SELECT * FROM tbl_banner LIMIT 4";
			$STH = $DBH->prepare($kueri);
			$STH->execute();
			 
			while($data = $STH->fetch())
			{
				?>
					<li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-<?php echo $data['id_banner']; ?>"><a href="#fragment-<?php echo $data['id_banner']; ?>"><img src="banner/<?php echo $data['gambar']; ?>" width="110" height="50" alt="" /><span>
					<?php echo $data['judul']; ?>
					</span></a></li> 
				<?php
			}
		?>
	</ul> 
		<?php
			$kueri = "SELECT * FROM tbl_banner LIMIT 4";
			$STH = $DBH->prepare($kueri);
			$STH->execute();
			 
			while($data_g = $STH->fetch())
			{
				?>
					<a href="">
					<div id="fragment-<?php echo $data_g['id_banner']; ?>" class="ui-tabs-panel"> 
					<img src="banner/<?php echo $data_g['gambar']; ?>" alt="" width="650" height="250" /> 
					 <div class="info" > 
						<h2><?php echo $data_g['judul']; ?></h2> 
						<p><?php echo $data_g['keterangan']; ?></p> 
					 </div> 
			    </div>
				</a>
				<?php
			}
		?>
		</div> 
	</div>
</div><!--akhir slider -->