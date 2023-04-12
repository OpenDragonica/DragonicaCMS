
<?php if ($notify==100) :?>
<div id="notification">
<div class="content">
<div class ="notification_box ">
<button onclick="close_id('notification')" class="box_close">×</button>
	<div class="notification_msg">
	<?php if ($msg_session>0){
            if($msg_session==1){echo "<h1 class='notification_msg bold'>$ptitle</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>You are logged out.</p></div>";}
            if($msg_session==2){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>You are not logged in,<br/>please login to your account.</p></div></div>";}
            if($msg_session==3){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Old password is wrong, try again.</p></div>";}
            if($msg_session==4){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>The password is incorrect<br/>Try Again.</p></div>";}
            if($msg_session==5){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Please fill in all fields.</p></div>";}
            if($msg_session==6){echo "<h1 class='notification_msg bold '>Information</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Your password has been successfully changed.</p></div>";}
/**/        if($msg_session==7){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Your account has another email.</p></div>";}
/**/        if($msg_session==8){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Account not found.</p></div>";}
/**/        if($msg_session==9){echo "<h1 class='notification_msg bold '>Information</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>An email has been sent to you with your username.</p></div>";}
/**/        if($msg_session==10){/*$recover_mail=$_SESSION['recover_mail'];unset($_SESSION['recover_mail']);*/echo "<h1 class='notification_msg bold '>Information</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Recovery email sent.</p></div>";}
/**/        if($msg_session==11){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>You can not send more than 1 letter in 1 hour.</p></div>";}    
/**/        if($msg_session==12){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Overdue or nonexistent link.</p></div>";}  
            

            if($msg_session==33){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Please fill in all fields.</p></div>";}
            if($msg_session==99){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>You are not allowed to access this page.</p></div>";}
            if($msg_session==100){$useroldname=$_SESSION['oldusername'];$usernewname=$_SESSION['newusername'];echo "<h1 class='notification_msg bold '>Information</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Successful operation<br/><strong>$useroldname</strong> has been renamed <strong>$usernewname</strong></p></div>";unset($_SESSION['oldusername'],$_SESSION['newusername']);}
            if($msg_session==101){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>This name is already used.</p></div>";}
            if($msg_session==102){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Incorrect new name<br/>Rappel:<br/>Length: 3-20 characters<br/>No special characters.</p></div>";}
            if($msg_session==103){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Character not found.</p></div>";}
            if($msg_session==104){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>You must exit the game to use this feature.</p></div>";}
            if($msg_session==105){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>You changed your name</p></div>";}
            if($msg_session==106){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>You changed your sex.</p></div>";}
            if($msg_session==107){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>You can change the name or gender once in 24 hours.</p></div>";}
            if($msg_session==200){$edited_user=$_SESSION['editeduser'];$tnewsex=$_SESSION['editedgender'];echo "<h1 class='notification_msg bold error'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>$edited_user est maintenant $tnewsex.</p></div>";unset($_SESSION['editeduser'],$_SESSION['editedgender']);}           
            if($msg_session==201){echo "<h1 class='notification_msg bold error'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Your character already has this meaning.</p></div>";}
            if($msg_session==300){$edited_user=$_SESSION['editeduser'];echo "<h1 class='notification_msg bold'>Information</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>A class change scroll was mailed $edited_user<br/> 500 cash was withdrawn from your account.</p></div>";unset($_SESSION['editeduser']);}           
            if($msg_session==301){echo "<h1 class='notification_msg bold error'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>This character does not meet the requirements.<br/>Requis:<br/>Your level is 20, class change is not applicable.</p></div>";}
            if($msg_session==44){echo "<h1 class='notification_msg bold'>$ptitle</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Item sent.</p></div>";}
            //VOTE
            if($msg_session==71){echo "<h1 class='notification_msg bold'>Information</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Merci d'avoir voté</p></div>";}
            if($msg_session==72){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Vous ne pouvez pas encore voter</p></div>";}
            //EVENT
            if($msg_session==501){echo "<h1 class='notification_msg bold'>Information</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Vous avez reçu votre Cadeau en jeu!</p></div>";}
            if($msg_session==502){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Ce personnage ne réunis pas les conditions pour recevoir le cadeau.<br/>Requis:<br/>Niveau 20 , Changement de classe effectué.</p></div>";}
            if($msg_session==503){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Vous avez déja reçu le cadeau</p></div>";}
            if($msg_session==504){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Cette Fonction n'est plus disponible</p></div>";}
            //WebCash
			if($msg_session==6000){echo "<h1 class='notification_msg bold'>Information</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>You have successfully exchanged Euros!</p></div>";}
            if($msg_session==6001){echo "<h1 class='notification_msg bold '>Error</h1><div class='giveaway_warn'><p class='center'>Not enough money.</p>";}
            if($msg_session==6002){echo "<h1 class='notification_msg bold error'>Error</h1><div class='giveaway_warn'><p class='center'>Please complete all fields.</p>";}           
		   //cash
            if($msg_session==51){echo "<h1 class='notification_msg bold'>Information</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Your account has been credited.<br> Vos Dragonica Hydra Cashs : $MemberCash <img style='height:20px;' src=images/coinS.png alt=Cashs></p></div>";}
            if($msg_session==52){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Please fill in all fields.</p></div>";}
            if($msg_session==53){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Unable to contact StarPass server, please try again.</p></div>";}
            if($msg_session==54){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Code Error.</p></div>";}
            if($msg_session==55){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Count Invalide.</p></div>";}
            if($msg_session==56){echo "<h1 class='notification_msg bold'>Information</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Code PIN Transmis,<br>You will receive cash up to 24 hours maximum.</p></div>";}
            if($msg_session==57){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Code PIN déjà Transmis</p></div>";}
            if($msg_session==58){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>You do not have enough money for this operation.                                                                                                                                                                                       </p></div>";}
		    if($msg_session==75){echo "<h1 class='notification_msg bold'>Information</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>You have successfully purchased the item, check the mail in the game!</p></div>";}
            //support
            if($msg_session==4000){echo "<h1 class='notification_msg bold'>Information</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Ticket successfully opened. <br/> In the near future it will be processed by a member of the team.</p></div>";}
            if($msg_session==4001){echo "<h1 class='notification_msg bold'>Information</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Reply successfully sent.</p></div>";}
            if($msg_session==4002){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Ticket introuvable</p></div>";}
            if($msg_session==4003){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>S'il vous plaît indiquer la raison.</p></div>";}
            if($msg_session==4002){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Ticket closed.</p></div>";}
            //gm
            if($msg_session==1000){echo "<h1 class='notification_msg bold'>Information</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>News Publiée avec succès</p></div>";}
            if($msg_session==1001){echo "<h1 class='notification_msg bold'>Information</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>News Editée avec succès</p></div>";}
            if($msg_session==1002){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>News Introuvable</p></div>";}
            if($msg_session==1003){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Veuillez indiquer un titre</p></div>";}
                //ban
            if($msg_session==2000){$userbanned=$_SESSION['userbanned'];$userbantime=$_SESSION['userunbandate'];$banmemo=$_SESSION['banmemo'];echo "<h1 class='notification_msg'>Information</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Opération Réussie <br>$userbanned suspendu jusqu'au $userbantime<br>Motif:$banmemo</p></div>";unset($_SESSION['userbanned'],$_SESSION['userunbandate'],$_SESSION['banmemo']);}
            if($msg_session==2001){$checkresult=$_SESSION['checkeduser'];echo "<h1 class='notification_msg error'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Membre $checkresult inexistant</p></div>";unset($_SESSION['checkeduser']);}
            if($msg_session==2002){echo "<h1 class='notification_msg error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Indiquez un Motif</p></div>";}
            if($msg_session==2003){$userunbanned=$_SESSION['userunbanned'];echo "<h1 class='notification_msg'>Information</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Opération Réussie<br><strong>$userunbanned</strong> n'est plus suspendu</p></div>"; unset($_SESSION['userunbanned']);}
            
            if($msg_session==3000){echo "<h1 class='notification_msg bold'>Information</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Récompense envoyée !</p></div>";}
            if($msg_session==3001){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Personnage ou Compte Introuvable</p></div>";}
            $_SESSION['msg_state']=0;
            }?>
        <?php if ($register_session>0){
            if($register_session==1){echo "<h1 class='notification_msg error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Check the fields.</p></div>";}
            if($register_session==2){echo "<h1 class='notification_msg error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Captcha Incorrect.</p></div>";}
            if($register_session==3){echo "<h1 class='notification_msg error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>An error has occurred, try a different login.</p></div>";}
            if($register_session==100){echo "<h1 class='notification_msg'>Inscription</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Successful registration!</p></div>";}            
            $_SESSION['register_state']=0;
            }?>
        <?php if ($login_session>0){
            if($login_session==1){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Login Incorrects.</p></div><div id='keep_login'></div>";}
            if($login_session==2){echo "<h1 class='notification_msg bold error' style='color: #ff5353; text-shadow: 0 0 5px #ff0000;'>Error</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>You are already logged.</p></div>";}
            if($login_session==100){echo "<h1 class='notification_msg bold'>Information</h1><div class='giveaway_warn'><p class='giveaway_warn-head'>Successful Authentication!</p></div>";}
            $_SESSION['login_state']=0;
            }?>
            
        </div>
</div>
</div>
</div>
<?php endif; ?>