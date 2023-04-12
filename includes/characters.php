<?php
$sql="SELECT CharacterID
	FROM [dbo].[TB_CharacterBasic]
	WHERE  MemberID = :id AND NOT Name='__D__'
	ORDER BY BirthDate ASC";
	$stmt= $dbh2->prepare($sql);
	$stmt->bindParam(':id', $MemberKey);
	$stmt->execute();
$requête=$stmt->execute();
$charNo=0;

while ($donnees = $stmt->fetch()){
$changeclass_state=0;
$charID=$donnees['CharacterID'];
$character= CharacterInfo($charID);
$chname=$character['Name'];
$chsex=$character['Sex'];
$chlvl=$character['Level'];
$chjob=$character['Job'];
$chemblem=($character['Emblem']+1);
$chguild=$character['GuildName'];
$chMap=$character['Map'];
$chVict=$character['Win_pvp'];
$chDraw=$character['Draw_Pvp'];
$chLose=$character['Lose_Pvp'];
if($chlvl>=20 and ($chjob<5 or $chjob==51 or $chjob==52 )){$changeclass_state=100;}
include('includes/maps.php');
//ID classes vers Branches
$classno=$chjob;
    $charNo++;
    $charTotalCount=$charNo;
    if($charNo==1){$_SESSION['char1GUID']=$charID;$char1name=$chname;$_SESSION['char1Sex']=$chsex;$char1Class=$classno;$char1Emblem=$chemblem;$char1guild=$chguild;$char1Count=$charNo;$char1map=$chMap;$char1W=$chVict;$char1D=$chDraw;$char1L=$chLose;$ch1Lvl=$chlvl;/*$char1_changeclass/*=$changeclass_state;/*include("includes/classnames.php");$char1ClassName=$className;*/}
    elseif($charNo==2){$_SESSION['char2GUID']=$charID;$char2name=$chname;$_SESSION['char2Sex']=$chsex;$char2Class=$classno;$char2Emblem=$chemblem;$char2guild=$chguild;$char2Count=$charNo;$char2map=$chMap;$char2W=$chVict;$char2D=$chDraw;$char2L=$chLose;$ch2Lvl=$chlvl;/*$char2_changeclass/*=$changeclass_state;/*include("includes/classnames.php");$char2ClassName=$className;*/}
    elseif($charNo==3){$_SESSION['char3GUID']=$charID;$char3name=$chname;$_SESSION['char3Sex']=$chsex;$char3Class=$classno;$char3Emblem=$chemblem;$char3guild=$chguild;$char3Count=$charNo;$char3map=$chMap;$char3W=$chVict;$char3D=$chDraw;$char3L=$chLose;$ch3Lvl=$chlvl;/*$char3_changeclass/*=$changeclass_state;/*include("includes/classnames.php");$char3ClassName=$className;*/}
    elseif($charNo==4){$_SESSION['char4GUID']=$charID;$char4name=$chname;$_SESSION['char4Sex']=$chsex;$char4Class=$classno;$char4Emblem=$chemblem;$char4guild=$chguild;$char4Count=$charNo;$char4map=$chMap;$char4W=$chVict;$char4D=$chDraw;$char4L=$chLose;$ch4Lvl=$chlvl;/*$char4_changeclass/*=$changeclass_state;/*include("includes/classnames.php");$char4ClassName=$className;*/}
    elseif($charNo==5){$_SESSION['char5GUID']=$charID;$char5name=$chname;$_SESSION['char5Sex']=$chsex;$char5Class=$classno;$char5Emblem=$chemblem;$char5guild=$chguild;$char5Count=$charNo;$char5map=$chMap;$char5W=$chVict;$char5D=$chDraw;$char5L=$chLose;$ch5Lvl=$chlvl;/*$char5_changeclass/*=$changeclass_state;/*include("includes/classnames.php");$char5ClassName=$className;*/}
    elseif($charNo==6){$_SESSION['char6GUID']=$charID;$char6name=$chname;$_SESSION['char6Sex']=$chsex;$char6Class=$classno;$char6Emblem=$chemblem;$char6guild=$chguild;$char6Count=$charNo;$char6map=$chMap;$char6W=$chVict;$char6D=$chDraw;$char6L=$chLose;$ch6Lvl=$chlvl;/*$char6_changeclass/*=$changeclass_state;/*include("includes/classnames.php");$char6ClassName=$className;*/}
    elseif($charNo==7){$_SESSION['char7GUID']=$charID;$char7name=$chname;$_SESSION['char7Sex']=$chsex;$char7Class=$classno;$char7Emblem=$chemblem;$char7guild=$chguild;$char7Count=$charNo;$char7map=$chMap;$char7W=$chVict;$char7D=$chDraw;$char7L=$chLose;$ch7Lvl=$chlvl;/*$char7_changeclass/*=$changeclass_state;/*include("includes/classnames.php");$char7ClassName=$className;*/}
    elseif($charNo==8){$_SESSION['char8GUID']=$charID;$char8name=$chname;$_SESSION['char8Sex']=$chsex;$char8Class=$classno;$char8Emblem=$chemblem;$char8guild=$chguild;$char8Count=$charNo;$char8map=$chMap;$char8W=$chVict;$char8D=$chDraw;$char8L=$chLose;$ch8Lvl=$chlvl;/*$char8_changeclass/*=$changeclass_state;/*include("includes/classnames.php");$char8ClassName=$className;*/}

    }
?>
