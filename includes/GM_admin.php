<div class="w615 mcenter center">
<form id="Ban_Member" name="Change_Username" action="admin/moderate.php" method="POST">
    <input type="hidden" value="changename" name="action"/>
    <table class="mcenter">
		<tr>
		<th colspan="2">Changement de nom</th>
		</tr>
		<tr>
			<td style="text-align:center">
			<label id="lUserID" for="UserID">Personnage</label>
			</td>
			<td style="text-align:center">
			<label id="lBan_Comment" for="Ban_Comment">Nouveau Nom</label>
			</td>
		</tr>
		<tr>
			<td>
			<center><input id="username" name="current_name" type="text" value="" maxlength="20" /></center>
			</td>
			<td>
			<center><input id="new_username" name="new_name" type="text" value="" maxlength="20" /></center>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align:center">
			<ul></ul>
			<center><input type="submit" value="Valider"></center>
			</td>
		</tr>
	</table>
</form>
<div class="clear10"></div>
<div class="clearBTM"></div>    
<form id="Ban_Member" name="Ban_Member" action="admin/moderate.php" method="POST">
    <input type="hidden" value="ban" name="action"/>
    <table class="mcenter" style="padding: 5px;">
		<tr>
                    <th colspan="3">Suspendre un Joueur
                    <div class="clear10"></div>
                    </th>                
		</tr>
		<tr>
			<td>
			<label id="lmemberID" for="memberID">Personnage</label>
			</td>
			<td>
			<label id="lUnban_Date" for="Unban_Date">Date et heure de fin</br><span style="font-weight: lighter;font-style: oblique;">(An/Mois/Jour HH:MM)</span></label>
			</td>
			<td>
			<label id="lBan_Comment" for="Ban_Comment">Motif</label>
			</td>
		</tr>
		<tr>
			<td>
			<center><input id="user" name="user" type="text" value="" maxlength="15" /></center>
			</td>
			<td>
			<center><input id="Unban_Date" name="Unban_Date" type="datetime" value="<?php $date=date("Y-m-d"); echo "$date 00:00"?>" /></center>
			</td>
			<td>
			<center><input id="Ban_Comment" name="Ban_Comment" type="text" value="" maxlength="50" /></center>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td style="text-align:center">
			<ul></ul>
			<center><input type="submit" value="Bannir"></center>
			</td>
			<td>
			</td>
		</tr>
	</table>
</form>
    <div class="clear10"></div>
    <div class="clearBTM"></div>
<form id="Ban_Member" name="UnBan_Member" action="admin/moderate.php" method="POST">
    <input type="hidden" value="unban" name="action"/>
    <table class="mcenter" style="padding: 5px;">
		<tr>
		<th colspan="2">Déban</th>
		</tr>
		<tr>
			<td>
			<label id="lmemberID" for="memberID">Personnage</label>
			</td>
			<td>
			<label id="lBan_Comment" for="Ban_Comment">Motif</label>
			</td>
		</tr>
		<tr>
			<td>
			<center><input id="user" name="user" type="text" value="" maxlength="15" /></center>
			</td>
			<td>
			<center><input id="UnBan_Comment" name="UnBan_Comment" type="text" value="" maxlength="50" /></center>
			</td>
		</tr>
		<tr>
			<td colspan="2">
			<ul></ul>
			<center><input type="submit" value="Dé-bannir"></center>
			</td>
		</tr>
	</table>
</form>
<div class="clear10"></div>
<div class="clearBTM"></div>
<div class="clear10"></div>  
<a href="<?php echo $lgm_clear ?>"><button>Retour</button></a>
<div class="clearBTM"></div>
<div class="clear10"></div>  
<table class="mcenter" >
<tr>
<th>Historique Opérations</th>
</tr>
<tr>
<td>
<div class="log_table">
<TABLE border ="1" width="100%" style="border: 3px solid grey;width: 97%;text-align: center;">
		<thead>
		<tr style="">
           <TH class="moderate">Personnage</TH>
           <TH class="moderate">Date</TH>
		   <TH class="moderate">Motif</TH>
		   <TH class="moderate">Fin de Ban</TH>
		</tr>
		</thead>
		   <?php
// Début de la requête PHP
$gmid=$MemberID;
$b_idx=0;
$requête =$dbh->prepare('
SELECT TOP(20)
tbl_GmComment.Character,
tbl_GmComment.Comment,
tbl_GmComment.RegisterDate,
tbl_GmComment.UnbanDate,
tbl_GmComment.GmId,
Member.BlockEndTime
FROM tbl_GmComment
CROSS JOIN Member
WHERE tbl_GmComment.Idx > :id and tbl_GmComment.UserId=Member.ID
ORDER BY tbl_GmComment.RegisterDate DESC');
//tbl_GmComment.GmId =:id and tbl_GmComment.UserId=Member.ID 
$requête->bindParam(':id', $b_idx);
$requête->execute();
 // On envois la requête à la connexion PDO, le "query" permet d'envoyer une requête à la BDD.
//Ici, on selectionne la table news, que l'on ordonne par "id" de façon décroissante, avec 5 news maximum //ID, Auteur, Titre, Date, Texte_news
while ($donnees = $requête->fetch()) // On effectue une boucle des données récupérées plus haut grâce à la requête nommée "$requête".
{ // Ouverture de la boucle NEWS 
$log_perso=$donnees['Character'];
$log_date= $donnees['RegisterDate'];
$log_comment=$donnees['Comment'];
$log_unblock=$donnees['UnbanDate'];
$log_GmId=$donnees['GmId'];
$log_date = date("d/m/Y H:i", strtotime($log_date));
$log_unblock = date("d/m/Y H:i", strtotime($log_unblock));
if(strcmp ($log_unblock, "01/01/1970 01:00")== 0){$log_unblock="";}
if (strcmp ($log_GmId, $admin1)== 0){$log_GmId=$admin1_pseudo;}
elseif (strcmp ($log_GmId, $admin2)== 0){$log_GmId=$admin2_pseudo;}
elseif (strcmp ($log_GmId, $mj1)== 0){$log_GmId=$mj1_pseudo;}
elseif (strcmp ($log_GmId, $mj2)== 0){$log_GmId=$mj2_pseudo;}
elseif (strcmp ($log_GmId, $mj3)== 0){$log_GmId=$mj3_pseudo;}
elseif (strcmp ($log_GmId, $mj4)== 0){$log_GmId=$mj4_pseudo;}
elseif (strcmp ($log_GmId, $mj5)== 0){$log_GmId=$mj5_pseudo;}
	 else {}
?>
           <TR>
           <TD><?php print"$log_perso";?></TD>
           <TD><?php print"$log_date";?></TD>
		   <TD><?php print"<strong>$log_GmId:</strong>$log_comment";?></TD>
		   <TD><?php print"$log_unblock";?></TD>
           </TR>
<?php
} // Fermeture de la boucle NEWS
$requête->closeCursor(); // On ferme la connexion PDO, pour éviter les problèmes
?>
</TABLE></div>
</td>
</tr>
</table>
<div class="clear10"></div>  
<a href="<?php echo $lgm_clear ?>"><button>Retour</button></a>
</div>