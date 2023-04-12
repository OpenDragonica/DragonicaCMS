<div id="news_list">
<table class="mcenter w615">
<?php
$requête = $dbh->query('SELECT *
	FROM [dbo].[TB_News] 
	ORDER BY date DESC'); 
while ($donnees = $requête->fetch()) 
{ 
$originalDate = $donnees['Date'];
$newDate = date("d/m/Y", strtotime($originalDate));
$news_type=$donnees['type'];
$Title=html_entity_decode($donnees['Titre']);
$State=$donnees['display'];
$Slider_disp=$donnees['slide'];

if($State==0){$display="<img src=images/off.png />";$disT="Masquée<img src=images/off.png />";}
elseif($State==1){$display="<img src=images/on.png />";$disT="Afichée<img src=images/on.png />";}

if($Slider_disp==0){$dSlide="";}
elseif($Slider_disp>=1){$dSlide="<small>$Slider_disp</small>";}

$news_badge='<span class="badge-list-puce" style="background-color: #E27800;">Actu</span>';
$event_badge='<span class="badge-list-puce" style="background-color: #0DA69A;">Event</span>';
$maj_badge='<span class="badge-list-puce" style="background-color: #170DA6;">M.à.J</span>';
$promo_badge='<span class="badge-list-puce" style="background-color: #0DA69A;">Promo</span>';
$annonce_badge='<span class="badge-list-puce" style="background-color: #E27800;">Info</span>';
$maint_badge='<span class="badge-list-puce" style="background-color: #A60D0D;">Maint.</span>';
$sbasicMario='<span class="badge-list-puce" style="background-color: #A60D0D;">Mario.</span>';

if ($news_type==1){$nClass=$news_class;$news_type=$ty_News;$nIMG=$sbasicNEW;$badge=$news_badge;}
elseif ($news_type==2){$nClass=$event_class;$news_type=$ty_Event;$nIMG=$sbasicEVENT;$badge=$event_badge;}
elseif ($news_type==3){$nClass=$maj_class;$news_type=$ty_Maj;$nIMG=$sbasicMAJ;$badge=$maj_badge;}
elseif ($news_type==4){$nClass=$promo_class;$news_type=$ty_Promo;$nIMG=$sbasicPROMO;$badge=$promo_badge;}
elseif ($news_type==5){$nClass=$Info_class;$news_type=$ty_Annonce;$nIMG=$sbasicIMG;$badge=$annonce_badge;}
elseif ($news_type==6){$nClass=$Info_class;$news_type=$ty_maint;$nIMG=$sbasicMAINT;$badge=$maint_badge;}
elseif ($news_type==7){$nClass=$Info_class;$news_type=$ty_mario;$nIMG=$sbasicMario;$badge=$sbasicMario;}
elseif ($news_type==8){$nClass=$Info_class;$news_type=$ty_mario;$nIMG=$sbasicMario;$badge=$sbasicTerm;}

?>
    <tr class="news_list">
        <td class="list-puce"><?php print"$badge";?></td>
        <td><a href="<?php print "$lpanel"?>?edit&news=<?php echo $donnees['id'];?>" class="news_name bold"><?php echo"$Title" ?></a></td>
        <td class="news_date"><?php echo"$disT" ?></td>
        <td class="news_date"><?php echo"$dSlide" ?></td>
    </tr>
<?php
} // Fermeture de la boucle NEWS
$requête->closeCursor(); // On ferme la connexion PDO, pour éviter les problèmes
?>
</table>
<div class="clear10"></div>
<center><a  href="<?php echo "$lpanel" ?>"><button>Retour</button></a></center>
</div>