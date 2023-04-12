<h2><span class="top_mainContent_f">Staff</span></h2> 
<div class="content-padding">    
<ul class="fa-ul">                                                                                                                 
<?php
//état de connection IG staff
$StaffOnline="<span style='color: green;text-shadow: 0 0 .1em green;'>En Ligne</span>";
$StaffOffline='<span style="color: red;text-shadow: 0 0 .1em red;">Hors Ligne</span>';
$admin_style='style="background-color: red";';
$mj_style='style="background-color: green";';
// Début de la requête PHP
$staffload = $dbh->query('SELECT *
	FROM [dbo].[TB_Staff] 
	WHERE display=1
	ORDER BY Statut DESC,Joindate DESC'); // On envois la requête à la connexion PDO, le "query" permet d'envoyer une requête à la BDD.
//Ici, on selectionne la table news, que l'on ordonne par "id" de façon décroissante, avec X news maximum //ID, Auteur, Titre, Date, Texte_news
while ($donnees2 = $staffload->fetch()) // On effectue une boucle des données récupérées plus haut grâce à la requête nommée "$requête".
{ // Ouverture de la boucle NEWS 
$staff_id=$donnees2['ACC_ID'];
$staff_pseudo=$donnees2['Membre'];
$staff_grade=$donnees2['Statut'];
$staff_role=html_entity_decode($donnees2['Memo']);
$staff_img=$donnees2['Img_Link'];
$staff_contact=$donnees2['Mail'];
$staff_history=$donnees2['JoinDate'];
if($staff_grade==10){$staff_title="Administrateur principal";$title_class=$admin_style;}
if($staff_grade==9){$staff_title="Administrateur";$title_class=$admin_style;}
elseif($staff_grade==5){$staff_title="Maitre de Jeu";$title_class=$mj_style;}
$staff_item="<div class='item'>
									<a href='#'><img src='$staff_img' class='item-photo' alt='$staff_pseudo' /></a>
									<div class='item-content'>
										<h3><a href='#'>$staff_pseudo</a><span $title_class>$staff_title</span></h3>
										<div class='social-links'>
											<a href='#'><i class='fa fa-facebook'></i></a>
											<a href='#'><i class='fa fa-twitter'></i></a>
											<a href='#'><i class='fa fa-google-plus'></i></a>
											<a href='#'><i class='fa fa-pinterest'></i></a>
											<a href='#'><i class='fa fa-dribbble'></i></a>
											<a href='#'><i class='fa fa-linkedin'></i></a>
											<a href='#'><i class='fa fa-youtube'></i></a>
										</div>
										$staff_role
									</div>
								</div>";
print $staff_item;
/*
if($staff_grade==10){
    $admin_cnt++;
    if($admin_cnt==1)
    {
   $admin1=$staff_id;
   $admin1_pseudo=$staff_pseudo;
   $gm1state=checkGM($staff_id);
   $gm1state=$gm1state['ConnectionRealm'];
   $admin1IMG=$staff_img;
   $admin1_title="Administrateur Principal";
   $admin1_role=$staff_role;
    }
    if($admin_cnt==2)
    {
   $admin2=$staff_id;
   $admin2_pseudo=$staff_pseudo;
   $gm2state=checkGM($staff_id);
   $gm2state=$gm1state['ConnectionRealm'];
   $admin2IMG=$staff_img;
   $admin2_title="Administrateur";
   $admin2_role=$staff_role;
    }
}
elseif($staff_grade==5){
    $mj_cnt++;
    if($mj_cnt==1)
    {
   $mj1=$staff_id;
   $mj1_pseudo=$staff_pseudo;
   $mj1state=checkGM($mj1);
   $mj1state=$mj1state['ConnectionRealm'];
   $mj1IMG=$staff_img;
   $mj1_title=$mj_grade;
   $mj1_role=$staff_role;
    }
    if($mj_cnt==2)
    {
   $mj2=$staff_id;
   $mj2_pseudo=$staff_pseudo;
   $mj2state=checkGM($mj2);
   $mj2state=$mj2state['ConnectionRealm'];
   $mj2IMG=$staff_img;
   $mj2_title=$mj_grade;
   $mj2_role=$staff_role;
    }
    if($mj_cnt==3)
    {
   $mj3=$staff_id;
   $mj3_pseudo=$staff_pseudo;
   $mj3state=checkGM($mj3);
   $mj3state=$mj1state['ConnectionRealm'];
   $mj3IMG=$staff_img;
   $mj3_title=$mj_grade;
   $mj3_role=$staff_role;
    }
    if($mj_cnt==4)
    {
   $mj4=$staff_id;
   $mj4_pseudo=$staff_pseudo;
   $mj4state=checkGM($mj4);
   $mj4state=$mj4state['ConnectionRealm'];
   $mj4IMG=$staff_img;
   $mj4_title=$mj_grade;
   $mj4_role=$staff_role;
    }
}
*/
} $staffload->closeCursor();
?>
</ul>  
</div>
