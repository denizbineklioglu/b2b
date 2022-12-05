<?php 

require_once '../system/function.php';

//eğer giriş varsa direkt siteye yönlendirsin.
if($_SESSION['login'] == sha1(md5(IP().$bcode))){
    go(site);
}


if($_POST){

    $bayi_mail  = post('bayi_mail');
    $bayi_sifre = post('bayi_sifre');
    $enSifre =  sha1(md5($bayi_sifre));

    if(!$bayi_mail || !$bayi_sifre){
        echo 'empty';
    }else{
        $none = $db->prepare("SELECT * FROM bayiler WHERE bayi_mail =:b OR bayi_kodu =:bk");
        $none->execute([':b' => $bayi_mail, ':bk' => $bayi_mail]);
        if(!$none->rowCount()){
            echo 'none';
        }else{
            $giris = $db->prepare("SELECT * FROM bayiler WHERE (bayi_kodu =:bk AND bayi_sifre =:bs) 
            OR  (bayi_mail =:bm AND bayi_sifre =:bss)");

            $giris->execute([
                ':bk'   => $bayi_mail,
                ':bs'   => $enSifre, 
                ':bm'   => $bayi_mail,
                ':bss'  => $enSifre
            ]);
            if($giris->rowCount()){
                 
                $par = $giris->fetch(PDO::FETCH_OBJ);
                if($par->bayi_durum == 1){

                    $encode                = sha1(md5(IP().$par->bayi_kodu));
                    $_SESSION['login']     = $encode;
                    $_SESSION['id']        = $par->id;
                    $_SESSION['code']      = $par->bayi_kodu;
                    echo 'ok';
                    
                }else{
                    echo 'passive';
                }
            }

        }
    }

}


?>