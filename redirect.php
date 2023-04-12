<?php
session_start();
@include('config.php');
@include('link_map.php');
if(isset($_GET['GMtask'])){$askedTask=(int)($_GET['GMtask']);}
if(isset($_GET['GMedit'])){$askedit=(int)($_GET['GMedit']);}
if(isset($_GET['link'])){$asklink=(int)($_GET['link']);}

if(isset($_GET['GMtask'])){
if($askedTask==100){
unset($_SESSION['gm_taskName']);
unset($_SESSION['gm_task']);
header("location:$lpanel");
}
elseif($askedTask==1){
$_SESSION['gm_taskName']="- News";
$_SESSION['gm_task']=1;
header("location:$lpanel");
}
elseif($askedTask==11){
$_SESSION['gm_taskName']="- News";
$_SESSION['gm_task']=1;
header("location:$lpanel?edit&news=$askedit");
}
elseif($askedTask==2){
$_SESSION['gm_taskName']="- Modération";
$_SESSION['gm_task']=2;
header("location:$lpanel");
}
elseif($askedTask==3){
$_SESSION['gm_taskName']="- Event";
$_SESSION['gm_task']=3;
header("location:$lpanel");
}
else{
header("location:$lindex");
}
}
elseif(isset($_GET['link'])){
if($asklink==1){
$_SESSION['askcash']=1;
header("location:$lmoncompte");}

}
exit();

