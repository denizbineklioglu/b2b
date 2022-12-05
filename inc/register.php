<?php 
require_once '../system/function.php';

//eğer giriş varsa direkt siteye yönlendirsin.
if(@$_SESSION['login'] == @sha1(md5(IP().$bcode))){
    go(site);
}

if($_POST){

    $bayi_adi   = post('bayi_adi');
    $bayi_mail  = post('bayi_mail');
    $bayi_sifre = post('bayi_sifre');
    $bayi_sifret = post('bayi_sifret');
    $bayi_telefon = post('bayi_telefon');
    $bayi_vergino = post('bayi_vergino');
    $bayi_vergiadresi = post('bayi_vergiadresi');
    $bcode = uniqid();
    $crypto = sha1(md5($bayi_sifre));

    if(!$bayi_adi || !$bayi_mail || !$bayi_sifre || !$bayi_sifret || !$bayi_telefon
    || !$bayi_vergino || !$bayi_vergiadresi  ){
        echo 'empty';
    }else{
        if(!filter_var($bayi_mail,FILTER_VALIDATE_EMAIL)){
            echo 'format';
        }else{
            if($bayi_sifre !=  $bayi_sifret){
                echo 'match';
            }else{
                $already = $db->prepare("SELECT bayi_mail FROM bayiler WHERE bayi_mail =:b");
                $already->execute([':b' => $bayi_mail]);
            }
            if($already->rowCount()){
                echo 'already';
            }else{
                $result = $db->prepare("INSERT INTO bayiler SET 
                        bayi_kodu =:bcode,
                        bayi_adi  =:bayi_adi,
                        bayi_mail =:bayi_mail,
                        bayi_sifre =:bayi_sifre,
                        bayi_telefon =:bayi_telefon,
                        bayi_vergino =:bayi_vergino,
                        bayi_vergidairesi =:bayi_vergidairesi"
                        );
                $result->execute([
                    ':bcode' => $bcode,
                    ':bayi_adi' => $bayi_adi,
                    ':bayi_mail' => $bayi_mail,
                    ':bayi_sifre' => $crypto,
                    ':bayi_telefon' => $bayi_telefon,
                    ':bayi_vergino' => $bayi_vergino,
                    ':bayi_vergidairesi' => $bayi_vergiadresi
                ]);
                
                if($result->rowCount()){
                    echo 'ok';    
                }else{
                    echo 'error';
                }
            }

        }
    }
}
?>