<?php

function LoadOnlineStatics($StartDate,$EndDate){
	global $dbh3;
	$sql="SELECT *
  FROM [dbo].[tbl_StaticsOnline]
  WHERE  (f_date >= CONVERT(DATETIME, ':start')) AND (f_date <= CONVERT(DATETIME, ':end'))
  ORDER BY idx ASC";
	$stmt= $dbh3->prepare($sql);
	$stmt->bindParam(':start', $StartDate);
        $stmt->bindParam(':end', $EndDate);
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

function CountOnlineStatics($idx){
	global $dbh3;
	$sql="SELECT COUNT(*)as lines
  FROM [dbo].[tbl_StaticsOnline]
  WHERE  (idx >= :start)";
	$stmt= $dbh3->prepare($sql);
	$stmt->bindParam(':start', $idx);
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