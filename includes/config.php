<?php
session_name("SID");
// session_set_cookie_params(time()+3600*24*7,"/combinePlatform/");
session_start();
// session_destroy();
// $_SESSION['lang'] = 'EN';
if (isset($_POST['language'])){
    $_SESSION['lang'] = $_POST['language'];
 }
 if (isset($_SESSION['lang'])) {
    if($_SESSION['lang'] == 'EN'){
      include_once("includes/textes.php");
    }else {
      include_once("includes/text_fr.php");
    }
 }else {
  $_SESSION['lang'] = 'EN';
  include_once("includes/textes.php");
 }
///////////////////////////
//CONNEXION BDD
///////////////////////////
$hostBD = "localhost";
$usernameBD = "root";
$passwordBD = "";
$databaseBD = "lte_fronthaul";
///////////////////////////
$niveau_super_admin=10;

///////////////////////////
if(preg_match("#index.php#i",$_SERVER["PHP_SELF"])&&isset($_SESSION['id'])){header("Location: accueil.php");exit;}
else if(!preg_match("#index.php#i",$_SERVER["PHP_SELF"])&&!isset($_SESSION['id'])){header("Location: index.php");exit;}