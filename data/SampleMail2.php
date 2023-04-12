<?php
set_time_limit(7320);
/*******************************************************************************
*
* Nom de la source :
*       Class SMTP
* Nom du fichier par défaut :
*       Version envoie simple.php
* Auteur :
*       Nuel Guillaume alias Immortal-PC
* Site Web :
*       http://immortal-pc.info/
*
*******************************************************************************/
include('./Class.SMTP.php');

// Remplissez le champs login et pass si vous avez besoin de vous identifié
// SMTP('smtp.serveur.fr', 'login', 'pass');

// SMTP sans authentification
// $smtp = new SMTP('smtp.serveur.fr');

$smtp = new SMTP('ns0.ovh.net', 'noreply@dragonica- : HYDRA 2019.fr', 'password');
$smtp->set_from('Dragonica- : HYDRA 2019.fr', 'noreply@dragonica- : HYDRA 2019.fr');
$subject="Dragonica  : HYDRA 2019, un serveur unique !";

require_once("db.php");
require_once("function.php");
$state="2";//Etas d'envois : 2 = à Envoyé / 1= Envoyé / 0 = EN attente
$mailcount=0;

$sql = "SELECT TOP(500) Mail,Membre FROM TB_Mail WHERE Statut= :state";
$stmt= $dbh->prepare($sql);
$stmt->bindParam(':state', $state);
$stmt->execute();
$requête=$stmt->execute();
?>
<html>
    <head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
        <title>Dragonica  : HYDRA 2019 - Mail Sender</title>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    </head>
    <body>
<?php


while($donnees = $stmt->fetch()/*||$mailcount<200*/){
if($mailcount<50){
$receiver_mail=$donnees['Mail'];
$checkMail=CheckSendedMail($receiver_mail);
$checkResult=$checkMail['Statut'];
if($checkResult==2){
$Player=$donnees['Membre'];
@include('PubMail.php');
@include('MailPage.php');
$smtp->smtp_mail($receiver_mail, $subject, $message);// Envoie du mail
SendedMail($receiver_mail);
$mailcount++;
sleep(10); 
if(!$smtp->erreur){
    echo "<div style='text-align:center; color:#008000;'>$receiver_mail:OK.</div>","\r\n";
}else{// Affichage des erreurs
    print "$receiver_mail:";
    echo $smtp->erreur;
}
 $CountMail=CountMail(1);
 $CountMailResult=$CountMail['MailSended'];
 print "$CountMailResult COMPTES LIVRES";

 if($mailcount>=50){
     print "$mailcount Mails envoyés la limite est atteinte !";
    $smtp->smtp_mail('admin@gmail.com', 'Mails de masses', 'La limite de mails par heure est atteinte !');
    $mailcount++;
    $_SESSION['MailCount']=$mailcount;
    header("location:./Mailresult.php");
    exit();
 }
}
else{
    print "$receiver_mail: Mail Deja expédié ou en attente (statut : $checkResult)";    
}
}
else{
    print "$mailcount Mails envoyés la limite est atteinte !";
    $smtp->smtp_mail('admin@gmail.com', 'Mails de masses', 'La limite de mails par heure est atteinte !');
    $mailcount++;
    $_SESSION['MailCount']=$mailcount;
    header("location:./Mailresult.php");
    exit();
}
}//while

print"$mailcount Mail Envoyés";
?>
    </body>
</html>