<?php 

require_once '../system/function.php';

if($_POST){

    $bayi_mail  = post('bayi_mail');
    $bayi_sifre = post('bayi_sifre');
    $enSifre =  sha1(md5($bayi_sifre));

    if(!$bayi_mail || !$bayi_sifre){
        echo 'empty';
    }else{
        $none = $db->prepare("SELECT * FROM bayiler WHERE bayi_mail =:b");
        $none->execute([':b' => $bayi_mail]);
        if(!$none->rowCount()){
            echo 'none';
        }else{
            $giris = $db->prepare("SELECT * FROM bayiler WHERE bayi_mail=:b AND 
            bayi_sifre =:c");
            $giris->execute([':b' => $bayi_mail ,':c' => $enSifre]);
            if($giris->rowCount()){
                echo 'ok';
            }else{
                echo 'false';
            }
        }
    }

}


?>