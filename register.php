<?php
session_start();
require_once("data/db.php");
require_once("data/function.php");
@include('link_map.php');


    $login = $_POST["signup_username"];
    $mdp = $_POST['signup_password'];
    $mdp2 = $_POST['signup_password_r'];
    $mail = $_POST['signup_email'];
    $parrain =(int)($_POST['parrain']);
    $regles = $_POST["signup_rules"];
    $verifId= checkUsedId($login);
    $verifMail= checkUsedMail($mail);

    if(!ctype_alnum($login) || $verifId==$login || empty($regles) || empty($login) || empty($mdp) || checkPassword($mdp, $mdp2)!="" || empty($mail) || $verifMail==$mail || !filter_var($mail, FILTER_VALIDATE_EMAIL)){
    	$_SESSION['register_state']=1;
        header("Location:$linscription");
        exit();
    }


    else{
		$id = $_POST["signup_username"];
		$already_used = checkExistMember($id);

    if ($already_used[0] == 1)
		{
                $_SESSION['register_state']=3;
                header("Location:$linscription");
                exit();
        exit();
		}
	else{
        createAccount($login, $mdp, $mail, $parrain);
		$fp=fopen("https://api.telegram.org/bot776363739:AAEnhWbD1imoc4rvBc8fbTKXTDrW5liw8jk/sendMessage?chat_id=421269555&text=Create new account {$login} , {$mail} on the site (https://dragonica-hydra.com). ","r");
        $_SESSION['register_state']=100;
        header("Location:$linscription");
        exit();
		}
		
   
    

  }
?>