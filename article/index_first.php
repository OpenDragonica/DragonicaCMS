<?php
// Début de la requête PHP
$requête = $dbh->query('SELECT TOP (4) *
	FROM [dbo].[TB_News] 
	WHERE slide >=1
	ORDER BY slide ASC'); // On envois la requête à la connexion PDO, le "query" permet d'envoyer une requête à la BDD.
//Ici, on selectionne la table news, que l'on ordonne par "id" de façon décroissante, avec X news maximum //ID, Auteur, Titre, Date, Texte_news
$index_new_count=0;
while ($donnees = $requête->fetch()) // On effectue une boucle des données récupérées plus haut grâce à la requête nommée "$requête".
{ // Ouverture de la boucle NEWS 
$article_id=$donnees['id'];
$article_Title=html_entity_decode($donnees['Titre']);
$article_prev=html_entity_decode($donnees['Preview']);
$article_preview=str_replace("<br />", " ", $article_prev);
$article_img=$donnees['Img_Link'];
$article_link=$lactu."?news=".$article_id;
$article_comment=$donnees['Forum_Link'];
$article_type=$donnees['type'];

$index_new_count++;

if ($article_type==1){$article_badge=$news_badge;$sdefault_img=$sbasicNEW;}
elseif ($article_type==2){$article_badge=$event_badge;$sdefault_img=$sbasicEVENT;}
elseif ($article_type==3){$article_badge=$maj_badge;$sdefault_img=$sbasicMAJ;}
elseif ($article_type==4){$article_badge=$promo_badge;$sdefault_img=$sbasicPROMO;}
elseif ($article_type==5){$article_badge=$annonce_badge;$sdefault_img=$sbasicIMG;}
elseif ($article_type==6){$article_badge=$maint_badge;$sdefault_img=$sbasicMAINT;}
elseif ($article_type==7){$article_badge=$maint_badge;$sdefault_img=$sbasicMario;}
elseif ($article_type==8){$article_badge=$maint_badge;$sdefault_img=$sbasicTerm;}

if ($article_img==$empty_img){$article_img=$sdefault_img;}

if($index_new_count==1){
$left_link=$article_link;
$left_img=$article_img;
$left_title=$article_Title;
$left_preview=$article_preview;
$left_comment=$article_comment;
require_once("article/article_left.php");
print '<span class="top_mainContent_f">Accueil</span>
<div class="content-padding">';
echo $article_left;
}
elseif($index_new_count==2){
$right_link=$article_link;
$right_img=$article_img;
$right_title=$article_Title;
$right_preview=$article_preview;
include("article/article_right.php");
print '<div class="home-article right">
            <ul>';
echo $article_right;
}
elseif($index_new_count==3){
$right_link=$article_link;
$right_img=$article_img;
$right_title=$article_Title;
$right_preview=$article_preview;
include("article/article_right.php");
echo $article_right;
}
/*
elseif($index_new_count==4){
$right_link=$article_link;
$right_img=$article_img;
$right_title=$article_Title;
$right_preview=$article_preview;
include("article/article_right.php");
echo $article_right;
}
elseif($index_new_count==5){
$right_link=$article_link;
$right_img=$article_img;
$right_title=$article_Title;
$right_preview=$article_preview;
include("article/article_right.php");
echo $article_right;
}
elseif($index_new_count==6){
$right_link=$article_link;
$right_img=$article_img;
$right_title=$article_Title;
$right_preview=$article_preview;
include("article/article_right.php");
echo $article_right;
}*/
elseif($index_new_count==4){
$right_link=$article_link;
$right_img=$article_img;
$right_title=$article_Title;
$right_preview=$article_preview;
include("article/article_right.php");
echo $article_right;
print "</ul>

								<div>
									<a href='$lactu' class='defbutton'><i class='fa fa-reply'></i>Plus d'articles</a>
								</div>
								
							</div>
							
 
    <div class='clear-float'></div>    
</div>";
}
// Fermeture de la boucle NEWS 
} $requête->closeCursor();
?>