<?php
session_start();
require_once("../data/db.php");
require_once("../data/function.php");
require_once("../data/news_function.php");
require_once("../data/Class.SMTP.php");
$smtp = new SMTP('ns0.ovh.net', 'noreply@dragonica- : HYDRA 2019.fr', 'password');
$smtp->set_from('Dragonica- : HYDRA 2019.fr', 'noreply@dragonica- : HYDRA 2019.fr');
@include('../link_map.php');
if(!empty($_POST["action"])){
    
$action=$_POST["action"];
//NOUVEAU TICKET
if (strcmp ($action, "Post")== 0){
    $auteur=$_SESSION['id'];
    $GetUserMemberKey=userInfo($auteur);
    $MemberGUID=$GetUserMemberKey['MemberKey'];
        $pst_text=$_POST['texte'];
	$titre=htmlentities($_POST['title']);
	$text_html=htmlentities($_POST['texte']);
	$text=nl2br($text_html);        
	$texte="$text"; 
	$type=$_POST["type"];
	$display=1;
    
    $receiver_mail='admin1@dragonica- : HYDRA 2019.fr , admin2@outlook.fr , admin3@hotmail.com';
    $subject="Create a new ticket de $auteur: $titre";
    
	if (!empty($_POST["title"])){
		if(!empty($auteur))
		{
				Post_Support($auteur, $MemberGUID, $titre, $texte, $display, $type);
				 $_SESSION['msg_state']=4000;
				 $fp=fopen("https://api.telegram.org/bot776363739:AAEnhWbD1imoc4rvBc8fbTKXTDrW5liw8jk/sendMessage?chat_id=421269555&text=You have received a new message in the support site (https://dragonica-hydra.com). Please reply to the message. ","r");
                               /*  $MailText="<p>Bonjour,<br />
                                     Un nouveau ticket &amp;agrave; &amp;eacute;t&amp;eacute; ouvert par le membre $auteur.<br />
                                     Objet : $titre<br />
                                     Message du Ticket :<br />
                                     $pst_text
                                     </p>
<p>Support  : HYDRA 2019.</p>";
            @include('../data/MailPage.php');
            $smtp->smtp_mail($receiver_mail, $subject, $message);// Envoie du mail
            sleep(1);
            if(!$smtp->erreur){
                $mailcount++;
            }
            else{// Affichage des erreurs
            $mailcount++;
            $smtp->erreur;
            }  */
            header("location:../$lmessages");
				exit();
		}
		else{//pas d'auteur
		$_SESSION['msg_state']=2;
                header("location:../$lmessages_create");
		exit();
		}
	}
	else{//pas de titre
	$_SESSION['msg_state']=4003;
        header("location:../$lmessages_create");
	exit();
	}
}
//Repondre
elseif (strcmp ($action, "Respond")== 0){
    $auteur=$_SESSION['id'];
    $GetUserMemberKey=userInfo($auteur);
    $MemberGUID=$GetUserMemberKey['MemberKey'];
    
    $post_autor=$_SESSION['id'];
//reponse staff-joueur - $Answ_MemberGMLevel
    $GetUserAnswStaffLevel=userInfo($post_autor);
    $Answ_MemberGMLevel=$GetUserAnswStaffLevel['GMLevel'];
    
    
	$supp_id=$_POST["supp_id"];
        $pst_text=$_POST['texte'];
	$text_html=htmlentities($_POST['texte']);
	$text=nl2br($text_html);
	$texte="$text";        
	$statut=$_POST["statut"];
	$display= $_POST["display"];
        $SuppGUID= $_POST["supp_guid"];        
	$checkTicket=checkExistSupport($supp_id);
        
	if ($checkTicket[0] == 1){        
        $support_title='reponse';
        $support_select= Support_INFO($supp_id);
        $support_state=$support_select['statut'];
        $support_subject=$support_select['Objet'];
        $receiver_mail='support@dragonica- : HYDRA 2019.fr , gwen : HYDRA 2019@outlook.fr , s_y-a-h-y-a_s@hotmail.com';
        $subject="Reponse de $auteur sur le ticket: $support_subject";
        
        if ($support_state<=2){        
           
                Respond_Support($auteur, $MemberGUID, $support_title, $texte, $statut, $display, $SuppGUID);
                $_SESSION['msg_state']=4001;
                $fp=fopen("https://api.telegram.org/bot776363739:AAEnhWbD1imoc4rvBc8fbTKXTDrW5liw8jk/sendMessage?chat_id=421269555&text=You got the answer Member: {$MemberGUID} (https://dragonica-hydra.com). Please reply to the message. ","r");
                /* $MailText="<p>Bonjour,<br />
                                     $auteur  &agrave; r&eacute;pondu au ticket &quot;$support_subject&quot;. <br />
                                     Reponse :<br />
                                     $pst_text
                                     </p>
<p>Support  : HYDRA 2019.</p>";
            @include('../data/MailPage.php');
            $smtp->smtp_mail($receiver_mail, $subject, $message);// Envoie du mail
            sleep(1);
            if(!$smtp->erreur){
                $mailcount++;
            }
            else{// Affichage des erreurs
            $mailcount++;
            $smtp->erreur;
            }
              */  
                
		header("location:../$lmessages");
		exit();
        }else{//ticket fermé
                $_SESSION['msg_state']=4004;
		header("location:../$lmessages");
		exit(); 
                }
	}
	else if ($checkTicket[0] == 0){
                $_SESSION['msg_state']=4002;
		header("location:../$lmessages");
		exit();
	}
	else {echo"Nombre de news trouvées : $checkTicket";}
}
if (strcmp ($action, "Open")== 0){
    
}
}
else {echo "Aucune Demande";}
?>