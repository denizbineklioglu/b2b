<?php 
require_once '../system/function.php';

//eğer giriş varsa direkt siteye yönlendirsin.
if(@$_SESSION['login'] != @sha1(md5(IP().$bcode))){
    go(site);
}

if($_POST){

    $sifre   = post('password');
    $sifre2  = post('password2');
    $crypto = sha1(md5($sifre));

    if(!$sifre || !$sifre2  ){
        echo 'empty';
    }else{
            if($sifre !=  $sifre2){
                echo 'match';
            }else{
                $result = $db->prepare("UPDATE bayiler SET 
                        bayi_sifre =:bsifre
                        WHERE bayi_kodu =:bk AND id =:id
                        "
                        );
                $result->execute([
                    ':bsifre' => $crypto,
                    ':bk' => $bcode,
                    ':id' => $bid
                ]);
                
                if($result){
                    echo 'ok';    
                }else{
                    echo 'error';
                }
            }

    }
}

?>