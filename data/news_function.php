<?php
function News_POST($id, $title, $preview, $text, $Flink, $IMGlink, $type, $display, $slide){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[up_Post_News](?, ?, ?, ?, ?, ?, ?, ?, ?)}"); 
	$query->bindParam(1, $id);
	$query->bindParam(2, $title);
        $query->bindParam(3, $preview);
	$query->bindParam(4, $text);
	$query->bindParam(5, $Flink);
        $query->bindParam(6, $IMGlink);
	$query->bindParam(7, $type);
	$query->bindParam(8, $display);
        $query->bindParam(9, $slide);

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
function News_EDIT($news_id, $title, $preview, $text, $Flink, $IMGlink, $type, $display, $slide, $old_slide){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[up_Edit_News](?, ?, ?, ?, ?, ?, ?, ?, ?, ?)}"); 
	$query->bindParam(1, $news_id);
	$query->bindParam(2, $title);
        $query->bindParam(3, $preview);
	$query->bindParam(4, $text);
	$query->bindParam(5, $Flink);
        $query->bindParam(6, $IMGlink);
	$query->bindParam(7, $type);
	$query->bindParam(8, $display);
        $query->bindParam(9, $slide);
        $query->bindParam(10, $old_slide);

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
function News_INFO($news_id){
	global $dbh;
	$sql="SELECT *
	FROM [dbo].[TB_News] 
	WHERE  ID = :id";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':id', $news_id);

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

function checkExistNews($news_id){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[Up_CheckExistNews](?)}"); 
	$query->bindParam(1,$news_id);
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
///next News
function Next_News($news_id){
	global $dbh;
	$sql="SELECT TOP (1) id
	FROM [dbo].[TB_News]
	WHERE  ID > :id and display=1
	ORDER BY id ASC";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':id', $news_id);

	try
    {
        $stmt->execute();
        $next = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $next;
}

//Previous News
function Prev_News($news_id){
	global $dbh;
	$sql="SELECT TOP (1) id
	FROM [dbo].[TB_News]
	WHERE  ID < :id and display=1
	ORDER BY id DESC";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':id', $news_id);

	try
    {
        $stmt->execute();
        $previous = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $previous;
}
/*patch list*/
///next News
function Next_patch($news_id){
	global $dbh;
	$sql="SELECT TOP (1) id
	FROM [dbo].[TB_News]
	WHERE  ID > :id and display=1 and type=3
	ORDER BY id ASC";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':id', $news_id);

	try
    {
        $stmt->execute();
        $next = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $next;
}

//Previous News
function Prev_patch($news_id){
	global $dbh;
	$sql="SELECT TOP (1) id
	FROM [dbo].[TB_News]
	WHERE  ID < :id and display=1 and type=3
	ORDER BY id DESC";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':id', $news_id);

	try
    {
        $stmt->execute();
        $previous = $stmt->fetch();
    }
    catch( PDOException $e2)
    {
        echo $e2->getMessage();
        echo $stmt->errorCode();
        var_dump($stmt->errorInfo());
    }
	return $previous;
}
function CountAutorNews($autor){
	global $dbh;
	$sql="SELECT COUNT(Auteur) AS Autor_NewsCount FROM [dbo].[TB_News] WHERE Auteur= :aut ";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':aut', $autor);

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
function Similar_News($news_type,$count,$period){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[Up_Similar_News] (?,?,?)}"); 
	$query->bindParam(1, $news_type);
        $query->bindParam(2, $count);
        $query->bindParam(3, $period);
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

function VisitCounter($news_id){
	global $dbh;
	$query= $dbh->prepare("{CALL [dbo].[up_AddNewsVisit](?)}"); 
	$query->bindParam(1,$news_id);
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
/************/
   /* br2nl for use with HTML forms, etc. */
   function br2nl($text)
   {
 
  $text = str_replace(array("\r", "\n"), '', $text);
 
  $text = str_replace(array('<br>', '<br />'), "\n", $text);
 
  return $text;
 
}
function CalendarTranslate_English_to_French($date)
   { 
  $date = str_replace(array('January'), 'Janvier', $date);
  $date = str_replace(array('February'), 'Février', $date);
  $date = str_replace(array('March'), 'Mars', $date);
  $date = str_replace(array('April'), 'Avril', $date);
  $date = str_replace(array('May'), 'Mai', $date);
  $date = str_replace(array('June'), 'Juin', $date);
  $date = str_replace(array('July'), 'Juillet', $date);
  $date = str_replace(array('August'), 'Août', $date);
  $date = str_replace(array('September'), 'Septembre', $date);
  $date = str_replace(array('October'), 'Octobre', $date);
  $date = str_replace(array('November'), 'Novembre', $date);
  $date = str_replace(array('December'), 'Décembre', $date);
  return $date;
 
}
function date_hours($date)
   { 
  $date = str_replace(array(':'), 'h', $date);
  return $date; 
}
?>