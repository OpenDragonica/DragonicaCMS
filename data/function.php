<?php

function checkPassword($pwd, $pwd2) {
    $errors="";

    if (strlen($pwd) < 6) {
        $errors[] = "Password too short!";
    }

    if (!preg_match("#[0-9]+#", $pwd)) {
        $errors[] = "Password must include at least one number!";
    }

    if (!preg_match("#[a-zA-Z]+#", $pwd)) {
        $errors[] = "Password must include at least one letter!";
    }

    if ($pwd != $pwd2)
    {
    	$errors[] = "Password and Confirm password are not identical!";

    }     

    return $errors;
}

function bindMemberKey($id){
    global $dbh;
    $sql="SELECT MemberKey FROM [dbo].[Member] WHERE  ID = :id";
    $stmt= $dbh->prepare($sql);
    $stmt->bindParam(':id', $id);

    try
    {
        $stmt->execute();
        $res = $stmt->fetch();
        $_SESSION['userkey'] = $res['MemberKey'];
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
    
    return $res;
}

function checkMember($log, $mdp){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[Up_CheckPassword](?, ?)}"); 
	$query->bindParam(1, $log);
	$query->bindParam(2, $mdp);

	try
    {
        $query->execute();
        $res=$query->fetch();
        
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
    return $res;

}
function checkExistMember($id){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[Up_CheckExistMember](?)}"); 
	$query->bindParam(1, $id);
	try
    {
        $query->execute();
        $res=$query->fetch();
        
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
    return $res;

}
function checkMemberKey($id){
    global $dbh;
    $sql="SELECT MemberKey FROM [dbo].[Member] WHERE  ID = :id";
    $stmt= $dbh->prepare($sql);
    $stmt->bindParam(':id', $id);
    try
    {
        $stmt->execute(); 
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
    $res = $stmt->fetch();
    return $res;
}

function checkUsedID($id){
	global $dbh;
	$sql="SELECT ID FROM [dbo].[Member] WHERE  ID = :id";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':id', $id);

	try
    {
        $stmt->execute(); 
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
   	$res = $stmt->fetch();
	return $res;
}

function checkUsedMail($mail){
	global $dbh;
	$sql="SELECT Email FROM [dbo].[Member] WHERE  Email = :mail";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':mail', $mail);

	try
    {
        $stmt->execute();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
   	$res = $stmt->fetch();
	return $res;
}

function changePassword($log, $mdp){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[up_UpdateMemberPWByID](?, ?)}"); 
	$query->bindParam(1, $log);
	$query->bindParam(2, $mdp);

	try
    {
        $query->execute();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
}

function addCash($log, $cash){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[up_AddMemberCash](?, ?)}"); 
	$query->bindParam(1, $log);
	$query->bindParam(2, $cash);

	try
    {
        $query->execute();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
}
function Starpass_addCash($log, $cash,$code1){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[up_AddMemberCash_Starpass](?, ?, ?)}"); 
	$query->bindParam(1, $log);
	$query->bindParam(2, $cash);
	$query->bindParam(3, $code1);

	try
    {
        $query->execute();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
}

function createAccount($log, $mdp, $mail, $parrain){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[up_Web_CreateMemberAccount](0, ?, ?, 0, ?, ?, ?)}"); 
	$query->bindParam(1, $log);
	$query->bindParam(2, $mdp);
	$query->bindParam(3, date("Y-m-d"));
	$query->bindParam(4, $mail);
	$query->bindParam(5, $parrain);

	try
    {
        $query->execute();    
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
}

function userInfo($log){
	global $dbh;
	$sql="SELECT *
	FROM [dbo].[Member] 
	WHERE  ID = :id";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':id', $log);

	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $res;
}

function checkFilleuls($pid){
	global $dbh;
	$sql="SELECT COUNT(Parrain) AS Filleuls FROM [dbo].[Member] WHERE Parrain= :pid ";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':pid', $pid);

	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $res;
}
//EVENT COUPON
function GetMemberCoupon($MemberGUID){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[up_WEB_LoadMemberCoupon](?)}"); 
	$query->bindParam(1, $MemberGUID);
	try
    {
        $query->execute();
        $res=$query->fetch();
        
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
    return $res;
}

//Staff
function checkGM($gmid){
	global $dbh;
	$sql="SELECT ConnectionRealm FROM [dbo].[Member] WHERE ID= :gmid ";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':gmid', $gmid);

	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $res;
}
function StaffuserInfo($log){
	global $dbh;
	$sql="SELECT *
	FROM [dbo].[TB_Staff] 
	WHERE  ACC_ID = :id";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':id', $log);

	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $res;
}

//Paypal
function VerifIXNID($txn_id){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[Up_VerifIXNID](?)}"); 
	$query->bindParam(1, $txn_id);
	try
    {
        $query->execute();
        $res_id=$query->fetch();
        
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
    return $res_id;

}
function Paypal_addCash($id_user, $cash,$txn_id){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[up_AddMemberCash_Paypal](?, ?, ?)}"); 
	$query->bindParam(1, $id_user);
	$query->bindParam(2, $cash);
	$query->bindParam(3, $txn_id);

	try
    {
        $query->execute();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
}
//Paysafecard
function checkExistPIN($pin){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[Up_CheckExistPIN](?)}"); 
	$query->bindParam(1, $pin);
	try
    {
        $query->execute();
        $res=$query->fetch();
        
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
    return $res;

}

function Paysafecard_POST($id, $pin,$montant,$state){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[up_Post_Paysafecard](?, ?, ?, ?)}"); 
	$query->bindParam(1, $id);
	$query->bindParam(2, $pin);
	$query->bindParam(3, $montant);
	$query->bindParam(4, $state);

	try
    {
        $query->execute();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
}

//////////VOTE/////////////////
/////Infos IP
function userInfoVoteIP($ip){
	global $dbh;
	$sql="SELECT ID, IP, LastVote
	FROM [dbo].[TB_Vote] 
	WHERE  IP = :ip
	ORDER BY LastVote DESC";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':ip',$ip);

	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $res;
}
/////Infos Membre
function userInfoVote($log){
	global $dbh;
	$sql="SELECT ID, IP, LastVote
	FROM [dbo].[TB_Vote] 
	WHERE  ID = :id
	ORDER BY LastVote DESC";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':id', $log);

	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $res;
}

//Cashs
function addCashVote($user,$ip,$cash){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[up_AddMemberCash_Vote](?, ?, ?, ?)}"); 
	$query->bindParam(1, $user);
	$query->bindParam(2, $ip);
	$query->bindParam(3, date("Y-m-d H:i:s"));
	$query->bindParam(4, $cash);
	try
    {
        $query->execute();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
}
/////////////Vote End///////////
//GM Fct \\
//Cash
function Event_addCash($gmp_member, $cash,$memo){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[up_AddMemberCash_Event](?, ?, ?)}"); 
	$query->bindParam(1, $gmp_member);
	$query->bindParam(2, $cash);
	$query->bindParam(3, $memo);

	try
    {
        $query->execute();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
}
function Event_addCashGUID($MemberGUID, $cash,$memo){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[up_AddMemberCash_Event_GUID](?, ?, ?)}"); 
	$query->bindParam(1, $MemberGUID);
	$query->bindParam(2, $cash);
	$query->bindParam(3, $memo);

	try
    {
        $query->execute();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
}
//NOMBRE DE CONNECTES
function Countplayer($realm){
	global $dbh;
	$sql="SELECT COUNT(ConnectionRealm) AS ConnectedPlayers FROM [dbo].[Member] WHERE ConnectionRealm= :realm ";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':realm', $realm);

	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $res;
}
//VERSION
function GetPatchVersion($idx){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[Up_GetPatchVersion](?)}"); 
	$query->bindParam(1, $idx);
	try
    {
        $query->execute();
        $res=$query->fetch();
        
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
    return $res;
}
//BAN
function Ban_Member($UserID,$unban_date,$memo,$gmp_user,$gmID,$perso){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[up_wingm_UserBlock](?, ?, ?, ?, ?, ?)}"); 
	$query->bindParam(1, $UserID);
	$query->bindParam(2, $unban_date);
	$query->bindParam(3, $memo);
	$query->bindParam(4, $gmp_user);
	$query->bindParam(5, $gmID);
	$query->bindParam(6, $perso);

	try
    {
        $query->execute();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
}
//DEBAN
function UnBan_Member($UserID,$memo,$gmp_user,$gmID,$perso){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[up_wingm_UserUnBlock](?, ?, ?, ?, ?)}"); 
	$query->bindParam(1, $UserID);
	$query->bindParam(2, $memo);
	$query->bindParam(3, $gmp_user);
	$query->bindParam(4, $gmID);
	$query->bindParam(5, $perso);

	try
    {
        $query->execute();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
}

function GetUserMemberID($checkUserMemberKey){
	global $dbh;
	$sql="SELECT ID
	FROM [dbo].[Member] 
	WHERE  MemberKey = :key";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':key', $checkUserMemberKey);

	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $res;
}

function SendedMail($mail){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[up_MailState](?)}"); 
	$query->bindParam(1, $mail);
	try
    {
        $query->execute();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
}
function CheckSendedMail($checkMail){
	global $dbh;
	$sql="SELECT TOP(1) Statut
	FROM [dbo].[TB_Mail] 
	WHERE  Mail = :mail";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':mail', $checkMail);

	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $res;
}
function CountMail($State){
	global $dbh;
	$sql="SELECT COUNT(Statut) AS MailSended FROM [dbo].[TB_Mail] WHERE Statut= :state ";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':state', $State);

	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $res;
}

function HaveEvent($Membre,$Personnage,$Classe){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[up_Post_EVENT] (?, ?, ?)}"); 
	$query->bindParam(1, $Membre);
        $query->bindParam(2, $Personnage);
        $query->bindParam(3, $Classe);
	try    {
        $query->execute();
        $res=$query->fetch();        
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
    return $res;
}

function CheckEvent($MemberID){
	global $dbh;
	$sql="SELECT COUNT(Membre) AS Exist FROM [dbo].[TB_RivalsEvent] 
	WHERE Membre = :MemID";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':MemID', $MemberID);

	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $res;
}

//RECUPERATION
function check_Exist_ID($user){
	global $dbh;
	$sql="SELECT COUNT(ID) AS IDcount FROM [dbo].[Member] WHERE ID= :id";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':id', $user);

	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $res;
}

function check_Exist_Mail($mail){
	global $dbh;
	$sql="SELECT COUNT(Email) AS MAILcount FROM [dbo].[Member] WHERE Email= :mel";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':mel', $mail);

	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $res;
}

function check_Exist_Key($Key){
	global $dbh;
	$sql="SELECT COUNT(ChangeKey) AS KEYcount FROM [dbo].[TB_Lost] WHERE Statut='0' AND Type='Mdp' AND ChangeKey= :key";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':key', $Key);

	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $res;
}

function LostRequest($ID,$Mail,$Type){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[Up_LostRequest] (?, ?, ?)}"); 
	$query->bindParam(1, $ID);
        $query->bindParam(2, $Mail);
        $query->bindParam(3, $Type);
	try    {
        $query->execute();
        $res=$query->fetch();        
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
    return $res;
}
function check_Login_Request($Mail){
	global $dbh;
	$sql="SELECT AskDate, ChangeKey FROM [dbo].[TB_Lost] WHERE [Type]='Login' AND Mail= :mel  ";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':mel', $Mail);

	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $res;
}

function check_Mdp_Request($ID){
	global $dbh;
	$sql="SELECT AskDate, ChangeKey FROM [dbo].[TB_Lost] WHERE [Type]='Mdp' AND Membre= :id ";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':id', $ID);

	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $res;
}

function check_Key_Request($Key){
	global $dbh;
	$sql="SELECT * FROM [dbo].[TB_Lost] WHERE [Type]='Mdp' AND Statut='0' AND ChangeKey= :kies ";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':kies', $Key);

	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $res;
}
function Request_End($ID){
	global $dbh;
	$sql="UPDATE [dbo].[TB_Lost] SET [Statut] = 1 WHERE [Type]='Mdp' AND Membre= :id ";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':id', $ID);

	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $res;
}

//SUPPORT
function Post_Support($id, $MemberGUID, $Title, $Text, $display, $type){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[up_Post_Support](?, ?, ?, ?, ?, ?)}"); 
	$query->bindParam(1, $id);
	$query->bindParam(2, $MemberGUID);
        $query->bindParam(3, $Title);
	$query->bindParam(4, $Text);
	$query->bindParam(5, $display);
        $query->bindParam(6, $type);

	try
    {
        $query->execute();    
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
}

function Respond_Support($id, $MemberGUID, $Title, $Text, $statut, $display, $SuppGUID){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[up_Post_Messages_Support](?, ?, ?, ?, ?, ?, ?)}"); 
	$query->bindParam(1, $id);
	$query->bindParam(2, $MemberGUID);
        $query->bindParam(3, $Title);
	$query->bindParam(4, $Text);
	$query->bindParam(5, $statut);
        $query->bindParam(6, $display);
        $query->bindParam(7, $SuppGUID);
	try
    {
        $query->execute();    
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
}
function checkExistSupport($Support_id){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[Up_CheckExistSupport](?)}"); 
	$query->bindParam(1,$Support_id);
	try
    {
        $query->execute();
        $res=$query->fetch();
        
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
    return $res;

}
function Support_INFO($support_id){
	global $dbh;
	$sql="SELECT *
	FROM [dbo].[TB_Support] 
	WHERE  id = :id";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':id', $support_id);

	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
    $stmt->closeCursor();	
    return $res;
        
}
function Support_Messages_INFO($support_id){
	global $dbh;
	$sql="SELECT TOP(1)*
	FROM [dbo].[TB_Support_Messages] 
	WHERE  support_guid = :supp_guid
        ORDER BY Date DESC";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':supp_guid', $support_id);

	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
    $stmt->closeCursor();	
    return $res;
        
}
function CountSupportMessages($supp_guid){
	global $dbh;
	$sql="SELECT COUNT(display) AS Messages FROM [dbo].[TB_Support_Messages] WHERE support_guid= :supp_guid ";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':supp_guid', $supp_guid);

	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $res;
}
function CountMessagesAdmin($statut){
	global $dbh;
	$sql="SELECT COUNT(visited) AS Messages FROM [dbo].[TB_Support] WHERE visited= :state ";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':state', $statut);

	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $res;
}

function CountMessages($statut,$member){
	global $dbh;
	$sql="SELECT COUNT(visited) AS Messages FROM [dbo].[TB_Support] WHERE (visited>= :state) AND (Membre= :id)";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':state', $statut);
        $stmt->bindParam(':id', $member);

	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $res;
}
function Support_visited($guid,$visitstate){
	global $dbh;
	$sql="UPDATE [dbo].[TB_Support] 
	SET  [visited] = :visitstate
        WHERE [GUID]= :guid ";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':guid', $guid);
        $stmt->bindParam(':visitstate', $visitstate);
	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
    $stmt->closeCursor();	
    return $res;        
}
function Message_Support_visited($support_guid,$visitstate){
	global $dbh;
	$sql="UPDATE [dbo].[TB_Support_Messages] 
	SET  [visited] = :visitstate
        WHERE [support_guid]= :guid ";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':guid', $support_guid);
        $stmt->bindParam(':visitstate', $visitstate);
	try
    {
        $stmt->execute();
        $res = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
    $stmt->closeCursor();	
    return $res;        
}
//WebCash
function ConvertWebCash($log, $webcash,$bonus){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[up_ConvertCashWeb](?, ?, ?)}"); 
	$query->bindParam(1, $log);
	$query->bindParam(2, $webcash);
	$query->bindParam(3, $bonus);

	try
    {
        $query->execute();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
}
function WebCashProduct($log, $webcash,$product){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[up_CashWeb_BUY](?, ?, ?)}"); 
	$query->bindParam(1, $log);
	$query->bindParam(2, $webcash);
	$query->bindParam(3, $product);

	try
    {
        $query->execute();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
}

//Item Send
function SendItemNew($ToGuid,$MailTitle,$MailText,$Money,$FromName,$ItemNo,$Count,$Enchant1,$Enchant2,$Enchant3,$Enchant4){
	global $dbh2;
	$query= $dbh2->prepare("{CALL [dbo].[up_WEB_Item_Create] (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0)}"); 
	$query->bindParam(1, $ToGuid);
        $query->bindParam(2, $MailTitle);
        $query->bindParam(3, $MailText);
        $query->bindParam(4, $Money);
        $query->bindParam(5, $FromName);
        $query->bindParam(6, $ItemNo);
        $query->bindParam(7, $Count);
		$query->bindParam(8, $Enchant1);
		$query->bindParam(9, $Enchant2);
		$query->bindParam(10, $Enchant3);
		$query->bindParam(11, $Enchant4);
	try    {
        $query->execute();
        $res=$query->fetch();        
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $query->errorCode();
        var_dump($query->errorInfo());
    }
    return $res;
}

?>