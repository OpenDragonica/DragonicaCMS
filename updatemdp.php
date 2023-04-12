<?php
    session_start();
require_once("data/db.php");
require_once("data/function.php");
require_once("data/secu.php");
    @include('link_map.php');

    $mdp = $_POST['pass'];
    $mdp2 = $_POST['pass2'];

    $login = $_SESSION['id'];
    $oldmdp = $_POST["oldpass"];

    $success = checkMember($login, $oldmdp);
    var_dump($success);

    if ($success[0] == 0)
    {
      $_SESSION['msg_state']=3;
      header("location:$lmoncompte#my_passF");
      exit();
    }

    if(checkPassword($mdp, $mdp2)!=""){
      var_dump(checkPassword($mdp, $mdp2));
      var_dump($mdp);
      var_dump($mdp2);
      $_SESSION['msg_state']=4;
      header("location:$lmoncompte#my_passF");
      exit();
    }

    elseif(empty($mdp) || empty($mdp2)){
      $_SESSION['msg_state']=5;
      header("location:$lmoncompte#my_passF");
      exit();
    }

    else{
      changePassword($_SESSION['id'], $mdp);
      $_SESSION['msg_state']=6;
      header("location:$lmoncompte");
      exit();
    }

?>