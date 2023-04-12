<?php
// Début de la requête PHP
$requête2 = $dbh->query('SELECT TOP (6) *
	FROM [dbo].[TB_News] 
	WHERE display=1
	ORDER BY date DESC'); // On envois la requête à la connexion PDO, le "query" permet d'envoyer une requête à la BDD.
//Ici, on selectionne la table news, que l'on ordonne par "id" de façon décroissante, avec X news maximum //ID, Auteur, Titre, Date, Texte_news
$index_item_count=0;
while ($donnees2 = $requête2->fetch()) // On effectue une boucle des données récupérées plus haut grâce à la requête nommée "$requête".
{ // Ouverture de la boucle NEWS 
$article_id=$donnees2['id'];
$article_Title=html_entity_decode($donnees2['Titre']);
$article_prev=html_entity_decode($donnees2['Preview']);
$article_preview=str_replace("<br />", " ", $article_prev);
$article_img=$donnees2['Img_Link'];
$article_link=$lactu."?news=".$article_id;
$article_comment=$donnees2['Forum_Link'];
$article_type=$donnees2['type'];



$originalDate = $donnees2['Date'];
$eng_date= date("d F Y", strtotime($originalDate));
$translate_date=CalendarTranslate_English_to_French($eng_date);
$news_date=$translate_date;
$similarlDate=strtotime($originalDate);
$similarDate=$similarlDate-2592000;
$similar_date= date("Y-m-d H:i:s", $similarDate);
$psubtitle=$type_title;
$index_item_count++;
/*
if ($article_type==1){$article_badge=$news_badge;}
elseif ($article_type==2){$article_badge=$event_badge;}
elseif ($article_type==3){$article_badge=$maj_badge;}
elseif ($article_type==4){$article_badge=$promo_badge;}
elseif ($article_type==5){$article_badge=$annonce_badge;}
elseif ($article_type==6){$article_badge=$maint_badge;}*/

if ($article_type==1){$article_badge=$news_badge;$sdefault_img=$sbasicNEW;}
elseif ($article_type==2){$article_badge=$event_badge;$sdefault_img=$sbasicEVENT;}
elseif ($article_type==3){$article_badge=$maj_badge;$sdefault_img=$sbasicMAJ;}
elseif ($article_type==4){$article_badge=$promo_badge;$sdefault_img=$sbasicPROMO;}
elseif ($article_type==5){$article_badge=$annonce_badge;$sdefault_img=$sbasicIMG;}
elseif ($article_type==6){$article_badge=$maint_badge;$sdefault_img=$sbasicMAINT;}
elseif ($article_type==7){$article_badge=$maint_badge;$sdefault_img=$sbasicMario;}
elseif ($article_type==7){$article_badge=$maint_badge;$sdefault_img=$sbasicTerm;}

if ($article_img==$empty_img){$article_img=$sdefault_img;}

if($index_item_count==1){
print '<h2><span class="top_mainContent_f">Last News</span></h2>
						<div class="content-padding">
							<div class="grid-articles">';    
$item_link=$article_link;
$item_img=$article_img;
$item_title=$article_Title;
$item_preview=$article_preview;
$item_comment=$article_comment;
include("article/article_item.php");
echo $article_item;
}
elseif($index_item_count==2){
$item_link=$article_link;
$item_img=$article_img;
$item_title=$article_Title;
$item_preview=$article_preview;
$item_comment=$article_comment;
include("article/article_item.php");
echo $article_item;
}
elseif($index_item_count==3){
$item_link=$article_link;
$item_img=$article_img;
$item_title=$article_Title;
$item_preview=$article_preview;
$item_comment=$article_comment;
include("article/article_item.php");
echo $article_item;
}
elseif($index_item_count==4){
$item_link=$article_link;
$item_img=$article_img;
$item_title=$article_Title;
$item_preview=$article_preview;
$item_comment=$article_comment;
include("article/article_item.php");
echo $article_item;
}
elseif($index_item_count==5){
$item_link=$article_link;
$item_img=$article_img;
$item_title=$article_Title;
$item_preview=$article_preview;
$item_comment=$article_comment;
include("article/article_item.php");
echo $article_item;
}

elseif($index_item_count==6){
$item_link=$article_link;
$item_img=$article_img;
$item_title=$article_Title;
$item_preview=$article_preview;
$item_comment=$article_comment;
include("article/article_item.php");
echo $article_item;
print '</div>
						</div>';
}

elseif($index_item_count==7){
$item_link=$article_link;
$item_img=$article_img;
$item_title=$article_Title;
$item_preview=$article_preview;
$item_comment=$article_comment;
include("article/article_item.php");
echo $article_item;
print '</div>
						</div>';
}

// Fermeture de la boucle NEWS 
} $requête2->closeCursor();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>