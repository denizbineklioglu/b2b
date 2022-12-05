<?php
require_once '../system/function.php';

//eğer giriş varsa direkt siteye yönlendirsin.
if(@$_SESSION['login'] != @sha1(md5(IP().$bcode))){
    go(site);
}

if($_POST){

    $bayi_adi   = post('bayi_adi');
    $bayi_mail  = post('bayi_mail');
    $bayi_telefon = post('bayi_telefon');
    $bayi_fax = post('bayi_fax');
    $bayi_vergino = post('bayi_vergino');
    $bayi_vergidairesi = post('bayi_vergidairesi');
    $bayi_websitesi = post('bayi_websitesi');

    if(!$bayi_adi || !$bayi_mail || !$bayi_telefon
    || !$bayi_vergino || !$bayi_vergidairesi  ){
        echo 'empty';
    }else{
        if(!filter_var($bayi_mail,FILTER_VALIDATE_EMAIL)){
            echo 'format';
        }else{
            
            $already = $db->prepare("SELECT bayi_kodu,bayi_mail FROM bayiler WHERE bayi_mail =:b AND bayi_kodu !=:code");
            $already->execute([':b' => $bayi_mail, ':code' => $bcode]);
            
            if($already->rowCount()){
                echo 'already';
            }else{
                $result = $db->prepare("UPDATE bayiler SET 
                        bayi_adi  =:bayi_adi,
                        bayi_mail =:bayi_mail,
                        bayi_telefon =:bayi_telefon,
                        bayi_fax =:bayi_fax,
                        bayi_vergino =:bayi_vergino,
                        bayi_vergidairesi =:bayi_vergidairesi,
                        bayi_websitesi =:bayi_websitesi WHERE bayi_kodu =:kod AND id =:id"
                        );
                $result->execute([
                    ':bayi_adi'             => $bayi_adi,
                    ':bayi_mail'            => $bayi_mail,
                    ':bayi_telefon'         => $bayi_telefon,
                    ':bayi_fax'             => $bayi_fax,           
                    ':bayi_vergino'         => $bayi_vergino,
                    ':bayi_vergidairesi'    => $bayi_vergidairesi,
                    ':bayi_websitesi'       => $bayi_websitesi,
                    ':kod'                  => $bcode,
                    ':id'                   => $bid
                ]);
                
                if($result){
                    echo 'ok';    
                }else{
                    echo 'error';
                }
            }

        }
    }
}
?>