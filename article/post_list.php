<?php
$list=$_GET['list'];
print"<h2><span class='top_mainContent_f'>Latest news</span></h2>
						<div class='content-padding'>";
// Début de la requête PHP
$requete4 = $dbh->query('SELECT *
	FROM [dbo].[TB_News] 
	WHERE display=1
	ORDER BY date DESC'); // On envois la requête à la connexion PDO, le "query" permet d'envoyer une requête à la BDD.
//Ici, on selectionne la table news, que l'on ordonne par "id" de façon décroissante, avec X news maximum //ID, Auteur, Titre, Date, Texte_news
$article_list_count=0;
?>
<script src='jscript/jquery-1.9.1.min.js'></script>
<?php if ($list==patchnote):?>
<script>
(function($){
$(document).ready(function(){
$('.new').remove();
$('.event').remove();
	});
})(jQuery);;
</script>
<?php endif; ?>
<?php if ($list==event):?>
<script>
(function($){
$(document).ready(function(){
$('.new').remove();
$('.maj').remove();
	});
})(jQuery);
</script>
<?php endif; ?>
<?php if ($list==news):?>
<script>
(function($){
$(document).ready(function(){
$('.event').remove();
$('.maj').remove();
	});
})(jQuery);
</script>
<?php endif; ?>
<script src='jscript/article.js'></script>
<input type='hidden' id='current_page' />  
<input type='hidden' id='show_per_page' /> 
<div id='li_list'>
<?php
while ($donnees2 = $requete4->fetch()) // On effectue une boucle des données récupérées plus haut grâce à la requête nommée "$requête".
{ // Ouverture de la boucle NEWS 
$article_id=$donnees2['id'];
$article_autor=$donnees2['Auteur'];
$auteur_info=StaffuserInfo($article_autor);
$list_autor=$auteur_info['Membre'];
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
$article_date=$translate_date;

if ($news_type==1){$news_type=$ty_News;$badge=$news_badge;}
elseif ($news_type==2){$news_type=$ty_Event;$badge=$event_badge;}
elseif ($news_type==3){$news_type=$ty_Maj;$badge=$maj_badge;}
elseif ($news_type==4){$news_type=$ty_Promo;$badge=$promo_badge;}else{}

$article_list_count++;

if ($article_type==1){$article_badge=$news_badge;$news_type=$ty_News;$sdefault_img=$sbasicNEW;}
elseif ($article_type==2){$article_badge=$event_badge;$news_type=$ty_Event;$sdefault_img=$sbasicEVENT;}
elseif ($article_type==3){$article_badge=$maj_badge;$news_type=$ty_Maj;$sdefault_img=$sbasicMAJ;}
elseif ($article_type==4){$article_badge=$promo_badge;$news_type=$ty_News;$sdefault_img=$sbasicPROMO;}
elseif ($article_type==5){$article_badge=$annonce_badge;$news_type=$ty_News;$sdefault_img=$sbasicIMG;}
elseif ($article_type==6){$article_badge=$maint_badge;$news_type=$ty_News;$sdefault_img=$sbasicMAINT;}
elseif ($article_type==7){$article_badge=$maint_badge;$news_type=$ty_News;$sdefault_img=$sbasicMario;}

if ($article_img==$empty_img){$article_img=$sdefault_img;}
   
$item_link=$article_link;
$item_img=$article_img;
$item_title=$article_Title;
$item_preview=$article_preview;
$item_comment=$article_comment;

print"<div class='$news_type'>";
include("article/article_list.php");
echo $article_list;
print"<div class='clear-float do-the-split'></div>";
print"</div>";//NEWS TYPE CLOSE DIV
// Fermeture de la boucle NEWS 
} $requete4->closeCursor();
print"</div>"; //list close div
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?><div class='pagination'>
						<div id='page_navigation'></div>
							</div>
							
<?php print"</div>";?>