<?php require_once 'inc/header.php';

if($_SESSION['login'] != sha1(md5(IP().$bcode))){
    go(site."/login.php");
}

?>	

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
<style>
    .pagination {
        background: transparent!important; 
        display: flex!important; 
        padding: 20px!important;
    }

</style>
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
                                <li><a href="<?php echo site."/profile.php?process=changepassword"; ?>"><span>Şifremi Degistir</span></a></li>
                                <li><a href="<?php echo site."/profile.php?process=logoduzenle"; ?>"><span>Logo Düzenle</span></a></li>
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

                                $orders = $db->prepare("SELECT * FROM siparisler
                                INNER JOIN durum_kodlari ON durum_kodlari.durum_kodu =
                                siparisler.siparis_durum
                                WHERE siparis_bayi =:b");
                                $orders->execute([':b' => $bcode]);   

                                ?>
                            <div class="shop-content mt-tab-30 mb-30 mb-lg-0">
                                <div class="product-option mb-30 clearfix">
                                    <ul class="nav d-block shop-tab">
                                        <li>Siparişlerim (<?php echo $orders->rowCount(); ?>)</li>
                                    </ul>
                                </div>										                                            
                                <div class="login-area">
                                    <div class="container">
                                        <div class="row">
                                            <div class="table">
                                                <?php                                                     
                                                    if($orders->rowCount()){                                                                            
                                                ?>
                                                    <table class="table table-hover" id="b2btable">
                                                        <thead>
                                                            <tr>
                                                            <th>KOD</th>
                                                            <th>DURUM</th>
                                                            <th>TUTAR</th>
                                                            <th>ÖDEME TÜRÜ</th>
                                                            <th>TARİH</th>
                                                            </tr>                                                            
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                                foreach ($orders as $order) { ?>
                                                                    <tr>
                                                                        <td><a href="" title="Sipariş Detayı"><?php echo $order['siparis_kod'] ?></a></td>
                                                                        <td><?php echo $order['durum_baslik'] ?></td>
                                                                        <td><?php echo $order['siparis_tutar']." TL"?></td>
                                                                        <td><?php echo $order['siparis_odeme'] == 1 ? 'Havale' : 'Kredi Kartı'; ?></td>
                                                                        <td><?php echo dt($order['siparis_tarih']). " | ".dt($order['siparis_saat'],true) ?></td>
                                                                    </tr>
                                                               <?php } ?>                                                            
                                                        </tbody>
                                                    </table>

                                                <?php }else{ alert('Siparişiniz Bulunmamaktadır.','danger'); } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                                                              						
                            </div>
                                <?php
                                break;
                                case 'address':

                                    $addresses = $db->prepare("SELECT * FROM bayi_adresler                                    
                                    WHERE adres_bayi =:b");
                                    $addresses->execute([':b' => $bcode]);   
    
                                    ?>
                                <div class="shop-content mt-tab-30 mb-30 mb-lg-0">
                                    <div class="product-option mb-30 clearfix">
                                        <ul class="nav d-block shop-tab">
                                            <li>Adreslerim (<?php echo $addresses->rowCount(); ?>) | </li>
                                            <li><a href="">[Yeni Adres Ekle]</a></li>
                                        </ul>
                                    </div>										                                            
                                    <div class="login-area">
                                        <div class="container">
                                            <div class="row">
                                                <div class="table">
                                                    <?php                                                     
                                                        if($addresses->rowCount()){                                                                            
                                                    ?>
                                                        <table class="table table-hover" id="b2btable">
                                                            <thead>
                                                                <tr>
                                                                <th>ID</th>
                                                                <th>BAŞLIK</th>
                                                                <th>AÇIK ADRES</th>
                                                                <th>DURUM</th>                                                                
                                                                <th>TARİH</th>
                                                                </tr>                                                            
                                                            </thead>
                                                            <tbody>
                                                                <?php 
                                                                    foreach ($addresses as $address) { ?>
                                                                        <tr>
                                                                            <td><a href="#" title="Adres Düzenle">#<?php echo $address['id'] ?></a></td>
                                                                            <td><?php echo $address['adres_baslik'] ?></td>
                                                                            <td><?php echo $address['adres_tarif'] ?></td>
                                                                            <td><?php echo $address['adres_durum'] == 1 ? 'Aktif' : 'Pasif'; ?></td>
                                                                            <td><?php echo dt($address['adres_tarih'])?></td>
                                                                        </tr>
                                                                   <?php } ?>                                                            
                                                            </tbody>
                                                        </table>
    
                                                    <?php }else{ alert('Adresiniz Bulunmamaktadır.','danger'); } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                                                                              						
                                </div>
                                    <?php
                                    break;
                                    case 'havale':

                                        $havaleler = $db->prepare("SELECT * FROM havale_bildirim   
                                        INNER JOIN bankalar ON bankalar.id = havale_bildirim.banka                                 
                                        WHERE bayi_kodu =:b");
                                        $havaleler->execute([':b' => $bcode]);   
        
                                        ?>
                                    <div class="shop-content mt-tab-30 mb-30 mb-lg-0">
                                        <div class="product-option mb-30 clearfix">
                                            <ul class="nav d-block shop-tab">
                                                <li>Havale Bildirimlerim (<?php echo $havaleler->rowCount(); ?>) | </li>
                                                <li><a href="">[Yeni Bildirim Ekle]</a></li>
                                            </ul>
                                        </div>										                                            
                                        <div class="login-area">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="table">
                                                        <?php                                                     
                                                            if($havaleler->rowCount()){                                                                            
                                                        ?>
                                                            <table class="table table-hover" id="b2btable">
                                                                <thead>
                                                                    <tr>
                                                                    <th>ID</th>
                                                                    <th>TARİH</th>
                                                                    <th>TUTAR</th>
                                                                    <th>BANKA</th>
                                                                    <th>NOT</th>                                                                                                                                                                                                        
                                                                    </tr>                                                            
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                                        foreach ($havaleler as $havale) { ?>
                                                                            <tr>
                                                                                <td><a href="#" title="Havale Düzenle">#<?php echo $havale['id'] ?></a></td>
                                                                                <td><?php echo dt($havale['havale_tarih']). " | ".dt($havale['havale_saat'],true)?></td>
                                                                                <td><?php echo $havale['havale_tutar']." TL" ?></td>
                                                                                <td><?php echo $havale['banka_adi'] ?></td>
                                                                                <td><?php echo $havale['havale_not'] ?></td>                                                                                
                                                                            </tr>
                                                                       <?php } ?>                                                            
                                                                </tbody>
                                                            </table>
        
                                                        <?php }else{ alert('Adresiniz Bulunmamaktadır.','danger'); } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                                                                              						
                                    </div>
                                        <?php
                                        break;
                            case 'changepassword' :
                            ?>
                            <div class="shop-content mt-tab-30 mb-30 mb-lg-0">
                                <div class="product-option mb-30 clearfix">
                                    <ul class="nav d-block shop-tab">
                                        <li>Şifre Değiştir</li>
                                    </ul>
                                </div>										                                             
                                <div class="login-area">
                                    <div class="container">
                                        <div class="row">
                                        <form action="#" method="POST" onsubmit="return false;" id="passwordform">
                                                <div class="customer-login">
                                                 <label>Yeni Şifre </label>   
                                                <input type="password" name="password" placeholder="Yeni sifre">

                                                <label>Yeni Şifre Tekrar </label>   
                                                <input type="password" name="password2" placeholder="Yeni sifre tekrar">

                                                <button type="submit" onclick="passwordupdate();" id="passwordbutton" class="button-one submit-button mt-15">SİFRE GÜNCELLE</button>
                                        </form>        
                                        </div>
                                    </div>
                                </div>                                                                                              						
                            </div>
                                <?php
                                    break;
                            case 'logoduzenle' :
                                ?>
                                <div class="shop-content mt-tab-30 mb-30 mb-lg-0">
                                    <div class="product-option mb-30 clearfix">
                                        <ul class="nav d-block shop-tab">
                                            <li>Logo Düzenle</li>
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
                                            <form action="#" method="POST" onsubmit="return false;" id="profileform">
                                                <div class="customer-login">
                                                 <label>Bayi Kodu: </label>   
                                                <input type="text" disabled value="<?php echo $bcode ?>" name="bayi_kodu">

                                                <label>Bayi Adı: </label>   
                                                <input type="text" value="<?php echo $badi ?>" name="bayi_adi" placeholder="Bayi Adı">

                                                <label>Bayi Mail: </label>   
                                                <input type="text" value="<?php echo $bmail ?>" name="bayi_mail" placeholder="Bayi Mail">

                                                <label>Bayi Telefon: </label>   
                                                <input type="text" value="<?php echo $btelefon ?>" name="bayi_telefon" placeholder="Bayi Telefon">
                                                
                                                <label>Bayi Fax: </label>   
                                                <input type="text" value="<?php echo $bfax ?>" name="bayi_fax" placeholder="Bayi Fax">

                                                <label>Bayi Vergi No: </label>   
                                                <input type="text" value="<?php echo $bvno ?>" name="bayi_vergino" placeholder="Bayi Vergi No">

                                                <label>Bayi Vergi Dairesi: </label>   
                                                <input type="text" value="<?php echo $bvd ?>" name="bayi_vergidairesi" placeholder="Bayi Vergi Dairesi">

                                                <label>Bayi Web Sitesi: </label>   
                                                <input type="text" value="<?php echo $bweb ?>" name="bayi_websitesi" placeholder="Bayi Web Sitesi">

                                                <button type="submit" onclick="profileupdate();" id="profilebutton"  class="button-one submit-button mt-15">PROFİLİMİ GÜNCELLE</button>
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
</div>
<?php require_once 'inc/footer.php'; ?>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
    $('#b2btable').DataTable();
});
</script>