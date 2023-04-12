<?php

$similar_id=$news_type;

$similar_count=3;
$query= $dbh->prepare("{CALL [dbo].[Up_Similar_News] (?,?,?)}"); 
	$query->bindParam(1, $similar_id);
        $query->bindParam(2, $similar_count);
        $query->bindParam(3, $similar_date);
        $query->execute();
while ($similar= $query->fetch()):
// Ouverture de la boucle NEWS 
$similar_id=$similar['id'];
$similar_Title=html_entity_decode($similar['Titre']);
$similar_prev=html_entity_decode($similar['Preview']);
$similar_preview=str_replace("<br />", " ", $similar_prev);
$similar_img=$similar['Img_Link'];
$similar_link=$lactu."?news=".$similar_id;
$similar_comment=$similar['Forum_Link'];

print"<li>
												<a href='$similar_link'>
													<strong>$similar_Title</strong>
													<span class='a-txt'></span>
												</a>
											</li>";
    
    
    
endwhile;


