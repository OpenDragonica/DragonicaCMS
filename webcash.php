<?php
session_start();
require_once("data/db.php");
require_once("data/function.php");
require_once("data/secu.php");
$user= userInfo($_SESSION['id']);
$user_ID=$user['ID'];
$user_Cash=$user['Cash'];
$user_Mail=$user['Email'];
$user_WebCash=$user['WebCash'];
@include('link.php');

//POST
$Post_WebCash=(int)($_POST['WebCash']);
$prevurl=$_POST["url"];

$url=strtok($prevurl,'?');
$final_bonus=0;
/*$i=$Post_WebCash;
if($i>=10)://IF more than 10 eur
    $bonus=250; //Bonus to add each 10
    $bonus_count=(int)($i/2.5); //Bonus 600 count
    $final_bonus=(int)($bonus*$bonus_count);
endif;*/

if($Post_WebCash>0){
if($Post_WebCash<=$user_WebCash){//Verifie les webcashs

/*ConvertWebCash($user_ID,$Post_WebCash,$final_bonus);*/
$_SESSION['msg_state']=6000;
$fp=fopen("https://api.telegram.org/bot776363739:AAEnhWbD1imoc4rvBc8fbTKXTDrW5liw8jk/sendMessage?chat_id=421269555&text=User {$user_ID} has changed {$Post_WebCash} Euro > Cash on the site (https://dragonica-hydra.com). ","r");
/*$_SESSION['Post_AskedWebcash']=$Post_WebCash;
$_SESSION['AddedCash']=($Post_WebCash*250)+$final_bonus;*/


								//10EUR
								if( $Post_WebCash ==10){ConvertWebCash($user_ID, 10000,$Post_WebCash);$_SESSION['AddedCash']=10000;$Post_WebCash=0;}else {}
								//20EUR
								if( $Post_WebCash ==20){ConvertWebCash($user_ID, 25000,$Post_WebCash);$_SESSION['AddedCash']=25000;$Post_WebCash=0;}else {}
								//40EUR
								if( $Post_WebCash ==40){ConvertWebCash($user_ID, 80000,$Post_WebCash);$_SESSION['AddedCash']=80000;$Post_WebCash=0;}else {}
								//60EUR
								if( $Post_WebCash ==60){ConvertWebCash($user_ID, 120000,$Post_WebCash);$_SESSION['AddedCash']=120000;$Post_WebCash=0;}else {}
								//80EUR
								if( $Post_WebCash ==80){ConvertWebCash($user_ID, 210000,$Post_WebCash);$_SESSION['AddedCash']=210000;$Post_WebCash=0;}else {}
								//100EUR
								if( $Post_WebCash ==100){ConvertWebCash($user_ID, 300000,$Post_WebCash);$_SESSION['AddedCash']=300000;$Post_WebCash=0;}else {}

header("location:$lmoncompte");
}
else {
$_SESSION['msg_state']=6001;
header("location:$lmoncompte");
}
}
else{
$_SESSION['msg_state']=6002;
header("location:$lmoncompte"); 
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>