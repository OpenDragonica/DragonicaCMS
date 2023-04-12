<?php
session_start();
@include('link_map.php');
if(empty($_SESSION['log_try'])){
$log_try=0;}
else {
$log_try=$_SESSION['log_try'];
}
++$log_try;
$_SESSION['log_try'] = $log_try;

if($log_try<6){

require_once("data/db.php");
require_once("data/function.php");


//$prevurl=$_POST["url"];
if(!empty($_SESSION['Ask_page'])){$url=$_SESSION['Ask_page'];}

if(!empty($_POST["box_log"])){
$box_url=$_POST["box_url"];
$box_log=$_POST["box_log"];
$url=strtok($box_url,'?');
}
//$url=strtok($prevurl,'?');
//$url=$ask_url;
if(empty($url)){$url=$lmoncompte;}
elseif(strcmp ($box_url, $register_page)==0){
    $url=$ldownload;
}

    $login = $_POST["login_username"];
    $mdp = $_POST["login_password"];
    $success = checkMember($login, $mdp);
if(empty($_SESSION['id'])){
    if ($success[0] == 1)
    {
      $_SESSION['id'] = $login;
      $key = bindMemberKey($login);
      $_SESSION['userkey'] = $key[0];
      $_SESSION['start'] = time();
      $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);//(Nombre de min*60sec)
      //$_SESSION['login_state']=100;
      header("location:$url");
      unset($_SESSION['log_try']);
      exit();
    }
    else{
        $_SESSION['login_state']=1;
        if(!empty($_POST["box_log"])){
            $_SESSION['Ask_page']=$box_url;
        }
        header("Location:$lconnexion");
        exit();
    }
}
else{
        $_SESSION['login_state']=2;
        header("Location:$url");
        exit();
    }
}
elseif($log_try>=6){
require_once("data/db.php");
require_once("data/function.php");
$prevurl=$_POST["url"];
$url=strtok($prevurl,'?');
if(empty($url)){$url=$lmoncompte;}

    $login = $_POST["login_username"];
    $mdp = $_POST["login_password"];
    sleep(30);
    unset($_SESSION['log_try']);
    $success = checkMember($login, $mdp);
if(empty($_SESSION['id'])){
    if ($success[0] == 0)
    {
    //print"<div id='wait'>Vous avez entré de mauvais Identifiants plus de 5 fois, Veuillez patienter 30secondes avant de ressayer<br/><a href='$url'><button>Retour<button></a></div>";
    //sleep(30);
    $_SESSION['login_state']=1;
    if(!empty($_POST["box_log"])){
            $_SESSION['Ask_page']=$box_url;
    }
    header("Location:$lconnexion");
    exit();
}
else {
    if ($success[0] == 1){
      $_SESSION['id'] = $login;
      $key = bindMemberKey($login);
      $_SESSION['userkey'] = $key[0];
      //$_SESSION['login_state']=100;
      header("location:$url");
      exit(); 
    }
}
}
else{
        $_SESSION['login_state']=2;
        header("Location:$url");
        exit();
    }
}
?>
