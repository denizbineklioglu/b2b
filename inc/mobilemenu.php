<div class="mobile-menu-area">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 d-block d-md-none">
				<div class="mobile-menu">
					<nav id="dropdown">								
						<ul>
							<li><a href="<?php echo site; ?>">ANASAYFA</a></li>
							<li><a href="<?php echo site; ?>">ÜRÜNLER</a></li>
							<!-- Giriş Yapıldı mı Yapılmadı mı? -->
							<?php if(@isset($_SESSION['login'])){  ?>
								<li><a href="<?php echo site; ?>/profile.php?process=profile">HESABIM</a></li>
								<li><a onclick="return confirm('Onaylıyor musunuz?');" href="<?php echo site; ?>/logout.php">ÇIKIŞ YAP</a></li>								
							<?php }else{ ?>
								<li><a href="<?php echo site; ?>/login.php">GİRİS YAP</a></li>
								<li><a href="<?php echo site; ?>/login.php">KAYIT OL</a></li>								
							<?php } ?>	
							<li><a href="<?php echo site; ?>/contact.php">BİZE ULASIN</a></li>							
						</ul>					
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>