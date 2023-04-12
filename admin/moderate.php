<?php
session_start();
require_once("../data/db.php");
require_once("../data/db_user.php");
require_once("../data/function.php");
require_once("../data/function_user.php");
require_once("../data/secu_gm.php");
@include('../link_map.php');
$action=$_POST["action"];
if (strcmp ($action, "ban")==0){
$gmID = $_SESSION['id'];
    $gmp_user =$_POST["user"];
	$id=$gmp_user;
    $post_unban= $_POST["Unban_Date"];
	$unban_date="$post_unban:00.000";
	$prememo=$_POST["Ban_Comment"];
	$memo ="$prememo";
	$checkUser= checkExistUser($id);
	
	if ($checkUser[0] == 1){
		$checkUserMemberKey=GetUserMemberKey($id);
		$UserMemberKey=$checkUserMemberKey['MemberID'];
		$checkUserMemberID=GetUserMemberID($UserMemberKey);
		$UserID=$checkUserMemberID['ID'];
		if (!empty($_POST["Unban_Date"])){
			if(!empty($_POST["Ban_Comment"]))
				{
				Ban_Member($UserMemberKey,$unban_date,$memo,$UserID,$gmID,$id);
				$_SESSION['userbanned']="$gmp_user";
				$unban_date=substr("$unban_date", 0, 10);
				$unban_hour=substr($_POST["Unban_Date"], 11, 16);
				$_SESSION['userunbandate']="$unban_date à $unban_hour";
				$_SESSION['banmemo']="$memo";
				$_SESSION['msg_state']=2000;
                                header("location:../$lpanel");
				exit();
				}
			else{
					$_SESSION['msg_state']=2002;
                                        header("location:../$lpanel");
					exit();
				}
			}
		else
			{
				$_SESSION['msg_state']=52;
                                header("location:../$lpanel");
				exit();
			}
	}
	else {
		$_SESSION['checkeduser']=$id;
                $_SESSION['msg_state']=2001;
                header("location:../$lpanel");
		exit();
	}
}
elseif (strcmp ($action, "unban")==0){
    $gmID = $_SESSION['id'];
    $gmp_user =$_POST["user"];
	$id=$gmp_user;
	$prememo=$_POST["UnBan_Comment"];
	$memo ="[Deban]$prememo";
	$checkUser= checkExistUser($id);
	
	if ($checkUser[0] == 1){
		$checkUserMemberKey=GetUserMemberKey($id);
		$UserMemberKey=$checkUserMemberKey['MemberID'];
		$checkUserMemberID=GetUserMemberID($UserMemberKey);
		$UserID=$checkUserMemberID['ID'];
		if (!empty($_POST["UnBan_Comment"])){
			if(!empty($_POST["UnBan_Comment"]))
				{
				UnBan_Member($UserMemberKey,$memo,$UserID,$gmID,$id);
				$_SESSION['userunbanned']="$gmp_user";
				$_SESSION['msg_state']=2003;
                                header("location:../$lpanel");
				exit();
				}
			else{
					$_SESSION['msg_state']=2002;
                                        header("location:../$lpanel");
					exit();
				}
			}
		else
			{
				$_SESSION['msg_state']=2002;
                                header("location:../$lpanel");
				exit();
			}
	}
	else {
		$_SESSION['checkeduser']=$id;
		$_SESSION['msg_state']=2001;
                header("location:../$lpanel");
		exit();
	}
}
elseif (strcmp ($action, "changename")==0){
    $gmID = $_SESSION['id'];
    $gmp_user =$_POST["current_name"];
	$id=$gmp_user;
	$oldname=$id;
	$newname=$_POST["new_name"];
	$checkUser= checkExistUser($id);
	$checkName= checkExistUser($newname);
	if (!empty($_POST["current_name"])){
	if ($checkUser[0] == 1){
		$checkUserMemberKey=GetUserMemberKey($id);
		$UserMemberKey=$checkUserMemberKey['MemberID'];//CharacterID
                $CharacterGUID=$checkUserMemberKey['CharacterID'];
		$checkUserMemberID=GetUserMemberID($UserMemberKey);
		$UserID=$checkUserMemberID['ID'];
		if (!empty($_POST["current_name"])){
			if(!empty($_POST["new_name"]))
				{
				if ($checkName[0] == 0){
				ChangeUserName($oldname,$newname);
                                PostChangeName($CharacterGUID,$newname,$oldname);
				$_SESSION['oldusername']=$oldname;
				$_SESSION['newusername']=$newname;
				$_SESSION['msg_state']=100;
                                header("location:../$lpanel");
                                exit();
				}
				else{
					$_SESSION['msg_state']=101;
                                        header("location:../$lpanel");
					exit();
				}
					
				}
			else{
                            $_SESSION['msg_state']=52;
                            header("location:../$lpanel");
                            exit();
				}
			}
		else
			{
		$_SESSION['msg_state']=52;
                header("location:../$lpanel");
		exit();
			}
	}
	else {
		$_SESSION['checkeduser']=$id;
		$_SESSION['msg_state']=2001;
                header("location:../$lpanel");
		exit();
	}
	}
	else{
		$_SESSION['msg_state']=52;
                header("location:../$lpanel");
		exit();
				}
}
elseif (strcmp ($action, "EVENT_cash")==0){
    $gmID = $_SESSION['id'];
    $gmp_member = $_POST["memberID"];
    $id=$gmp_member;
    $cash = $_POST["Event_cashA"];
    $prememo=$_POST["Event_Name"];
    $memo ="[$gmID]$prememo";
	$checkName= checkExistUser($id);
	$checkMember= checkExistMember($id);
	if (($checkMember[0] == 1)or($checkName[0] == 1)){
            if($checkMember[0] == 1){
		if(!empty($_POST["Event_Name"]))
		{
				Event_addCash($gmp_member, $cash,$memo);
				$_SESSION['msg_state']=3000;
                                header("location:../$lpanel");
                                exit();
		}
		else{
		$_SESSION['msg_state']=52;
                header("location:../$lpanel");
		exit();
		}
            }
            elseif (($checkName[0] == 1)and($checkMember[0] == 0)){
             $checkUserMemberKey=GetUserMemberKey($id);
             $UserMemberKey=$checkUserMemberKey['MemberID'];
             if(!empty($prememo))
		{
				Event_addCashGUID($UserMemberKey, $cash,$memo);
				$_SESSION['msg_state']=3000;
                                header("location:../$lpanel");
                                exit();
		}
		else{
		$_SESSION['msg_state']=52;
                header("location:../$lpanel");
		exit();
		}
            }
            else{
                $_SESSION['msg_state']=3001;
                header("location:../$lpanel");
                exit();
            }
	}        
	else
	{
	$_SESSION['msg_state']=3001;
        header("location:../$lpanel");
        exit();
	}
}
elseif (strcmp ($action, "item_send")==0){
    $gmID = $_SESSION['id'];
    $gmp_member = $_POST["character"];
    $id=$gmp_member;
    $ItemNo1 =(int)($_POST['itemno']);
    $prememo=$_POST["Event_Name"];
    $memo ="[$gmID]$prememo";
    $FromName="Dragonica Hydra";
    $MailTitle=$prememo;
    $MailText="Merci pour votre participation.";
    $Money=((int)($_POST['gold']))*10000;
    $Count=(int)($_POST['count']);
	$checkName= checkExistUser($id);
	if ($checkName[0] == 1){
            $checkUserMemberKey=GetUserMemberKey($id);
            $UserMemberKey=$checkUserMemberKey['MemberID'];//CharacterID
            $CharacterGUID=$checkUserMemberKey['CharacterID'];
            $character=CharacterInfo($CharacterGUID);
            $WA_Name=$character['Name'];
		if(!empty($_POST["Event_Name"]))
		{
				SendItem($CharacterGUID,$MailTitle,$MailText,$Money,$FromName,$ItemNo1,$Count,0,$WA_Name,$memo);
				$_SESSION['msg_state']=3000;
                                header("location:../$lpanel");
                                exit();
		
            }
            else{
                $_SESSION['msg_state']=2002;
                header("location:../$lpanel");
                exit();
            }
	}        
	else
	{
	$_SESSION['msg_state']=3001;
        header("location:../$lpanel");
        exit();
	}
}
 else {
header("location:../$lpanel");
exit();
}