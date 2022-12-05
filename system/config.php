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


?>