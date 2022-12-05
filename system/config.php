<?php

session_start();
ob_start('compress');
date_default_timezone_set('Europe/Istanbul');

try{
    $db = new PDO("mysql:host=localhost;dbname=b2b_youtube;charset=utf8;","root","");
    $db->query("SET CHARACTER SET utf8");
    $db->query("SET NAMES utf8");
}catch(PDOException $e){
    print_r($e-> getMessage());
    die();
}

$query =  $db->prepare("SELECT * FROM ayarlar LIMIT :lim");
$query->bindValue(':lim',(int) 1 ,PDO::PARAM_INT);
$query->execute();
if($query->rowCount()){
    $row    = $query->fetch(PDO::FETCH_OBJ);
    $site   = $row->site_url;
    
    define('site',$site);
    define('baslik',$row->site_baslik);
}

##giriş kontrolleri 
if(isset($_SESSION['login'])){
    $loginControl = $db->prepare("SELECT * FROM bayiler WHERE id=:id AND 
                bayi_kodu =:bk");
$loginControl->execute([':id' => $_SESSION['id'],':bk' => $_SESSION['code']]);
if($loginControl->rowCount()){

    $par = $loginControl->fetch(PDO::FETCH_OBJ);

    if($par->bayi_durum == 1){
        $bid = $par->id;
        $bcode = $par->bayi_kodu;
        $bmail = $par->bayi_mail;    
        $badi  = $par->bayi_adi;
        $bgift = $par->bayi_indirim;
        $btelefon = $par->bayi_telefon;
        $bfax = $par->bayi_fax;
        $bvno = $par->bayi_vergino;
        $bvd  = $par->bayi_vergidairesi; 
        $bweb = $par->bayi_websitesi;
        $bstatus = $par->bayi_durum;
    }else{
        @session_destroy();
    }
}else{
    @session_destroy();
}
}


?>