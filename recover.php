<?php
    session_start();
    date_default_timezone_set('Europe/Paris');
    require_once("data/db.php");
    require_once("data/function.php");    
    require_once("data/Class.SMTP.php");
    $smtp = new SMTP('ns0.ovh.net', 'noreply@dragonica- : HYDRA 2019.fr', 'Freebox78500');
    $smtp->set_from('Dragonica- : HYDRA 2019.fr', 'noreply@dragonica- : HYDRA 2019.fr');
    @include('link_map.php');

$action=$_POST["recovery"];
$user=$_POST["user"];
$mail=$_POST["mail"];
$Key=$_POST['Key'];
$checkKey=check_Exist_Key($Key);
if($checkKey['KEYcount']>=1){
$action="recovery";
}/*else{
     $_SESSION['msg_state']=12;
     header("location:$lrecovery");    
    }*/


$checkID=check_Exist_ID($user);
$checkMail=check_Exist_Mail($mail);
$mailcount=0;
//Valeurs temps
//Fuseau Horaire
$elapsed = '7200';
$time_now = time();

//LOGIN
if (strcmp ($action, "Login")==0){
   require_once('data/autoload.php');
$gRecaptchaResponse=$_POST['g-recaptcha-response'];
$secret="6LcSTB4UAAAAADgHnSJ56Hc_ectyag5yPxvjEgqj";
$recaptcha = new \ReCaptcha\ReCaptcha($secret);
$resp = $recaptcha->verify($gRecaptchaResponse);

     if (!($resp->isSuccess())){
    // What happens when the CAPTCHA was entered incorrectly
    $_SESSION['register_state']=2;
    header("Location:$lrecovery");
    exit();
  }
  else{   
    if($checkMail['MAILcount'] >= 1){
        //verifie si le temps est ecoulé   
        $Login_Request=check_Login_Request($mail);
        $check_Login_Request=$Login_Request['AskDate'];
        $Last_Login_Request= strtotime($check_Login_Request);
        $Elapsed_Login_Check=$elapsed+$Last_Login_Request;
        if($time_now>$Elapsed_Login_Check){
        //
        $sql = "SELECT Email,ID FROM Member WHERE Email= :mel";
        $stmt= $dbh->prepare($sql);
        $stmt->bindParam(':mel', $mail);
        $stmt->execute();
        $requête=$stmt->execute();
        while($donnees = $stmt->fetch()){
            $receiver_mail=$donnees['Email'];
            $Player=$donnees['ID'];
            $subject="Rappel Identifiants";
            if($mailcount>=1){$mailcount_num=$mailcount+1;$subject="Rappel Identifiants ($mailcount_num)";}
            $MailText="<p>Bonjour,<br />
            Voici l&rsquo;Identifiant de votre compte: $Player<br /></p>
            <p>Cordialement,<br />
            L&rsquo;equipe  : HYDRA 2019</p>";
            @include('data/MailPage.php');
            $smtp->smtp_mail($receiver_mail, $subject, $message);// Envoie du mail
            sleep(2);
            $_SESSION['recover_mail']="$receiver_mail";
            if(!$smtp->erreur){
                $mailcount++;
            }
            else{// Affichage des erreurs
            $mailcount++;
            $smtp->erreur;
            }
        }//end while
        LostRequest($Player,$receiver_mail,'Login');
        $_SESSION['msg_state']=9;
        header("location:$lrecovery");
        }       
        else{//temps non ecoulé
        $_SESSION['msg_state']=11;
        header("location:$lrecovery");
        }
    }
    else{//MAIL INEXISTANT
        $_SESSION['msg_state']=7;
        header("location:$lrecovery");
    }
  }
}

//MDP
elseif (strcmp ($action, "Mdp")==0){ 
    if($checkID['IDcount'] >= 1){
        //verifie si le temps est ecoulé   
        $Mdp_Request=check_Mdp_Request($user);
        $check_Mdp_Request=$Mdp_Request['AskDate'];
        $Last_Mdp_Request= strtotime($check_Mdp_Request);
        $Elapsed_Mdp_Check=$elapsed+$Last_Mdp_Request;
        if($time_now>$Elapsed_Mdp_Check){
        //
        $sql = "SELECT Email,ID FROM Member WHERE ID= :id";
        $stmt= $dbh->prepare($sql);
        $stmt->bindParam(':id', $user);
        $stmt->execute();
        $requête=$stmt->execute();
        while($donnees = $stmt->fetch()){
            $receiver_mail=$donnees['Email'];
            $Player=$donnees['ID'];
            LostRequest($Player,$receiver_mail,'Mdp');
            $Ask_InfoR=check_Mdp_Request($Player);
            $Ask_Key=$Ask_InfoR['ChangeKey'];
            $RENEW_LINK='https://' . $_SERVER['HTTP_HOST'] .'/'. $lrecovery.'?Key='.$Ask_Key;
            $subject="Renouvellement de Mot de Passe";
            $MailText="<p>Bonjour $Player,<br />
            <p>Vous avez fait une demande pour obtenir votre Mot de passe. Pour proc&eacute;der au renouvellement veuillez vous rendre sur ce Lien:<br />
            <br /><a href='$RENEW_LINK'>$RENEW_LINK</a><br />
            <br />Ce Lien est valable pendant 1 heure, une fois ce d&eacute;lais d&eacute;pass&eacute; vous devez refaire une demande.<br />
            Si vous n&rsquo;&ecirc;tes pas &agrave; l&rsquo;origine de cette demande veuillez ignorer ce message.</p>
            <p>Cordialement,<br />L&rsquo;&Eacute;quipe  : HYDRA 2019.</p>";
            @include('data/MailPage.php');
            $smtp->smtp_mail($receiver_mail, $subject, $message);// Envoie du mail
            sleep(2);
            if(!$smtp->erreur){
            }
            else{// Affichage des erreurs
            $_SESSION['Mail_state1']=$smtp->erreur;
            }
        }//end while        
        $_SESSION['recover_mail']=$receiver_mail;
        $_SESSION['msg_state']=9;
        header("location:$lrecovery");    
        }else{//temps non ecoulé
        $_SESSION['msg_state']=11;
        header("location:$lrecovery");
        }        
    }
    else{//ID INEXISTANT
        $_SESSION['msg_state']=8;
        header("location:$lrecovery");
    }     
}

elseif (strcmp ($action, "recovery")==0){
    if($checkKey['KEYcount'] >= 1){
    //verifie si le temps est ecoulé   
        $Key_Check1=check_Key_Request($Key);
        $Key_Check=$Key_Check1['ChangeKey'];
        $Key_Time=$Key_Check1['AskDate'];        
        $RemKey_Time= strtotime($Key_Time);
        $Remain_Key_Time=$RemKey_Time+3600;
        if($time_now<$Remain_Key_Time){
        //
        $login=$Key_Check1['Membre'];
        $mdp = $_POST['pass'];
        $mdp2 = $_POST['pass2'];
            if(!(checkPassword($mdp, $mdp2)!="")){
                if(!(empty($mdp) || empty($mdp2))){
                changePassword($login, $mdp);
                Request_End($login);
                $_SESSION['msg_state']=6;
                header("location:$lrecovery");
                exit();
                }else{//CHAMPS VIDE
                  $_SESSION['msg_state']=5;
                  header("location:$lrecovery$lrecovery?Key=$Key");
                  exit();  
                }
      
        }
        else{//MDP DIFFERENTS
         var_dump(checkPassword($mdp, $mdp2));
         var_dump($mdp);
         var_dump($mdp2);
         $_SESSION['msg_state']=4;
         header("location:$lrecovery?Key=$Key");
         exit();   
        }
            
        }else{//temps ecoulé            
            /*print "$Remain_Key_Time - Remain_Key_Time<br />";
            print "$Key_Time - Key_Time<br />";
            print "$time_now - time_now<br />";*/
        $_SESSION['msg_state']=12;
        header("location:$lrecovery");        
        }
    }else{//CLE INEXISTANTE
        $_SESSION['msg_state']=12;
        header("location:$lrecovery");        
    }        
}

?>