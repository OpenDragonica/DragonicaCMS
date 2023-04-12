<?php
// Début de la requête PHP
$requête4 = $dbh->query('SELECT TOP (5) *
	FROM [dbo].[TB_News] 
	WHERE display=1
	ORDER BY visites DESC'); // On envois la requête à la connexion PDO, le "query" permet d'envoyer une requête à la BDD.
//Ici, on selectionne la table news, que l'on ordonne par "id" de façon décroissante, avec X news maximum //ID, Auteur, Titre, Date, Texte_news
$popular_count=0;
while ($donnees4 = $requête4->fetch()) // On effectue une boucle des données récupérées plus haut grâce à la requête nommée "$requête".
{ // Ouverture de la boucle NEWS 
$article_id=$donnees4['id'];
$article_Title=html_entity_decode($donnees4['Titre']);
$article_prev=html_entity_decode($donnees4['Preview']);
$article_preview=str_replace("<br />", " ", $article_prev);
$article_img=$donnees4['Img_Link'];
$article_link=$lactu."?news=".$article_id;
$article_comment=$donnees4['Forum_Link'];
$article_type=$donnees4['type'];
$popular_len=strlen($article_preview);
if($popular_len>=70){$suspension='...';}else{$suspension='';}

if ($article_type==1){$article_badge=$news_badge;$sdefault_img=$sbasicNEW;}
elseif ($article_type==2){$article_badge=$event_badge;$sdefault_img=$sbasicEVENT;}
elseif ($article_type==3){$article_badge=$maj_badge;$sdefault_img=$sbasicMAJ;}
elseif ($article_type==4){$article_badge=$promo_badge;$sdefault_img=$sbasicPROMO;}
elseif ($article_type==5){$article_badge=$annonce_badge;$sdefault_img=$sbasicIMG;}
elseif ($article_type==6){$article_badge=$maint_badge;$sdefault_img=$sbasicMAINT;}
elseif ($article_type==7){$article_badge=$maint_badge;$sdefault_img=$sbasicMario;}
elseif ($article_type==8){$article_badge=$maint_badge;$sdefault_img=$sbasicTerm;}
if ($article_img==$empty_img){$article_img=$sdefault_img;}

$popular_count++;

if($popular_count==1){
$popular1_link=$article_link;
$popular1_img=$article_img;
$popular1_title=$article_Title;
$popular1_preview=substr($article_preview, 0, 70).$suspension;
}
elseif($popular_count==2){
$popular2_link=$article_link;
$popular2_img=$article_img;
$popular2_title=$article_Title;
$popular2_preview=substr($article_preview, 0, 70).$suspension;
}
elseif($popular_count==3){
$popular3_link=$article_link;
$popular3_img=$article_img;
$popular3_title=$article_Title;
$popular3_preview=substr($article_preview, 0, 70).$suspension;
}
elseif($popular_count==4){
$popular4_link=$article_link;
$popular4_img=$article_img;
$popular4_title=$article_Title;
$popular4_preview=substr($article_preview, 0, 70).$suspension;
}
elseif($popular_count==5){
$popular5_link=$article_link;
$popular5_img=$article_img;
$popular5_title=$article_Title;
$popular5_preview=substr($article_preview, 0, 70).$suspension;
}
// Fermeture de la boucle NEWS 
} $requête4->closeCursor();

?>