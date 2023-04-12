<?php
date_default_timezone_set('Europe/Paris');
@include('EventState.php');
session_start();
require_once("data/db.php");
require_once("data/db_user.php");
require_once("data/function.php");
require_once("data/function_user.php");
require_once("data/secu.php");
@include('link_map.php');
$user= userInfo($_SESSION['id']);
$Member=$_SESSION['id'];
$MemberCash=$user['Cash'];
$user_WebCash=$user['WebCash'];
$user_HCash=$user['HCash'];
$MemberKey =$user['MemberKey'];
$MemberState=$user['ConnectionRealm'];
$action=$_POST["action"];

//CHANGE NAME
if (strcmp ($action, "changename")==0){    
$ItemNo=98003720;
$InvType=4;
$cost=1;
$ASKcharNo=(int)($_POST["CharName"]);
//check selected character
if ($ASKcharNo==1){$ASKcharGUID=$_SESSION['char1GUID'];}
elseif ($ASKcharNo==2){$ASKcharGUID=$_SESSION['char2GUID'];}
elseif ($ASKcharNo==3){$ASKcharGUID=$_SESSION['char3GUID'];}
elseif ($ASKcharNo==4){$ASKcharGUID=$_SESSION['char4GUID'];}
elseif ($ASKcharNo==5){$ASKcharGUID=$_SESSION['char5GUID'];}
elseif ($ASKcharNo==6){$ASKcharGUID=$_SESSION['char6GUID'];}
elseif ($ASKcharNo==7){$ASKcharGUID=$_SESSION['char7GUID'];}
elseif ($ASKcharNo==8){$ASKcharGUID=$_SESSION['char8GUID'];}
$checkItem=CheckItemOnInv($ASKcharGUID,$ItemNo,$InvType);
$checkItemCount=$checkItem['Count'];

    if($checkItemCount>=$cost){
$checkItemGuid=$checkItem['ItemGuid'];     
$ASKcharnameP=$_POST["NEWname"];
$ASKcharname=str_replace(' ','',$ASKcharnameP);
$TestName=isName($ASKcharname);
    
    if(!empty($ASKcharGUID)){
        $LastChange=LastChangeName($ASKcharGUID);
        $LastChangeName=strtotime($LastChange['Date']);
        $NextChangeName=$LastChangeName+172800;
        $now = time();
        if($now>$NextChangeName){
        //get select character name
        
        $character= CharacterInfo($ASKcharGUID);        
        $chname=$character['Name'];
        $checkName= checkExistUser($ASKcharname);
        $checkUserMemberKey=GetUserMemberKey($chname);
        $UserMemberKey=$checkUserMemberKey['MemberID'];
        IF($UserMemberKey==$MemberKey){//on vérifie que le personnage appartient bien au compte.
           if ((!empty($ASKcharname))and($TestName==TRUE)and(strlen($ASKcharname)<=20)and(strlen($ASKcharname)>=3)) {//on vérifie le format du nouveau nom
                if ($checkName[0] == 0){//on vérifie si le nom n'est pas déjà utilisé
                    if($MemberState==0){
                    if($checkItemCount>1){
                    ReduceItem($checkItemGuid);
                    }else{
                    DeleteItem($checkItemGuid);
                    }
                    ChangeUserName($chname,$ASKcharname);
                    PostChangeName($ASKcharGUID,$ASKcharname,$chname);
                    $_SESSION['oldusername']=$chname;
                    $_SESSION['newusername']=$ASKcharname;
                    $_SESSION['msg_state']=100;
                    header("location:$lmoncompte"); 
                    }  else {//membre connecté
                    $_SESSION['msg_state']=104;
                    header("location:$lmoncompte");
                    }
                }
                else{//Nom utilisé
                $_SESSION['msg_state']=101;
                header("location:$lmoncompte"); 
                }
            }
            else{
                //format incorrect
                $_SESSION['msg_state']=102;
                header("location:$lmoncompte");
            }
        }
        else{
            //le membre ne posséde pas le personnage.
            session_destroy();
            session_start();
            $_SESSION['msg_state']=999;
            header("location:$lindex");
        }
     }else{
            //Temps d'attente non écoulé.
            $_SESSION['msg_state']=107;
            header("location:$lmoncompte");
        }
    }
    else{
        //invalid characterguid
        $_SESSION['msg_state']=103;
        header("location:$lmoncompte");
    }
    }
   else{
        //Quantité insuffisante
        $_SESSION['msg_state']=105;
        header("location:$lmoncompte"); 
   }
    }

//CHANGE SEX
elseif (strcmp ($action, "changesex")==0){
$ItemNo=98003710;
$InvType=4;
$cost=1;
$ASKcharNo=(int)($_POST["CharNo"]);
$ASKcharSEX=(int)($_POST["sex"]);
//check selected character
if ($ASKcharNo==1){$ASKcharGUID=$_SESSION['char1GUID'];$current_sex=$_SESSION['char1Sex'];}
elseif ($ASKcharNo==2){$ASKcharGUID=$_SESSION['char2GUID'];$current_sex=$_SESSION['char2Sex'];}
elseif ($ASKcharNo==3){$ASKcharGUID=$_SESSION['char3GUID'];$current_sex=$_SESSION['char3Sex'];}
elseif ($ASKcharNo==4){$ASKcharGUID=$_SESSION['char4GUID'];$current_sex=$_SESSION['char4Sex'];}
elseif ($ASKcharNo==5){$ASKcharGUID=$_SESSION['char5GUID'];$current_sex=$_SESSION['char5Sex'];}
elseif ($ASKcharNo==6){$ASKcharGUID=$_SESSION['char6GUID'];$current_sex=$_SESSION['char6Sex'];}
elseif ($ASKcharNo==7){$ASKcharGUID=$_SESSION['char7GUID'];$current_sex=$_SESSION['char7Sex'];}
elseif ($ASKcharNo==8){$ASKcharGUID=$_SESSION['char8GUID'];$current_sex=$_SESSION['char8Sex'];}
$checkItem=CheckItemOnInv($ASKcharGUID,$ItemNo,$InvType);
$checkItemCount=$checkItem['Count'];
if($checkItemCount>=$cost){
$checkItemGuid=$checkItem['ItemGuid']; 
if((!($ASKcharSEX==$current_sex)and($ASKcharSEX<3)and($ASKcharSEX>0))){
      //get select character info
       $character= CharacterInfo($ASKcharGUID); 
       $chname=$character['Name'];
       $chjob=$character['Job'];
       $checkUserMemberKey=GetUserMemberKey($chname);
       $UserMemberKey=$checkUserMemberKey['MemberID'];
       IF($UserMemberKey==$MemberKey){
           //on vérifie que le membre est déconnecté
           if($MemberState==0){
$gender=$ASKcharSEX;
if($chjob>0 and $chjob<=28){$drakan=0;}
elseif($chjob>=51 and $chjob<=58){$drakan=1;}
if ($drakan==0){
 if($gender==1){$tnewsex="<strong>un Homme</strong>";$face="20001103";$hair="20000101";} elseif($gender==2){$tnewsex="<strong>une Femme</strong>";$face="20001113";$hair="20000110";}
}
elseif ($drakan==1){
 if($gender==1){$tnewsex="<strong>un Homme</strong>";$face="99802580";$hair="99802710";} elseif($gender==2){$tnewsex="<strong>une Femme</strong>";$face="99802600";$hair="99802820";}
}
           if($checkItemCount>1){
                    ReduceItem($checkItemGuid);
                    }else{
                    DeleteItem($checkItemGuid);
                    }
           ChangeUserSex($chname,$gender,$face,$hair);
           $_SESSION['editeduser']=$chname;
           $_SESSION['editedgender']=$tnewsex;
           $_SESSION['msg_state']=200;
           header("location:$lmoncompte");
           } else {//membre connecté
                    $_SESSION['msg_state']=104;
                    header("location:$lmoncompte");
                    }
       }
       else {//le membre ne posséde pas le personnage.
           session_destroy();
           session_start();
           $_SESSION['msg_state']=999;
           header("location:$lindex");
       }
   }
   else{
       //Le sexe choisi est deja l'actuel
       $_SESSION['msg_state']=201;
       header("location:$lmoncompte");
   }
 }
else{
    //Pas de change sexe
    $_SESSION['msg_state']=106;
    header("location:$lmoncompte"); 
   }

}

//ITEM SEND

elseif (strcmp ($action, "EVENT")==0){
    if($eventANNIV=="ON"){
$ASKcharNo=(int)($_POST["CharNo"]);
//Mail Info
$MailTitle="Anniversaire Rivals";
$MailText="Merci de jouer sur Rivals, Ce cadeau devrait vous donner un bon coup de pouce pour faire évoleur votre personnage.";
$Money=0;
$FromName="Dragonica Rivals";
$Count=30;

if ($ASKcharNo==1){$ASKcharGUID=$_SESSION['char1GUID'];}
elseif ($ASKcharNo==2){$ASKcharGUID=$_SESSION['char2GUID'];}
elseif ($ASKcharNo==3){$ASKcharGUID=$_SESSION['char3GUID'];}
elseif ($ASKcharNo==4){$ASKcharGUID=$_SESSION['char4GUID'];}
elseif ($ASKcharNo==5){$ASKcharGUID=$_SESSION['char5GUID'];}
elseif ($ASKcharNo==6){$ASKcharGUID=$_SESSION['char6GUID'];}
elseif ($ASKcharNo==7){$ASKcharGUID=$_SESSION['char7GUID'];}
elseif ($ASKcharNo==8){$ASKcharGUID=$_SESSION['char8GUID'];}
//check selected character
$ToGuid=$ASKcharGUID;

$CheckEvent=CheckEvent($Member);
$CheckExistEvent=$CheckEvent['Exist'];

if($CheckExistEvent==0){
$character=CharacterInfo($ASKcharGUID);
$WA_Class=$character['Job'];
$WA_Lvl=$character['Level'];
$WA_Name=$character['Name'];
if($WA_Lvl>=20 and $WA_Class<=4){
HaveEvent($Member,$WA_Name,$WA_Class);
//SendItem($ToGuid,$MailTitle,$MailText,$Money,$FromName,$ItemNo,$Count,$type);
@include('include/changeclass_item.php');
//SETS
SendItem($ToGuid,$MailTitle,$MailText,$Money,$FromName,$ItemNo1,30,'Ev1');//Casque
SendItem($ToGuid,$MailTitle,$MailText,$Money,$FromName,$ItemNo2,30,'Ev2');
SendItem($ToGuid,$MailTitle,$MailText,$Money,$FromName,$ItemNo3,30,'Ev3');
SendItem($ToGuid,$MailTitle,$MailText,$Money,$FromName,$ItemNo4,30,'Ev4');
SendItem($ToGuid,$MailTitle,$MailText,$Money,$FromName,$ItemNo5,30,'Ev5');
SendItem($ToGuid,$MailTitle,$MailText,$Money,$FromName,$ItemNo6,30,'Ev6');
SendItem($ToGuid,$MailTitle,$MailText,$Money,$FromName,$ItemNo7,30,'Ev7');
SendItem($ToGuid,$MailTitle,$MailText,$Money,$FromName,$Weapon,185,'EvW');
$_SESSION['msg_state']=501;
header("location:$lmoncompte");  
}else{
    //TROP BL
    $_SESSION['msg_state']=502;
    header("location:$lmoncompte"); 
   }
 }
 else{
    //A DEJA RECU
    $_SESSION['msg_state']=503;
    header("location:$lmoncompte"); 
   }
    }else{
    //EVENT INACTIF
    $_SESSION['msg_state']=504;
    header("location:$lmoncompte"); 
   }
}
/*elseif (strcmp ($action, "VIP")==0){
$ASKcharNo=(int)($_POST["CharNo"]);
$product="VIP Potion";
$cost=2000;
//Mail Info
$MailTitle="Potion VIP";
$MailText="Nous vous remercions pour votre achat. Bon jeu sur Battle DGN";
$Money=0;
$FromName="Battle DGN";
$ItemNo=52100180;
$Count=1;

if($MemberCash>=$cost){
//check selected character
if ($ASKcharNo==1){$ASKcharGUID=$_SESSION['char1GUID'];}
elseif ($ASKcharNo==2){$ASKcharGUID=$_SESSION['char2GUID'];}
elseif ($ASKcharNo==3){$ASKcharGUID=$_SESSION['char3GUID'];}
elseif ($ASKcharNo==4){$ASKcharGUID=$_SESSION['char4GUID'];}
elseif ($ASKcharNo==5){$ASKcharGUID=$_SESSION['char5GUID'];}
elseif ($ASKcharNo==6){$ASKcharGUID=$_SESSION['char6GUID'];}
elseif ($ASKcharNo==7){$ASKcharGUID=$_SESSION['char7GUID'];}
elseif ($ASKcharNo==8){$ASKcharGUID=$_SESSION['char8GUID'];}

$ToGuid=$ASKcharGUID;

WebCashProduct($Member, $cost,$product);
SendItem($ToGuid,$MailTitle,$MailText,$Money,$FromName,$ItemNo,$Count,$type);
$_SESSION['item_bought']=$product;
$_SESSION['msg_state']=400;
header("location:$lmoncompte");  

 }
 else{
    //NOT ENOUGHT CASH
    $_SESSION['msg_state']=401;
    header("location:$lmoncompte"); 
   }
   
}*/

/**NEW ACTION**/
//CHANGE ???/
/*
 * elseif (strcmp ($action, "???")==0){
 * 
 * }
 */
 

//ITEM SEND
elseif (strcmp ($action, "15")==0){
$ASKcharNo=(int)($_POST["CharNo"]);
$product="W-COIN";
$cost=10;
//Mail Info
$MailTitle="W-COIN";
$MailText="Thank you for your purchase, a successful game.";
$Money=0;
$FromName="Score Dragonica Hydra";
$ItemNo=98005580;
$Count=50;

if($user_WebCash>=$cost){
//check selected character
if ($ASKcharNo==1){$ASKcharGUID=$_SESSION['char1GUID'];}
elseif ($ASKcharNo==2){$ASKcharGUID=$_SESSION['char2GUID'];}
elseif ($ASKcharNo==3){$ASKcharGUID=$_SESSION['char3GUID'];}
elseif ($ASKcharNo==4){$ASKcharGUID=$_SESSION['char4GUID'];}
elseif ($ASKcharNo==5){$ASKcharGUID=$_SESSION['char5GUID'];}
elseif ($ASKcharNo==6){$ASKcharGUID=$_SESSION['char6GUID'];}
elseif ($ASKcharNo==7){$ASKcharGUID=$_SESSION['char7GUID'];}
elseif ($ASKcharNo==8){$ASKcharGUID=$_SESSION['char8GUID'];}

$ToGuid=$ASKcharGUID;

WebCashProduct($Member, $cost,$product);
SendItemNew($ToGuid,$MailTitle,$MailText,$Money,$FromName,$ItemNo,$Count,0,0,0,0);
$_SESSION['item_bought']=$product;
$_SESSION['msg_state']=75;
$fp=fopen("https://api.telegram.org/bot776363739:AAEnhWbD1imoc4rvBc8fbTKXTDrW5liw8jk/sendMessage?chat_id=421269555&text=Login: {$Member} CharGuid: {$ASKcharGUID} buy {$Count} W-Coin on the site (https://dragonica-hydra.com). ","r");
header("location:$lmoncompte");  

 }
 else{
    //NOT ENOUGHT CASH
    $_SESSION['msg_state']=58;
    header("location:$lmoncompte"); 
   }
   
}

//ITEM SEND
elseif (strcmp ($action, "50")==0){
$ASKcharNo=(int)($_POST["CharNo"]);
$product="W-COIN";
$cost=20;
//Mail Info
$MailTitle="W-COIN";
$MailText="Thank you for your purchase, a successful game.";
$Money=0;
$FromName="Score Dragonica Hydra";
$ItemNo=98005580;
$Count=120;

if($user_WebCash>=$cost){
//check selected character
if ($ASKcharNo==1){$ASKcharGUID=$_SESSION['char1GUID'];}
elseif ($ASKcharNo==2){$ASKcharGUID=$_SESSION['char2GUID'];}
elseif ($ASKcharNo==3){$ASKcharGUID=$_SESSION['char3GUID'];}
elseif ($ASKcharNo==4){$ASKcharGUID=$_SESSION['char4GUID'];}
elseif ($ASKcharNo==5){$ASKcharGUID=$_SESSION['char5GUID'];}
elseif ($ASKcharNo==6){$ASKcharGUID=$_SESSION['char6GUID'];}
elseif ($ASKcharNo==7){$ASKcharGUID=$_SESSION['char7GUID'];}
elseif ($ASKcharNo==8){$ASKcharGUID=$_SESSION['char8GUID'];}

$ToGuid=$ASKcharGUID;

WebCashProduct($Member, $cost,$product);
SendItemNew($ToGuid,$MailTitle,$MailText,$Money,$FromName,$ItemNo,$Count,0,0,0,0);
$_SESSION['item_bought']=$product;
$_SESSION['msg_state']=75;
$fp=fopen("https://api.telegram.org/bot776363739:AAEnhWbD1imoc4rvBc8fbTKXTDrW5liw8jk/sendMessage?chat_id=421269555&text=Login: {$Member} CharGuid: {$ASKcharGUID} buy {$Count} W-Coin on the site (https://dragonica-hydra.com). ","r");
header("location:$lmoncompte");  

 }
 else{
    //NOT ENOUGHT CASH
    $_SESSION['msg_state']=58;
    header("location:$lmoncompte"); 
   }
   
}

//ITEM SEND
elseif (strcmp ($action, "100")==0){
$ASKcharNo=(int)($_POST["CharNo"]);
$product="W-COIN";
$cost=40;
//Mail Info
$MailTitle="W-COIN";
$MailText="Thank you for your purchase, a successful game.";
$Money=0;
$FromName="Score Dragonica Hydra";
$ItemNo=98005580;
$Count=250;

if($user_WebCash>=$cost){
//check selected character
if ($ASKcharNo==1){$ASKcharGUID=$_SESSION['char1GUID'];}
elseif ($ASKcharNo==2){$ASKcharGUID=$_SESSION['char2GUID'];}
elseif ($ASKcharNo==3){$ASKcharGUID=$_SESSION['char3GUID'];}
elseif ($ASKcharNo==4){$ASKcharGUID=$_SESSION['char4GUID'];}
elseif ($ASKcharNo==5){$ASKcharGUID=$_SESSION['char5GUID'];}
elseif ($ASKcharNo==6){$ASKcharGUID=$_SESSION['char6GUID'];}
elseif ($ASKcharNo==7){$ASKcharGUID=$_SESSION['char7GUID'];}
elseif ($ASKcharNo==8){$ASKcharGUID=$_SESSION['char8GUID'];}

$ToGuid=$ASKcharGUID;

WebCashProduct($Member, $cost,$product);
SendItemNew($ToGuid,$MailTitle,$MailText,$Money,$FromName,$ItemNo,$Count,0,0,0,0);
$_SESSION['item_bought']=$product;
$_SESSION['msg_state']=75;
$fp=fopen("https://api.telegram.org/bot776363739:AAEnhWbD1imoc4rvBc8fbTKXTDrW5liw8jk/sendMessage?chat_id=421269555&text=Login: {$Member} CharGuid: {$ASKcharGUID} buy {$Count} W-Coin on the site (https://dragonica-hydra.com). ","r");
header("location:$lmoncompte");  

 }
 else{
    //NOT ENOUGHT CASH
    $_SESSION['msg_state']=58;
    header("location:$lmoncompte"); 
   }
   
}


//ITEM SEND
elseif (strcmp ($action, "500")==0){
$ASKcharNo=(int)($_POST["CharNo"]);
$product="Skill-Point";
$cost=5;
//Mail Info
$MailTitle="Skill Point";
$MailText="Thank you for your purchase, a successful game.";
$Money=0;
$FromName="Score Dragonica Hydra";
$ItemNo=50900070;
$Count=1000;

if($user_WebCash>=$cost){
//check selected character
if ($ASKcharNo==1){$ASKcharGUID=$_SESSION['char1GUID'];}
elseif ($ASKcharNo==2){$ASKcharGUID=$_SESSION['char2GUID'];}
elseif ($ASKcharNo==3){$ASKcharGUID=$_SESSION['char3GUID'];}
elseif ($ASKcharNo==4){$ASKcharGUID=$_SESSION['char4GUID'];}
elseif ($ASKcharNo==5){$ASKcharGUID=$_SESSION['char5GUID'];}
elseif ($ASKcharNo==6){$ASKcharGUID=$_SESSION['char6GUID'];}
elseif ($ASKcharNo==7){$ASKcharGUID=$_SESSION['char7GUID'];}
elseif ($ASKcharNo==8){$ASKcharGUID=$_SESSION['char8GUID'];}

$ToGuid=$ASKcharGUID;

WebCashProduct($Member, $cost,$product);
SendItemNew($ToGuid,$MailTitle,$MailText,$Money,$FromName,$ItemNo,$Count,0,0,0,0);
$_SESSION['item_bought']=$product;
$_SESSION['msg_state']=75;
$fp=fopen("https://api.telegram.org/bot776363739:AAEnhWbD1imoc4rvBc8fbTKXTDrW5liw8jk/sendMessage?chat_id=421269555&text=Login: {$Member} CharGuid: {$ASKcharGUID} buy {$Count} Skill point on the site (https://dragonica-hydra.com). ","r");
header("location:$lmoncompte");  

 }
 else{
    //NOT ENOUGHT CASH
    $_SESSION['msg_state']=58;
    header("location:$lmoncompte"); 
   }
   
}

//ITEM SEND
elseif (strcmp ($action, "999")==0){
$ASKcharNo=(int)($_POST["CharNo"]);
$product="Skill-Point";
$cost=10;
//Mail Info
$MailTitle="Skill Point";
$MailText="Thank you for your purchase, a successful game.";
$Money=0;
$FromName="Score Dragonica Hydra";
$ItemNo=50900070;
$Count=2000;

if($user_WebCash>=$cost){
//check selected character
if ($ASKcharNo==1){$ASKcharGUID=$_SESSION['char1GUID'];}
elseif ($ASKcharNo==2){$ASKcharGUID=$_SESSION['char2GUID'];}
elseif ($ASKcharNo==3){$ASKcharGUID=$_SESSION['char3GUID'];}
elseif ($ASKcharNo==4){$ASKcharGUID=$_SESSION['char4GUID'];}
elseif ($ASKcharNo==5){$ASKcharGUID=$_SESSION['char5GUID'];}
elseif ($ASKcharNo==6){$ASKcharGUID=$_SESSION['char6GUID'];}
elseif ($ASKcharNo==7){$ASKcharGUID=$_SESSION['char7GUID'];}
elseif ($ASKcharNo==8){$ASKcharGUID=$_SESSION['char8GUID'];}

$ToGuid=$ASKcharGUID;

WebCashProduct($Member, $cost,$product);
SendItemNew($ToGuid,$MailTitle,$MailText,$Money,$FromName,$ItemNo,$Count,0,0,0,0);
$_SESSION['item_bought']=$product;
$_SESSION['msg_state']=75;
$fp=fopen("https://api.telegram.org/bot776363739:AAEnhWbD1imoc4rvBc8fbTKXTDrW5liw8jk/sendMessage?chat_id=421269555&text=Login: {$Member} CharGuid: {$ASKcharGUID} buy {$Count} Skill point on the site (https://dragonica-hydra.com). ","r");
header("location:$lmoncompte");  

 }
 else{
    //NOT ENOUGHT CASH
    $_SESSION['msg_state']=58;
    header("location:$lmoncompte"); 
   }
   
}

//ITEM SEND
elseif (strcmp ($action, "999W")==0){
$ASKcharNo=(int)($_POST["CharNo"]);
$product="W-COIN";
$cost=40;
//Mail Info
$MailTitle="W-COIN";
$MailText="Thank you for your purchase, a successful game.";
$Money=0;
$FromName="Score Dragonica Hydra";
$ItemNo=98005580;
$Count=999;

if($user_WebCash>=$cost){
//check selected character
if ($ASKcharNo==1){$ASKcharGUID=$_SESSION['char1GUID'];}
elseif ($ASKcharNo==2){$ASKcharGUID=$_SESSION['char2GUID'];}
elseif ($ASKcharNo==3){$ASKcharGUID=$_SESSION['char3GUID'];}
elseif ($ASKcharNo==4){$ASKcharGUID=$_SESSION['char4GUID'];}
elseif ($ASKcharNo==5){$ASKcharGUID=$_SESSION['char5GUID'];}
elseif ($ASKcharNo==6){$ASKcharGUID=$_SESSION['char6GUID'];}
elseif ($ASKcharNo==7){$ASKcharGUID=$_SESSION['char7GUID'];}
elseif ($ASKcharNo==8){$ASKcharGUID=$_SESSION['char8GUID'];}

$ToGuid=$ASKcharGUID;

WebCashProduct($Member, $cost,$product);
SendItemNew($ToGuid,$MailTitle,$MailText,$Money,$FromName,$ItemNo,$Count,0,0,0,0);
$_SESSION['item_bought']=$product;
$_SESSION['msg_state']=75;
$fp=fopen("https://api.telegram.org/bot776363739:AAEnhWbD1imoc4rvBc8fbTKXTDrW5liw8jk/sendMessage?chat_id=421269555&text=Login: {$Member} CharGuid: {$ASKcharGUID} buy {$Count} Event W-Coin on the site (https://dragonica-hydra.com). ","r");
header("location:$lmoncompte");  

 }
 else{
    //NOT ENOUGHT CASH
    $_SESSION['msg_state']=58;
    header("location:$lmoncompte"); 
   }
   
}

//ITEM SEND
elseif (strcmp ($action, "H500")==0){
$ASKcharNo=(int)($_POST["CharNo"]);
$product="W-Coin";
$cost=50;
//Mail Info
$MailTitle="W-Coin";
$MailText="Thank you for your purchase, a successful game.";
$Money=0;
$FromName="Score Dragonica Hydra";
$ItemNo=98005580;
$Count=500;

if($user_WebCash>=$cost){
//check selected character
if ($ASKcharNo==1){$ASKcharGUID=$_SESSION['char1GUID'];}
elseif ($ASKcharNo==2){$ASKcharGUID=$_SESSION['char2GUID'];}
elseif ($ASKcharNo==3){$ASKcharGUID=$_SESSION['char3GUID'];}
elseif ($ASKcharNo==4){$ASKcharGUID=$_SESSION['char4GUID'];}
elseif ($ASKcharNo==5){$ASKcharGUID=$_SESSION['char5GUID'];}
elseif ($ASKcharNo==6){$ASKcharGUID=$_SESSION['char6GUID'];}
elseif ($ASKcharNo==7){$ASKcharGUID=$_SESSION['char7GUID'];}
elseif ($ASKcharNo==8){$ASKcharGUID=$_SESSION['char8GUID'];}

$ToGuid=$ASKcharGUID;

WebCashProduct($Member, $cost,$product);
SendItemNew($ToGuid,$MailTitle,$MailText,$Money,$FromName,$ItemNo,$Count,0,0,0,0);
$_SESSION['item_bought']=$product;
$_SESSION['msg_state']=75;
$fp=fopen("https://api.telegram.org/bot776363739:AAEnhWbD1imoc4rvBc8fbTKXTDrW5liw8jk/sendMessage?chat_id=421269555&text=Login: {$Member} CharGuid: {$ASKcharGUID} buy {$Count} Skill point on the site (https://dragonica-hydra.com). ","r");
header("location:$lmoncompte");  

 }
 else{
    //NOT ENOUGHT CASH
    $_SESSION['msg_state']=58;
    header("location:$lmoncompte"); 
   }
   
}

//ITEM SEND
elseif (strcmp ($action, "x4")==0){
$ASKcharNo=(int)($_POST["CharNo"]);
$product="Enchant 31";
$cost=20;
//Mail Info
$MailTitle="W-Coin";
$MailText="Thank you for your purchase, a successful game.";
$Money=0;
$FromName="Score Dragonica Hydra";
$ItemNo=418914150;
$Count=4;

if($user_WebCash>=$cost){
//check selected character
if ($ASKcharNo==1){$ASKcharGUID=$_SESSION['char1GUID'];}
elseif ($ASKcharNo==2){$ASKcharGUID=$_SESSION['char2GUID'];}
elseif ($ASKcharNo==3){$ASKcharGUID=$_SESSION['char3GUID'];}
elseif ($ASKcharNo==4){$ASKcharGUID=$_SESSION['char4GUID'];}
elseif ($ASKcharNo==5){$ASKcharGUID=$_SESSION['char5GUID'];}
elseif ($ASKcharNo==6){$ASKcharGUID=$_SESSION['char6GUID'];}
elseif ($ASKcharNo==7){$ASKcharGUID=$_SESSION['char7GUID'];}
elseif ($ASKcharNo==8){$ASKcharGUID=$_SESSION['char8GUID'];}

$ToGuid=$ASKcharGUID;

WebCashProduct($Member, $cost,$product);
SendItemNew($ToGuid,$MailTitle,$MailText,$Money,$FromName,$ItemNo,$Count,0,0,0,0);
$_SESSION['item_bought']=$product;
$_SESSION['msg_state']=75;
$fp=fopen("https://api.telegram.org/bot776363739:AAEnhWbD1imoc4rvBc8fbTKXTDrW5liw8jk/sendMessage?chat_id=421269555&text=Login: {$Member} CharGuid: {$ASKcharGUID} buy {$Count} Enhant Plus 31 on the site (https://dragonica-hydra.com). ","r");
header("location:$lmoncompte");  

 }
 else{
    //NOT ENOUGHT CASH
    $_SESSION['msg_state']=58;
    header("location:$lmoncompte"); 
   }
   
}

//ITEM SEND
elseif (strcmp ($action, "x15")==0){
$ASKcharNo=(int)($_POST["CharNo"]);
$product="Enchant 31";
$cost=40;
//Mail Info
$MailTitle="W-Coin";
$MailText="Thank you for your purchase, a successful game.";
$Money=0;
$FromName="Score Dragonica Hydra";
$ItemNo=418914150;
$Count=15;

if($user_WebCash>=$cost){
//check selected character
if ($ASKcharNo==1){$ASKcharGUID=$_SESSION['char1GUID'];}
elseif ($ASKcharNo==2){$ASKcharGUID=$_SESSION['char2GUID'];}
elseif ($ASKcharNo==3){$ASKcharGUID=$_SESSION['char3GUID'];}
elseif ($ASKcharNo==4){$ASKcharGUID=$_SESSION['char4GUID'];}
elseif ($ASKcharNo==5){$ASKcharGUID=$_SESSION['char5GUID'];}
elseif ($ASKcharNo==6){$ASKcharGUID=$_SESSION['char6GUID'];}
elseif ($ASKcharNo==7){$ASKcharGUID=$_SESSION['char7GUID'];}
elseif ($ASKcharNo==8){$ASKcharGUID=$_SESSION['char8GUID'];}

$ToGuid=$ASKcharGUID;

WebCashProduct($Member, $cost,$product);
SendItemNew($ToGuid,$MailTitle,$MailText,$Money,$FromName,$ItemNo,$Count,0,0,0,0);
$_SESSION['item_bought']=$product;
$_SESSION['msg_state']=75;
$fp=fopen("https://api.telegram.org/bot776363739:AAEnhWbD1imoc4rvBc8fbTKXTDrW5liw8jk/sendMessage?chat_id=421269555&text=Login: {$Member} CharGuid: {$ASKcharGUID} buy {$Count} Enhant Plus 31 on the site (https://dragonica-hydra.com). ","r");
header("location:$lmoncompte");  

 }
 else{
    //NOT ENOUGHT CASH
    $_SESSION['msg_state']=58;
    header("location:$lmoncompte"); 
   }
   
}

//ITEM SEND
elseif (strcmp ($action, "x30")==0){
$ASKcharNo=(int)($_POST["CharNo"]);
$product="Enchant 31";
$cost=45;
//Mail Info
$MailTitle="W-Coin";
$MailText="Thank you for your purchase, a successful game.";
$Money=0;
$FromName="Score Dragonica Hydra";
$ItemNo=418914150;
$Count=30;

if($user_WebCash>=$cost){
//check selected character
if ($ASKcharNo==1){$ASKcharGUID=$_SESSION['char1GUID'];}
elseif ($ASKcharNo==2){$ASKcharGUID=$_SESSION['char2GUID'];}
elseif ($ASKcharNo==3){$ASKcharGUID=$_SESSION['char3GUID'];}
elseif ($ASKcharNo==4){$ASKcharGUID=$_SESSION['char4GUID'];}
elseif ($ASKcharNo==5){$ASKcharGUID=$_SESSION['char5GUID'];}
elseif ($ASKcharNo==6){$ASKcharGUID=$_SESSION['char6GUID'];}
elseif ($ASKcharNo==7){$ASKcharGUID=$_SESSION['char7GUID'];}
elseif ($ASKcharNo==8){$ASKcharGUID=$_SESSION['char8GUID'];}

$ToGuid=$ASKcharGUID;

WebCashProduct($Member, $cost,$product);
SendItemNew($ToGuid,$MailTitle,$MailText,$Money,$FromName,$ItemNo,$Count,0,0,0,0);
$_SESSION['item_bought']=$product;
$_SESSION['msg_state']=75;
$fp=fopen("https://api.telegram.org/bot776363739:AAEnhWbD1imoc4rvBc8fbTKXTDrW5liw8jk/sendMessage?chat_id=421269555&text=Login: {$Member} CharGuid: {$ASKcharGUID} buy {$Count} Enhant Plus 31 on the site (https://dragonica-hydra.com). ","r");
header("location:$lmoncompte");  

 }
 else{
    //NOT ENOUGHT CASH
    $_SESSION['msg_state']=58;
    header("location:$lmoncompte"); 
   }
   
}
 
//CHANGE CLASS
elseif (strcmp ($action, "changeclass")==0){   
    if($MemberCash>=500){
        if($MemberState==0){
$ASKcharNo=(int)($_POST["CharName"]);

$MailTitle="Boutique  : HYDRA 2019 - Changement de classe";
$MailText="Merci pour votre achat.";
$Money=0;
$Count=1;
$ItemNo1=79000030;
$FromName="Dragonica  : HYDRA 2019";
//check selected character
if ($ASKcharNo==1){$ASKcharGUID=$_SESSION['char1GUID'];}
elseif ($ASKcharNo==2){$ASKcharGUID=$_SESSION['char2GUID'];}
elseif ($ASKcharNo==3){$ASKcharGUID=$_SESSION['char3GUID'];}
elseif ($ASKcharNo==4){$ASKcharGUID=$_SESSION['char4GUID'];}
elseif ($ASKcharNo==5){$ASKcharGUID=$_SESSION['char5GUID'];}
elseif ($ASKcharNo==6){$ASKcharGUID=$_SESSION['char6GUID'];}
elseif ($ASKcharNo==7){$ASKcharGUID=$_SESSION['char7GUID'];}
elseif ($ASKcharNo==8){$ASKcharGUID=$_SESSION['char8GUID'];}
//check selected character
$ToGuid=$ASKcharGUID;

$character=CharacterInfo($ASKcharGUID);
$Current_Class=$character['Job'];
$WA_Class=(int)($_POST["classno"]);
$WA_Lvl=$character['Level'];
$WA_Name=$character['Name'];
$_SESSION['editeduser']=$WA_Name;
if($WA_Lvl>=20 and ($Current_Class<=5 or $Current_Class==51 or $Current_Class==52 )){
//SendItem($ToGuid,$MailTitle,$MailText,$Money,$FromName,$ItemNo,$Count,$type);
@include('includes/changeclass_item.php');
//SETS
SendItem($ToGuid,$MailTitle,$MailText,$Money,$FromName,$ItemNo1,$Count,0,$WA_Name,'Changeclass');
addCash($Member, -500);
$_SESSION['msg_state']=300;
header("location:$lmoncompte");  
}else{
    //TROP BL ou mauvaise classe
    $_SESSION['msg_state']=301;
    header("location:$lmoncompte"); 
    }
     }  else {//membre connecté
                    $_SESSION['msg_state']=104;
                    header("location:$lmoncompte");
                    }
    
   }else{
    //Passez de cash
    $_SESSION['msg_state']=58;
    header("location:$lmoncompte"); 
    }
}


else{
            //no action
            session_destroy();
            session_start();
            $_SESSION['msg_state']=999;
            header("location:$lindex");
        }