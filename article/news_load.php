<?php 
if (isset($_GET['news'])){
$visit_id=$_GET['news'];
$news_select= News_INFO($_GET['news']);
$news_id=$news_select['id'];
$checkNews=checkExistNews($_GET['news']);
if ($checkNews[0] == 1){
//$news_select= News_INFO($_GET["news"]);
$news_display=$news_select['display'];
if ($news_display == 0){ header("Location:$lactu#disp0");exit();}
else{
VisitCounter($visit_id);

//état de connection IG staff
$StaffOnline="online";
$StaffOffline='offline';
$admin_style='style="background-color: red";';
$mj_style='style="background-color: green";';


$auteur=$news_select['Auteur'];
$CountAutorNews=CountAutorNews($auteur);
$auteur_count=$CountAutorNews['Autor_NewsCount'];
$news_html_title=$news_select['Titre'];
$title=html_entity_decode($news_html_title);
$news_text=$news_select['Texte_news'];
$news_texte=html_entity_decode($news_text);
$news_FLink=$news_select['Forum_Link'];
$nIMG=$news_select['Img_Link'];
$news_visits=$news_select['visites'];
/*if($nIMG=="#"){$nIMG=0;}*/
$news_type=$news_select['type'];
//si aucune image enseignée
if ($news_type<=1){$type_title="NEWS";if(empty($nIMG) OR  $nIMG==$empty_img){$nIMG=$sbasicNEW;}}
elseif ($news_type==2){$type_title="EVENT";if(empty($nIMG) OR  $nIMG==$empty_img){$nIMG=$sbasicEVENT;}}
elseif ($news_type==3){$type_title="MISE A JOUR";if(empty($nIMG) OR  $nIMG==$empty_img){$nIMG=$sbasicMAJ;}}
elseif ($news_type==4){$type_title="PROMOTION";if(empty($nIMG) OR  $nIMG==$empty_img){$nIMG=$sbasicPROMO;}}
elseif ($news_type==5){$type_title="INFO";if(empty($nIMG) OR  $nIMG==$empty_img){$nIMG=$sbasicIMG;}}
elseif ($news_type>=6){$type_title="MAINTENANCE";if(empty($nIMG) OR  $nIMG==$empty_img){$nIMG=$sbasicMAINT;}}
elseif ($news_type>=7){$type_title="Mario";if(empty($nIMG) OR  $nIMG==$empty_img){$nIMG=$sbasicMario;}}
elseif ($news_type>=7){$type_title="Term";if(empty($nIMG) OR  $nIMG==$empty_img){$nIMG=$sbasicTerm;}}

$page_location_second='<li>'.$title.'</li>';
//Convertion Nom de compte-Pseudo
$auteur_info=StaffuserInfo($auteur);
$auteur_pseudo=$auteur_info['Membre'];
//check statut en ligne
$mj1state=checkGM($auteur);$mj1state=$mj1state['ConnectionRealm'];
if($mj1state==1){$mjstate=$StaffOnline;}else{$mjstate=$StaffOffline;}

$auteur_img=$auteur_info['Img_Link'];
$auteur_grade=$auteur_info['Statut'];
if($auteur_grade==10){$staff_title="Administrateur principal";$title_class=$admin_style;$mjstate='';}
if($auteur_grade==9){$staff_title="Administrateur";$title_class=$admin_style;$mjstate='';}
elseif($auteur_grade==5){$staff_title="Maitre de Jeu";$title_class=$mj_style;}



$originalDate = $news_select['Date'];
$eng_date= date("d F Y", strtotime($originalDate));
$translate_date=CalendarTranslate_English_to_French($eng_date);
$news_date=$translate_date;
$similarlDate=strtotime($originalDate);
$similarDate=$similarlDate-2592000;
$similar_date= date("Y-m-d H:i:s", $similarDate);
$psubtitle=$type_title;
}  
    } 
    else {//ID introuvable
        header("Location:$lactu#noid");exit();   
    }
}else {//parametre news corrompu
        header("Location:$lactu#noidset");exit();   
    }
?>
