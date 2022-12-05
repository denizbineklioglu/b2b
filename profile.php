<?php require_once 'inc/header.php';

if($_SESSION['login'] != sha1(md5(IP().$bcode))){
    go(site);
}

?>	
		<div class="wrapper bg-dark-white">

			<?php require_once 'inc/menu.php'; ?>
			<?php require_once 'inc/mobilemenu.php'  ?>
			<div class="heading-banner-area overlay-bg">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="heading-banner">
								<div class="heading-banner-title">
									<h2>Bayi Profil</h2>
								</div>
								<div class="breadcumbs pb-15">
									<ul>
										<li><a href="#">Anasayfa</a></li>
										<li>Bayi Profil</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="product-area pt-80 pb-80 product-style-2">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 order-2 order-lg-1">

							<aside class="widget widget-categories  mb-30">
								<div class="widget-title">
									<h4>Menü</h4>
								</div>
								<div id="cat-treeview"  class="widget-info product-cat boxscrol2">
									<ul>
										<li><a href="<?php echo site."/profile.php?process=profile"; ?>"><span>Profil Bilgileri</span></a></li>
                                        <li><a href="<?php echo site."/profile.php?process=order"; ?>"><span>Siparişlerim</span></a></li>
                                        <li><a href="<?php echo site."/profile.php?process=address"; ?>"><span>Adreslerim</span></a></li>
                                        <li><a href="<?php echo site."/profile.php?process=havale"; ?>"><span>Havale Bildirimlerim</span></a></li>																		
										<li><a href="<?php echo site."/cart.php"; ?>"><span>Sepetim</span></a></li>
                                        <li><a href="<?php echo site."/logout.php"; ?>"><span>Çıkış Yap</span></a></li>

									</ul>
								</div>
							</aside>
						</div>
						<div class="col-lg-9 order-1 order-lg-2">
							<?php 
                            
                                $process = get('process');
                                switch ($process) {
                                    case 'order':
                                        ?>
                                    <div class="shop-content mt-tab-30 mb-30 mb-lg-0">
                                        <div class="product-option mb-30 clearfix">
                                            <ul class="nav d-block shop-tab">
                                                <li>Siparişlerim</li>
                                            </ul>
                                        </div>										                                            
                                        <div class="login-area">
                                            <div class="container">
                                                <div class="row">
                                                </div>
                                            </div>
                                        </div>                                                                                              						
                                    </div>
                                        <?php
                                        break;
                                    case 'address':
                                        ?>
                                    <div class="shop-content mt-tab-30 mb-30 mb-lg-0">
                                        <div class="product-option mb-30 clearfix">
                                            <ul class="nav d-block shop-tab">
                                                <li>Adreslerim</li>
                                            </ul>
                                        </div>										                                            
                                        <div class="login-area">
                                            <div class="container">
                                                <div class="row">
                                                </div>
                                            </div>
                                        </div>                                                                                              						
                                    </div>
                                        <?php
                                        break;
                                    case 'havale' :
                                        ?>
                                        <div class="shop-content mt-tab-30 mb-30 mb-lg-0">
                                            <div class="product-option mb-30 clearfix">
                                                <ul class="nav d-block shop-tab">
                                                    <li>Havale Bildirimlerim</li>
                                                </ul>
                                            </div>										                                             
                                            <div class="login-area">
                                                <div class="container">
                                                    <div class="row">
                                                    </div>
                                                </div>
                                            </div>                                                                                              						
                                        </div>
                                            <?php
                                        break;    
                                    case 'profile':
                                        ?>
                                    <div class="shop-content mt-tab-30 mb-30 mb-lg-0">
                                        <div class="product-option mb-30 clearfix">
                                            <ul class="nav d-block shop-tab">
                                                <li>Profil Bilgileri</li>
                                            </ul>
                                        </div>						
                                            <div class="login-area">
                                                <div class="container">
                                                    <div class="row">
                                                        <form action="#" method="POST">
                                                            <div class="customer-login">
                                                            <input type="text" placeholder="Bayi Email ya da Bayi Kodu" name="bayi_mail">
                                                            <input type="password" placeholder="Şifre" name="bayi_sifre">
                                                            <button type="submit" class="button-one submit-button mt-15">PROFİLİMİ GÜNCELLE</button>
                                                            </div>	
                                                        </form>
                                                    </div>                                                      
                                                </div>
                                            </div>      
                                    </div>
                                        <?php
                                        break;
                                }   
                            
                            ?>
						</div>
					</div>
				</div>
			</div>
<?php require_once 'inc/footer.php'; ?>