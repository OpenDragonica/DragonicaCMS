<?php 
//Fuseau Horaire
date_default_timezone_set('Europe/Paris');
setlocale(LC_ALL, "fr_FR");
//apc_clear_cache;
require_once("data/db.php");
require_once("data/db_user.php");
require_once("data/db_statics.php");
require_once("data/function.php");
require_once("data/function_user.php");
require_once("data/function_statics.php");
require_once("data/news_function.php");
session_start();
@include('EventState.php');
//gmtask
$gm_task=$_SESSION['gm_task'];
//include_once("includes/load_staff.php");
//Serveur
$realm=1;
$max_player=50;
$playercount = Countplayer($realm);
$playercounts = $playercount['ConnectedPlayers'];
//$playercounts=40;

$GetServerVer= GetPatchVersion(259);
$ServerVer_major=$GetServerVer['major_version'];
$ServerVer_minor=$GetServerVer['minor_version'];
$ServerVer_patch=$GetServerVer['patch_version'];
$ServerVer_Memo=$GetServerVer['memo'];
$ServerVer_State=$GetServerVer['website_state'];

$serverVER="$ServerVer_major.$ServerVer_minor.$ServerVer_patch";
$state=$ServerVer_State; //0-OFF 1-ON /2-MAINT
$state_img1="images/State_1.png";//ON
$state_img2="images/State_2.png";//OFF
$state_img3="images/State_3.png";//MAINT
if($state==1){$serverSTATE='<span style="color: green;">En Ligne</span>';$state_img=$state_img1;}
elseif($state==2){$serverSTATE='<span style="color: orange;">Maintenance</span>';$state_img=$state_img3;$playercounts;}
else{$serverSTATE='<span style="color: red;">Hors Ligne</span>';$state_img=$state_img2;$playercounts;}


$charge_calcul=($playercounts/$max_player);
$charge_percent=(int)($charge_calcul*100);

$faible='<span style="color: #5b7e2a;">Faible</span>';
$moy1='<span style="color: #a2a529;">Moyenne</span>';
$moy2='<span style="color: #ffa200;">Moyenne</span>';
$forte='<span style="color: #ff5a00;">Elevée</span>';
if($charge_percent<30){$charge_text=$faible;}
if($charge_percent>30){$charge_text=$moy1;}
if($charge_percent>60){$charge_text=$moy2;}
if($charge_percent>80){$charge_text=$forte;}


$t1=time();
$add_day=86400;
$today= date("d-m-Y", $t1);
$arene1=strtotime("$today 10:00:00");
$arene2=strtotime("$today 12:30:00");
$arene3=strtotime("$today 15:00:00");
$arene4=strtotime("$today 17:30:00");
$arene5=strtotime("$today 20:00:00");
$arene6=strtotime("$today 22:30:00");

$arene_img1="images/arene/a1.jpg";//ON
$arene_img2="images/arene/a1.jpg";//ON
$arene_img3="images/arene/a1.jpg";//ON
$arene_img4="images/arene/a1.jpg";//ON
$arene_img5="images/arene/a1.jpg";//ON
$arene_img6="images/arene/a1.jpg";//ON

$arene_name1="Dragon de feu";//ON
$arene_name2="Dragon de feu";//ON
$arene_name3="Dragon de feu";//ON
$arene_name4="Dragon de feu";//ON
$arene_name5="Dragon de feu";//ON
$arene_name6="Dragon de feu";//ON

$Next1_time=null;$Next1_img=null;$Next1_name=null;
$Next2_time=null;$Next2_img=null;$Next2_name=null;

if($t1<$arene1){
    $Next1_time=$arene1;$Next1_img=$arene_img1;$Next1_name=$arene_name1;
    $Next2_time=$arene2;$Next2_img=$arene_img2;$Next2_name=$arene_name2;
}
elseif($t1>$arene1 and $t1<$arene2){
    $Next1_time=$arene2;$Next1_img=$arene_img2;$Next1_name=$arene_name2;
    $Next2_time=$arene3;$Next2_img=$arene_img3;$Next2_name=$arene_name3;
}
elseif($t1>$arene2 and $t1<$arene3){
    $Next1_time=$arene3;$Next1_img=$arene_img3;$Next1_name=$arene_name3;
    $Next2_time=$arene4;$Next2_img=$arene_img4;$Next2_name=$arene_name4;
}
elseif($t1>$arene3 and $t1<$arene4){
    $Next1_time=$arene4;$Next1_img=$arene_img4;$Next1_name=$arene_name4;
    $Next2_time=$arene5;$Next2_img=$arene_img5;$Next2_name=$arene_name5;
}
elseif($t1>$arene4 and $t1<$arene5){
    $Next1_time=$arene5;$Next1_img=$arene_img5;$Next1_name=$arene_name5;
    $Next2_time=$arene6;$Next2_img=$arene_img6;$Next2_name=$arene_name6;
}
elseif($t1>$arene5 and $t1<$arene6){
    $Next1_time=$arene6;$Next1_img=$arene_img6;$Next1_name=$arene_name6;
    $Next2_time=$arene1+$add_day;$Next2_img=$arene_img1;$Next2_name=$arene_name1;
}
elseif($t1>$arene6){
    $Next1_time=$arene1+$add_day;$Next1_img=$arene_img1;$Next1_name=$arene_name1;
    $Next2_time=$arene2+$add_day;$Next2_img=$arene_img2;$Next2_name=$arene_name2;
}

$Next1_pdate=date("d M Y, H:i", $Next1_time);
$Next2_pdate=date("d M Y, H:i", $Next2_time);

$Next1_date=date_hours($Next1_pdate);
$Next2_date=date_hours($Next2_pdate);
//expiration de session
if(!empty($_SESSION['expire'])):
$now = time();
if ($now > $_SESSION['expire']) {
            session_destroy();
            $current_page='http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            header("location:$current_page");
            Exit(); 
        }        
endif;
//infos compte
if(!empty($_SESSION['id'])):
$_SESSION['expire']=($now+3600);
$userInfo= userInfo($_SESSION['id']);
$MemberID=$userInfo['ID'];
$MemberKey=$userInfo['MemberKey'];
$MemberCash=$userInfo['Cash'];
$user_WebCash=$userInfo['WebCash'];
$user_HCash=$userInfo['HCash'];
$MemberGMLevel=$userInfo['GMLevel'];
$MemberMail=$userInfo['Email'];
$MemberJoinDate=date("d F Y", strtotime($userInfo['CreateDate']));
$MemberJoinDate=CalendarTranslate_English_to_French($MemberJoinDate);
$MemberBlock=$userInfo['Block'];
$MemberBlockCmt=$userInfo['GMComment'];
$MemberBlockEnd=$userInfo['BlockEndTime'];
$Bantime = date("d-m-Y H:i", strtotime($MemberBlockEnd));
//$Bantime=substr("$MemberBlockEnd", 0, 16);
$unbandate=strtotime($MemberBlockEnd);
$PID=$userInfo['PID'];
$countFilleuls=checkFilleuls($PID);
$Filleuls=$countFilleuls['Filleuls'];
//SUPPORT
if($MemberGMLevel>8):
$messages_count = CountMessagesAdmin(1);
$lmessages_count = $messages_count['Messages'];
elseif($MemberGMLevel<8):
$messages_count = CountMessages(2,$MemberID);
$lmessages_count = $messages_count['Messages'];
endif;
//$lmessages_count=0;


//EVENT
$CheckEvent=CheckEvent($MemberID);
$CheckExistEvent=$CheckEvent['Exist'];

if($CheckExistEvent>0){
$eventANNIV="OFF";
}
endif;
//Notifications
$register_session=$_SESSION['register_state'];
$login_session=$_SESSION['login_state'];
$error_session=$_SESSION['error_state'];
$msg_session=$_SESSION['msg_state'];
$trylog_cnt=$_SESSION['log_try'];

if ($msg_session>0)
{	
    $notify=100;
}
elseif ($error_session>0)
{	
    $notify=100;
}
elseif ($login_session>0)
{	
    $notify=100;
}
elseif ($register_session>0)
{	
    $notify=100;
}
else{$notify=0;}

//parametres images par défaut news
$empty_img="#";
//Images page Acceuil
$sbasicIMG="images/photos/article_defaut_info.jpg";
$sbasicNEW="images/photos/article_defaut_new.jpg";
$sbasicEVENT="images/photos/article_defaut_event.jpg";
$sbasicMAJ="images/photos/article_defaut_maj.jpg";
$sbasicPROMO="images/photos/article_defaut_new.jpg";
$sbasicMAINT="images/photos/article_defaut_maint.jpg";
$sbasicMario="images/photos/article_defaut_Mario.jpg";
$sbasicTerm="images/photos/article_defaut_term.jpg";
//Images dans les articles si aucune image renseignée
$basicIMG="img/news/img/b1.jpg";
$basicNEW="img/news/img/b1.jpg";
$basicEVENT="img/news/img/b2.jpg";
$basicMAJ="img/news/img/b3.jpg";
$basicPROMO="img/news/img/b2.jpg";
$basicMAINT="img/news/img/b4.jpg";
//Type de news
$news_class='new';$news_title="News";
$event_class='event';$event_title="Event";
$maj_class='maj';$maj_title="Patch";
$promo_class='promo';$promo_title="Promo";
$Info_class='info';$Info_title="Notice";

$ty_News='new';$news_badge='<img src="/images/icon_news_new.png">';
$ty_Event='event';$event_badge='<img src="/images/icon_news_event.png">';
$ty_Maj='maj';$maj_badge='<img src="/images/icon_news_patch.png">';
$ty_Promo='promo';$promo_badge='<img src="/images/icon_news_promo.png">';
$ty_Annonce='info';$annonce_badge='<img src="/images/icon_news_info.png">';
$ty_maint='maint';$maint_badge='<img src="/images/icon_news_maint.png">';
$ty_mario='maint';$mario_badge='<img src="/images/icon_news_maint.png">';

if(empty($psubtitle)){
    $psubtitle=$ptitle;
}