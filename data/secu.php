<?php
@include('link_map.php');
if (!array_key_exists('id', $_SESSION) or !array_key_exists('userkey', $_SESSION) or empty($_SESSION['id']) or empty($_SESSION['userkey'])){
	session_destroy();
        session_start();
        $_SESSION['msg_state']=2;
        $_SESSION['Ask_page']=$_SERVER['PHP_SELF'];
	header("Location:$lconnexion");
	exit();
}
else{

$key=checkMemberKey($_SESSION['id']);

if ($_SESSION['userkey']!=$key[0]){
	session_destroy();
        session_start();
        $_SESSION['msg_state']=2;
	header("Location:$lconnexion");
	exit();
}
}

?>