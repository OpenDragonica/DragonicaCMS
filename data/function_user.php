<?php

function checkExistUser($id){
	global $dbh2;
	$query= $dbh2->prepare("{CALL [dbo].[Up_CheckExistUser](?)}"); 
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

function GetUserMemberKey($id){
	global $dbh2;
	$sql="SELECT MemberID,CharacterID
	FROM [dbo].[TB_CharacterBasic] 
	WHERE  Name = :id";
	$stmt= $dbh2->prepare($sql);
	$stmt->bindParam(':id', $id);

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

function ChangeUserName($old,$new){
	global $dbh2;
	$sql="UPDATE [dbo].[TB_CharacterBasic]
    SET Name = :new
	WHERE  Name = :old";
	$stmt= $dbh2->prepare($sql);
	$stmt->bindParam(':new', $new);
	$stmt->bindParam(':old', $old);

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

function ChangeUserSex($id,$gender,$face,$hair){
	global $dbh2;
	$sql="UPDATE [dbo].[TB_CharacterBasic]
   SET [Gender] = :gender,
       [HairStyle] = :hair,
       [Face] = :face
	WHERE  Name = :id";
	$stmt= $dbh2->prepare($sql);
	$stmt->bindParam(':gender', $gender);
	$stmt->bindParam(':hair', $hair);
	$stmt->bindParam(':face', $face);
	$stmt->bindParam(':id', $id);

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

function CharacterInfo($char){
	global $dbh2;
	$query= $dbh2->prepare("{CALL [dbo].[up_site_GetCharacterInfoGuid] (?)}"); 
	$query->bindParam(1, $char);
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

//Stats
//--Count
function CharacterCount($class,$class2,$class3,$class4,$class5,$class6,$lvmin,$lvmax){
	global $dbh2;
	$sql="SELECT COUNT (Class) AS Number FROM [dbo].[TB_CharacterSub] WHERE (Class= :class OR Class= :class2 OR Class= :class3 OR Class= :class4 OR Class= :class5 OR Class= :class6) AND Lv > :lvmin AND LV < :lvmax";
	$stmt= $dbh2->prepare($sql);
	$stmt->bindParam(':class', $class);
	$stmt->bindParam(':class2', $class2);
	$stmt->bindParam(':class3', $class3);
	$stmt->bindParam(':class4', $class4);
	$stmt->bindParam(':class5', $class5);
	$stmt->bindParam(':class6', $class6);
	$stmt->bindParam(':lvmin', $lvmin);
	$stmt->bindParam(':lvmax', $lvmax);
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

function TotalCharacterCount($classlimit){
	global $dbh2;
	$sql="SELECT COUNT(Class) AS Number FROM [dbo].[TB_CharacterSub] 
	WHERE Class > :class 
	AND NOT Class=51 AND NOT Class=52 AND NOT Class=53 AND NOT Class=54";
	$stmt= $dbh2->prepare($sql);
	$stmt->bindParam(':class', $classlimit);

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

///NAME TEXT
function isName($text) {
    return preg_match('/^[a-zA-Z\p{Cyrillic}\d\s\-]+$/u', $text);
}
//
function CheckItemOnInv($CharID,$ItemNo,$InvType){
	global $dbh2;
	$sql="SELECT TOP(1) *
  FROM [dbo].[TB_UserItem]
  WHERE OwnerGuid= :owner
  AND InvType= :invtype
  AND ItemNo= :item
  ORDER BY Count ASC";
	$stmt= $dbh2->prepare($sql);
	$stmt->bindParam(':owner', $CharID);
        $stmt->bindParam(':invtype', $InvType);
        $stmt->bindParam(':item', $ItemNo);

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



function DeleteItem($ItemGUID){
        global $dbh2;
	$query= $dbh2->prepare("{CALL [dbo].[up_Item_Remove] (?)}"); 
	$query->bindParam(1, $ItemGUID);
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
function ReduceItem($ItemGUID){
	global $dbh2;
	$query= $dbh2->prepare("{CALL [dbo].[up_Item_Reduce] (?)}"); 
	$query->bindParam(1, $ItemGUID);
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

function SendItem($ToGuid,$MailTitle,$MailText,$Money,$FromName,$ItemNo,$Count,$type,$charname,$memo){
	global $dbh2;
	$query= $dbh2->prepare("{CALL [dbo].[up_WEB_Item_Create] (?, ?, ?, ?, ?, ?, ?, 0, 0, 0, 0, ?, ?, ?)}"); 
	$query->bindParam(1, $ToGuid);
        $query->bindParam(2, $MailTitle);
        $query->bindParam(3, $MailText);
        $query->bindParam(4, $Money);
        $query->bindParam(5, $FromName);
        $query->bindParam(6, $ItemNo);
        $query->bindParam(7, $Count);
        $query->bindParam(8, $type);
        $query->bindParam(9, $charname);
        $query->bindParam(10, $memo);
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

function PostChangeName($GUID,$NEW,$OLD){
	global $dbh2;
	$query= $dbh2->prepare("{CALL [dbo].[up_Post_ChangeName] (?, ?, ?)}"); 
	$query->bindParam(1, $GUID);
        $query->bindParam(2, $NEW);
        $query->bindParam(3, $OLD);
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
function LastChangeName($CharGUID){
	global $dbh2;
	$sql="SELECT TOP(1) * FROM [dbo].[TB_Log_ChangeName]
	WHERE CharGUID = :GUID
        ORDER BY Date DESC";
	$stmt= $dbh2->prepare($sql);
	$stmt->bindParam(':GUID', $CharGUID);
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
?>