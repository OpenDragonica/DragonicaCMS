<?php

if (!array_key_exists('id', $_SESSION) or !array_key_exists('userkey', $_SESSION) or empty($_SESSION['id']) or empty($_SESSION['userkey'])){
	session_destroy();
	session_start();
        $_SESSION['msg_state']=99;
	header("Location:$lindex");
	exit();
}
else{

$key=checkMemberKey($_SESSION['id']);
$gm=$_SESSION['id'];
$user= userInfo($_SESSION['id']);
$gmlevel=$user['GMLevel'];

if ($_SESSION['userkey']!=$key[0]){
	session_destroy();
	session_start();
        $_SESSION['msg_state']=99;
	header("Location:$lindex");
	exit();
}
if ($gmlevel<9){
	session_destroy();
	session_start();
        $_SESSION['msg_state']=99;
	header("Location:$lindex");
	exit();
}
}

?>