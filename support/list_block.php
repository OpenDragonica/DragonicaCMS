<?php
$thr_cnt=0;
$disp_on=1;
$stick_onWait="<i class='sticky'>Ouvert</i>";
$stick_NewAnswer="<i class='sticky blue'>Répondu</i>";
$stick_Closed="<i class='thr-closed'>Clos</i>";
$stick_Archived="<i class='sticky'>Archivé</i>";
$stick="";

$thr_player="<i title='Joueur' class='forum-icon strike-tooltip'><i class='fa fa-users'></i></i>";
$thr_game="<i title='Jeu' class='forum-icon strike-tooltip'><i class='fa fa-gamepad'></i></i>";
$thr_website="<i title='Site' class='forum-icon strike-tooltip'><i class='fa fa-tasks'></i></i>";
$thr_other="<i title='Site' class='forum-icon strike-tooltip'><i class='fa fa-comments-o'></i></i>";
$thr_type="";

$visit_unread="thread-link thread-unread thread-sticky";
$visit_readed="thread-link thread-unread";
$visit_closed="thread-link thread-locked";
$visit_state="";

if($MemberGMLevel>8):
$sql="SELECT *
	FROM [dbo].[TB_Support]
	WHERE  display = :id
	ORDER BY statut, Date DESC";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':id', $disp_on);
	$stmt->execute();
$requête=$stmt->execute();
elseif($MemberGMLevel<8):
$sql="SELECT *
	FROM [dbo].[TB_Support]
	WHERE  Membre = :id
	ORDER BY statut,Date DESC";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':id', $MemberID);
	$stmt->execute();
$requête=$stmt->execute();
endif;
while ($donnees = $stmt->fetch()){
    $thr_cnt++;
    $support_id=$donnees['id'];
    $support_autor=$donnees['Membre'];
    $support_title=$donnees['Objet'];
    $support_GUID=$donnees['GUID'];
    $support_statut=$donnees['statut'];
    $support_display=$donnees['display'];
    $support_type=$donnees['type'];
    
//Derniere reponse
    $support_GetLastMessage=Support_Messages_INFO($support_GUID);
    $LastMessage_autor=$support_GetLastMessage['Auteur'];
    $LastMessage_date=$support_GetLastMessage['Date'];
    $LastMessage_visited=$support_GetLastMessage['visited'];
//reponse staff-joueur - $Answ_MemberGMLevel
    $GetUserAnswStaffLevel=userInfo($LastMessage_autor);
    $Answ_MemberGMLevel=$GetUserAnswStaffLevel['GMLevel'];
        
    
//Nombre de reponses
    $support_answCount=CountSupportMessages($support_GUID);
    $Answer_count=$support_answCount['Messages'];
    $Answ_Count=$Answer_count-1;
 //pseudo   
$auteur_info=StaffuserInfo($LastMessage_autor);
$auteur_pseudo=$auteur_info['Membre'];
if(!empty($auteur_pseudo)){$LastMessage_autor=$auteur_pseudo;}

//titre
    $title=html_entity_decode($support_title);
//date
$eng_date= date("d F Y", strtotime($LastMessage_date));
$hours_date= date("H:i", strtotime($LastMessage_date));
$translate_date=CalendarTranslate_English_to_French($eng_date);
$posted_date=$translate_date;   

//type
if ($support_type==1){$thr_type=$thr_player;}
elseif ($support_type==2){$thr_type=$thr_game;}
elseif ($support_type==3){$thr_type=$thr_website;}
elseif ($support_type==4){$thr_type=$thr_other;}

//statut
if ($support_statut==1){$stick=$stick_onWait;}
elseif ($support_statut==2){$stick=$stick_NewAnswer;}
elseif ($support_statut==3){$stick=$stick_Closed;}
if ($support_display==0){$stick=$stick_Archived;}

if($MemberGMLevel<8){
//visite
if ($LastMessage_visited==0){$visit_state=$visit_readed;}
elseif ($LastMessage_visited>=2){$visit_state=$visit_unread;}
elseif (($LastMessage_visited==0)AND($support_statut==3)){$visit_state=$visit_closed;}
}
elseif($MemberGMLevel>8){
if ($support_statut==0 or $support_statut==2){$visit_state=$visit_readed;}
elseif ($support_statut==1){$visit_state=$visit_unread;}
elseif ($support_statut==3){$visit_state=$visit_closed;}
}
 include('support/list_thread.php');                    
                    print $thread_link;
}

    print"<center><div class='clear10'></div><a href='$lmessages_create' class='newdefbutton margin-right'><i class='fa fa-comments'></i>Create a new ticket</a></center>";

//FIN
?>