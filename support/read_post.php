<h2><span class="top_mainContent_f"></span></h2>
<?php
if ($support_display == 0){ header("Location:$lmessages#disp0");exit();}
else{}   
?>
<h2  class="info-blocks-text"><span><i class="fa fa-comments"></i><?php echo $sup_title; ?></span></h2>
							
							<div class="content-padding">
								<div class="forum-description">
									<div class="pagination right">
										<span class="page-num current">1</span>
									</div>
									<div class="topic-right right">
                                                                            <?php echo $ticket_state; ?>										
									</div>
                                                                        <a href="<?php echo $lmessages; ?>" class="newdefbutton margin-right"><i class="fa fa-comments"></i>Return to messages</a>
									<a href="#quick-reply" class="newdefbutton margin-right scroll"><i class="fa fa-comment-o"></i>Reply</a>
                                                                        <?php if($MemberGMLevel>8):?>
									<a href="#" class="newdefbutton margin-right admin-color"><i class="fa fa-unlock"></i>Unlock Thread</a>
									<!-- <a href="#" class="newdefbutton margin-right admin-color"><i class="fa fa-lock"></i>Close Thread</a> -->
									<a href="#" class="newdefbutton margin-right admin-color"><i class="fa fa-level-up"></i>Pin</a>
									<!-- <a href="#" class="newdefbutton margin-right admin-color"><i class="fa fa-level-down"></i>Unpin</a> -->
                                                                        <?php elseif($MemberGMLevel<8):?>
                                                                        
                                                                        <?php endif; ?>
								</div>
							</div>

<!-- BEGIN .forum-thread -->

<?php
$post_cnt=0;
$sql="SELECT *
	FROM [dbo].[TB_Support_Messages]
	WHERE  support_guid = :guid
	ORDER BY Date ASC";
	$stmt= $dbh->prepare($sql);
	$stmt->bindParam(':guid', $support_guid);
	$stmt->execute();
$requête=$stmt->execute();

while ($donnees = $stmt->fetch()){
    $post_cnt++;
    $post_autor=$donnees['Auteur'];
//reponse staff-joueur - $Answ_MemberGMLevel
    $GetUserAnswStaffLevel=userInfo($post_autor);
    $Answ_MemberGMLevel=$GetUserAnswStaffLevel['GMLevel'];
 //pseudo   
$auteur_info=StaffuserInfo($post_autor);
$auteur_pseudo=$auteur_info['Membre'];
if(!empty($auteur_pseudo)){$post_autor=$auteur_pseudo;}

//titre
    $post_titre=$donnees['Objet'];
    $title=html_entity_decode($post_titre);
//date
$post_date=$donnees['Date'];
$eng_date= date("d F Y", strtotime($post_date));
$hours_date= date("H:i", strtotime($post_date));
$translate_date=CalendarTranslate_English_to_French($eng_date);
$posted_date=$translate_date;
    
    $post_text=$donnees['Texte_news'];
    $posted_texte=html_entity_decode($post_text);
    $post_visited=$donnees['visited'];
    
    print"<!-- BEGIN .forum-post -->
	<div class='forum-post' id='post-$post_cnt'>";
                    include('support/read_user.php');
                    include('support/read_text.php');
                    include('support/read_meta.php');                    
                    print $post_user_block;                    
                    print $post_text_block;                    	
                    print $post_meta_block;
 print"<!-- END .forum-post --></div>";
    
}
//FIN
?>
    <!-- END .forum-thread -->
</div>
