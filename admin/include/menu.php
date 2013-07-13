<div id="line-menu-white">
	<div id="line-menu">
		<div id="MainMenu"><div id="Menu">
		  <div class="suckertreemenu">
			<ul id="treemenu1">
				<li><a href="../index.php">Beranda &raquo;</a></li>
				<li><a href="../profil.php">Profil Perusahaan &raquo;</a></li>
				<li><a href="#">Kategori Produk &raquo;</a>
					<ul>
						<?php
							$kueri = "SELECT * FROM tbl_kategori";
							$STH = $DBH->prepare($kueri);
							$STH->execute();
							 
							while($data = $STH->fetch())
							{
								echo '<li><a href="../kategori.php?id='.$data['id_kategori'].'">'.$data['kategori'].'</a></li>';
							}
						?>
					 </ul></li>
				<?php
					if(empty($_SESSION['logged_in']))
					{
						echo '<li><a href="../register.php">Register Member &raquo;</a></li>
						<li><a href="../login.php">Login Member &raquo;</a></li>';
					}
					else
					{
						echo '<li><a href="../profil-member.php">Profil Member &raquo;</a></li>';
						echo '<li><a href="../history.php">History Pesanan &raquo;</a></li>';
						echo '<li><a href="../logout.php">Log Out &raquo;</a></li>';
					}
				?>
				<li><a href="../hubungi.php">Hubungi Kami &raquo;</a></li>
			</ul>
			</div>
		</div>
		</div>
	</div>
</div><!--akhir line-menu-white -->