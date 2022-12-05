<?php require_once 'inc/header.php';

//eğer giriş varsa direkt siteye yönlendirsin.
if($_SESSION['login'] == sha1(md5(IP().$bcode))){
    go(site);
}

?>

		<div class="wrapper bg-dark-white">

			<?php require_once 'inc/menu.php' ?>

			<?php require_once 'inc/mobilemenu.php' ?>

			<div class="heading-banner-area overlay-bg">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="heading-banner">
								<div class="heading-banner-title">
									<h2>Registration</h2>
								</div>
								<div class="breadcumbs pb-15">
									<ul>
										<li><a href="index.html">Home</a></li>
										<li>Registration</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- HEADING-BANNER END -->
			<!-- SHOPPING-CART-AREA START -->
			<div class="login-area  pt-80 pb-80">
				<div class="container">
						
						<div class="row">
							<div class="col-lg-6">
							 	<form action="#" method="POST" onsubmit="return false;" id="bayigirisform">
									<div class="customer-login text-left">
										<h4 class="title-1 title-border text-uppercase mb-30">Bayi Girisi</h4>
										<input type="text" placeholder="Bayi Email ya da Bayi Kodu" name="bayi_mail">
										<input type="password" placeholder="Şifre" name="bayi_sifre">
										<p><a href="#" class="text-gray">Şifremi Unuttum</a></p>
										<button type="submit" onclick="loginbutton();" id="loginbuton" class="button-one submit-button mt-15">Giriş</button>
									</div>		
								</form>				
							</div>

							
							<div class="col-lg-6">
								<form action="#" method="POST" onsubmit="return false;" id="bayikayitform">
									<div class="customer-login text-left">

										<h4 class="title-1 title-border text-uppercase mb-30">Bayi Kayıt</h4>
										<input type="text" placeholder="Bayi Adı" name="bayi_adi">
										<input type="text" placeholder="Bayi Email" name="bayi_mail">
										<input type="password" placeholder="Şifre" name="bayi_sifre">
										<input type="password" placeholder="Şifre Tekrarı" name="bayi_sifret">
										<input type="text" placeholder="Telefon Numarası" name="bayi_telefon">
										<input type="text" placeholder="Vergi No" name="bayi_vergino">
										<input type="text" placeholder="Vergi Adres" name="bayi_vergiadresi">

										<button type="submit" id="registerbuton" onclick="registerbutton();" class="button-one submit-button mt-15">Kayıt</button>
									</div>	
								</form>					
							</div>
							
						</div>
					
				</div>
			</div>

			<?php require_once 'inc/footer.php' ?>