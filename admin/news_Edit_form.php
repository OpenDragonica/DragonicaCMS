<?php
if (isset($_GET['news'])){
$news_select= News_INFO($_GET["news"]);
$news_id=$news_select['id'];
$news_html_title=$news_select['Titre'];
$news_title=html_entity_decode($news_html_title);
$news_pretext=$news_select['Preview'];
$news_pretexte=html_entity_decode($news_pretext);
$news_text=$news_select['Texte_news'];
$news_texte=html_entity_decode($news_text);
$news_FLink=$news_select['Forum_Link'];
$news_IMGLink=$news_select['Img_Link'];
$news_type=$news_select['type'];
$news_display=$news_select['display'];
$news_slide=$news_select['slide'];
}else{}
?>
<?php if($canedit==1):?>
<form action="admin/news_post.php" method="POST">
<table class="mcenter w615" id="EDIT_NEWS">
	<tr><th colspan="4"><h2>Editer une News</h2></th></tr>
		<TR>
                    <Td colspan="4" >Titre:<input name="title" type="text" value="<?php echo $news_title ?>" placeholder= "Titre de la News" style="width:90%;"/></td>
		</TR>
		<TR>
			<td colspan="4">Texte d'introduction:</td>
		</TR>
		<TR>
                <td colspan="4">
		<textarea rows="2" name="prev_texte" id="prev_texte"  style="width: 615px;max-width: 615px;"><?php echo $news_pretexte?></textarea>
		</td>
                </TR>
		<TR>
		<td colspan="4">
                    <textarea rows="15" name="texte" id="n_texte"  style="width: 615px;max-width: 615px;"><?php echo $news_texte?></textarea>
                <!--div class="content-padding full-reply">
								<div class="reply-box">
									<div class="reply-textarea">
										<textarea class="temp-paste-text"></textarea>
											<div class="respond-textarea">
												<div class="textarea-wrapper strike-wysiwyg-enable" rel="wys-current">
													<div class="bbcodes">
														<a class="strike-bold" href="#strike-bb"><i title="Bold" class="fa fa-bold strike-tooltip"></i></a>
														<a class="strike-italic" href="#strike-bb"><i title="Italic" class="fa fa-italic strike-tooltip"></i></a>
														<a class="strike-strike" href="#strike-bb"><i title="Strike" class="fa fa-strikethrough strike-tooltip"></i></a>
														<a class="strike-underline" href="#strike-bb"><i title="Underline" class="fa fa-underline strike-tooltip"></i></a>
														<a class="strike-link" href="#strike-bb"><i title="Hyperlink" class="fa fa-chain strike-tooltip"></i></a>
														<a class="strike-photo" href="#strike-bb"><i title="Photo" class="fa fa-picture-o strike-tooltip"></i></a>
														<a class="strike-quote" href="#strike-bb"><i title="Quote" class="fa fa-comment strike-tooltip"></i></a>
														<a class="strike-yt" href="#strike-bb"><i title="Youtube video" class="fa fa-youtube strike-tooltip"></i></a>
														<a class="strike-code" href="#strike-bb"><i title="Code" class="fa fa-code strike-tooltip"></i></a>
														<a class="right" href="#strike-bb-switch"><i title="Revelio WYSIWYG" class="fa fa-css3 strike-tooltip"></i></a>
													</div>
													<textarea name="texte">$news_texte</textarea>											
											</div>										
									</div>
								</div>
							</div>
                </div-->
		</td>
		</TR>
		<TR>
		<td><ul></ul>Afficher ?:</td>
		<td><ul></ul><input type="radio" name="display" value="1" <?php if ($news_display==1){print "checked";}else{} ?>>Oui</td>
		<td><ul></ul><input type="radio" name="display" value="0" <?php if ($news_display==0){print "checked";}else{}?>>Non</td>
		<td><ul></ul></td>
		</TR>
                <TR>
                <Td colspan="4">
                    Type:<select name="type">
                        <option value="1" <?php if ($news_type==1){print "selected";}else{} ?>>Nouveauté</option>
                        <option value="2" <?php if ($news_type==2){print "selected";}else{} ?>>Event</option>
                        <option value="3" <?php if ($news_type==3){print "selected";}else{} ?>>MAJ</option>
                        <option value="4" <?php if ($news_type==4){print "selected";}else{} ?>>Promotion</option>
                        <option value="5" <?php if ($news_type==5){print "selected";}else{} ?>>Annonce</option>
                        <option value="6" <?php if ($news_type==6){print "selected";}else{} ?>>Maintenance</option>
						<option value="7" <?php if ($news_type==7){print "selected";}else{} ?>>Mario</option>
                    </select></td>
		</TR>
                <TR>
                <Td colspan="4">
                    Slide:<select name="slide">
                        <option value="0" <?php if ($news_slide==0){print "selected";}else{} ?>>Pas dans le slide</option>
                        <option value="1" <?php if ($news_slide==1){print "selected";}else{} ?>>1</option>
                        <option value="2" <?php if ($news_slide==2){print "selected";}else{} ?>>2</option>
                        <option value="3" <?php if ($news_slide==3){print "selected";}else{} ?>>3</option>
                        <option value="4" <?php if ($news_slide==4){print "selected";}else{} ?>>4</option>
                    </select></td>
		</TR>
		<TR>
			<Td colspan="4">Lien Forum:<input name="Flink" type="text" value="<?php print "$news_FLink";?>" placeholder="Lien" style="width:90%;"/></td>
		</TR>
                <TR>
			<Td colspan="4">Lien Image:<input name="IMGlink" type="text" value="<?php print "$news_IMGLink";?>" placeholder="Si le champ est vide: image par défaut" style="width:90%;"/></td>
		</TR>
		<TR>
                    <td colspan="4" class="center"><div class="clear10"></div>
                <input type="hidden" name="news_id" value="<?php print $news_id;?>"/>
                <input type="hidden" name="old_slide" value="<?php print $news_slide;?>"/>
		<input type="hidden" name="action" value="Edit"/>
                <input type="submit" value="Envoyer"></td>
		</TR>
</table>
</form>
<div class="clear10"></div>
<center><a  href="<?php echo "$lpanel?edit" ?>"><button>Retour</button></a></center>
<?php endif; ?>
<?php if((isset($_GET['edit']))and !(isset($_GET['news']))):?>
<?php @include('admin/news_list.php');?>
<?php endif;?>