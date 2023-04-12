<?php
// Début de la requête PHP
$requête3 = $dbh->query('SELECT TOP (3) *
	FROM [dbo].[TB_News] 
	WHERE display=1
	ORDER BY date DESC'); // On envois la requête à la connexion PDO, le "query" permet d'envoyer une requête à la BDD.
//Ici, on selectionne la table news, que l'on ordonne par "id" de façon décroissante, avec X news maximum //ID, Auteur, Titre, Date, Texte_news
$item_count=0;
while ($donnees3 = $requête3->fetch()) // On effectue une boucle des données récupérées plus haut grâce à la requête nommée "$requête".
{ // Ouverture de la boucle NEWS 
$article_id=$donnees3['id'];
$article_Title=html_entity_decode($donnees3['Titre']);
$article_prev=html_entity_decode($donnees3['Preview']);
$article_preview=str_replace("<br />", " ", $article_prev);
$article_img=$donnees3['Img_Link'];
$article_link=$lactu."?news=".$article_id;
$article_comment=$donnees3['Forum_Link'];
$article_type=$donnees3['type'];
$latest_len=strlen($article_preview);
if($latest_len>=35){$suspension='...';}else{$suspension='';}

$item_count++;

if ($article_type==1){$article_badge=$news_badge;$sdefault_img=$sbasicNEW;}
elseif ($article_type==2){$article_badge=$event_badge;$sdefault_img=$sbasicEVENT;}
elseif ($article_type==3){$article_badge=$maj_badge;$sdefault_img=$sbasicMAJ;}
elseif ($article_type==4){$article_badge=$promo_badge;$sdefault_img=$sbasicPROMO;}
elseif ($article_type==5){$article_badge=$annonce_badge;$sdefault_img=$sbasicIMG;}
elseif ($article_type==6){$article_badge=$maint_badge;$sdefault_img=$sbasicMAINT;}
elseif ($article_type==7){$article_badge=$maint_badge;$sdefault_img=$sbasicMario;}
elseif ($article_type==8){$article_badge=$maint_badge;$sdefault_img=$sbasicTerm;}
if ($article_img==$empty_img){$article_img=$sdefault_img;}

if($item_count==1){
$latest1_link=$article_link;
$latest1_img=$article_img;
$latest1_title=$article_Title;
$latest1_preview=substr($article_preview, 0, 35).$suspension;
}
elseif($item_count==2){
$latest2_link=$article_link;
$latest2_img=$article_img;
$latest2_title=$article_Title;
$latest2_preview=substr($article_preview, 0, 35).$suspension;
}
elseif($item_count==3){
$latest3_link=$article_link;
$latest3_img=$article_img;
$latest3_title=$article_Title;
$latest3_preview=substr($article_preview, 0, 35).$suspension;
}
// Fermeture de la boucle NEWS 
} $requête3->closeCursor();

?>