<?php
session_start();
require_once("../data/db.php");
require_once("../data/function.php");
require_once("../data/news_function.php");
require_once("../data/secu_gm.php");
@include('../link_map.php');
if(!empty($_POST["action"])){
$action=$_POST["action"];
//NOUVELLE NEWS
if (strcmp ($action, "Post")== 0){
    $auteur=$_SESSION['id'];
	/*if (strcmp ($auteur, "Aster")== 0){$auteur="Aster";}
	 elseif (strcmp ($auteur, "Avrilouz")== 0){$auteur="Paradox";}
	 else {$auteur=$_SESSION['id'];}*/
	$titre=htmlentities($_POST['title']);
	$text_html=htmlentities($_POST['texte']);
        $pre_text_html=htmlentities($_POST['prev_texte']);
        $pre_text=nl2br($pre_text_html);
        $preview="$pre_text";
	$text=nl2br($text_html);        
	$texte="$text";        
	$Flink=$_POST["Flink"];
        $IMGlink=$_POST["IMGlink"];
	$type=$_POST["type"];
	$display= $_POST["display"];
        $slide= $_POST["slide"];
	if(empty($_POST["Flink"])){$Flink="#";}else{}
        if(empty($_POST["IMGlink"])){$IMGlink="#";}else{}
	if (!empty($_POST["title"])){
		if(!empty($auteur/*$_SESSION['id']*/))
		{
				News_POST($auteur, $titre, $preview, $texte, $Flink, $IMGlink, $type, $display, $slide);
				 $_SESSION['msg_state']=1000;
                                 header("location:../$lpanel");
				exit();
		}
		else{//pas d'auteur
		$_SESSION['msg_state']=999;
                header("location:../$lpanel");
		exit();
		}
	}
	else{//pas de titre
	$_SESSION['msg_state']=1003;
        header("location:../$lpanel");
	exit();
	}
}
//EDITION DE NEWS
elseif (strcmp ($action, "Edit")== 0){
	$news_id=$_POST["news_id"];
	$titre=htmlentities($_POST['title']);
        $pre_text_html=htmlentities($_POST['prev_texte']);
        $pre_text=nl2br($pre_text_html);
        $preview="$pre_text";
	$text_html=htmlentities($_POST['texte']);
	$text=nl2br($text_html);
	$texte="$text";
	$Flink=$_POST["Flink"];
        $IMGlink=$_POST["IMGlink"];
	$type=$_POST["type"];
	$display= $_POST["display"];
        $slide= $_POST["slide"];
        $old_slide= $_POST["old_slide"];
	$checkNews=checkExistNews($news_id);
	if ($checkNews[0] == 1){
                News_EDIT($news_id, $titre, $preview, $texte, $Flink, $IMGlink, $type, $display, $slide, $old_slide);
                $_SESSION['msg_state']=1001;
		header("location:../$lpanel?edit");
		exit();
	}
	else if ($checkNews[0] == 0){
                $_SESSION['msg_state']=1002;
		header("location:../$lpanel?edit");
		exit();
	}
	else {echo"Nombre de news trouvées : $checkNews";}
}
}
else {echo "Aucune Demande";}
?>