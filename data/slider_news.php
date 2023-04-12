<?php
// Début de la requête PHP
$requête = $dbh->query('SELECT TOP (4) *
	FROM [dbo].[TB_News] 
	WHERE slide >=1
	ORDER BY slide ASC'); // On envois la requête à la connexion PDO, le "query" permet d'envoyer une requête à la BDD.
//Ici, on selectionne la table news, que l'on ordonne par "id" de façon décroissante, avec 5 news maximum //ID, Auteur, Titre, Date, Texte_news
$slide_count=0;
while ($donnees = $requête->fetch()) // On effectue une boucle des données récupérées plus haut grâce à la requête nommée "$requête".
{ // Ouverture de la boucle NEWS 
$news_id=$donnees['id'];
$Title=html_entity_decode($donnees['Titre']);
$texte=html_entity_decode($donnees['Preview']);
$news_img=$donnees['Img_Link'];
$news_type=$donnees['type'];
$news_link=$lactu."?news=".$news_id;

if ($news_type==1){$sdefault_img=$sbasicNEW;}
elseif ($news_type==2){$sdefault_img=$sbasicEVENT;}
elseif ($news_type==3){$sdefault_img=$sbasicMAJ;}
elseif ($news_type==4){$sdefault_img=$sbasicPROMO;}
elseif ($news_type==5){$sdefault_img=$sbasicIMG;}
elseif ($news_type==6){$sdefault_img=$sbasicMAINT;}
if ($news_img==$empty_img){$news_img=$sdefault_img;}
$slide_count++;

//else {$avatar=$avatar_default;} 

if ($slide_count==1){$slide1_title=$Title;$slide1_img=$news_img;$slide1_preview=$texte;$slide1_link=$news_link;print "<style>#featured-img-1 {background-image: url($slide1_img);}</style>";}
elseif ($slide_count==2){$slide2_title=$Title;$slide2_img=$news_img;$slide2_preview=$texte;$slide2_link=$news_link;print "<style>#featured-img-2 {background-image: url($slide2_img);}</style>";}
elseif ($slide_count==3){$slide3_title=$Title;$slide3_img=$news_img;$slide3_preview=$texte;$slide3_link=$news_link;print "<style>#featured-img-3 {background-image: url($slide3_img);}</style>";}
elseif ($slide_count==4){$slide4_title=$Title;$slide4_img=$news_img;$slide4_preview=$texte;$slide4_link=$news_link;print "<style>#featured-img-4 {background-image: url($slide4_img);}</style>";}
} // Fermeture de la boucle NEWS
$requête->closeCursor(); // On ferme la connexion PDO, pour éviter les problèmes
?>
