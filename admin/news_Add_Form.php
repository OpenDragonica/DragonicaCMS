<?php if(isset($_GET['post'])):?>
<form action="admin/news_post.php" method="POST">
<table class="mcenter w615" id="ADD_NEWS">
    <tr><th colspan="4" class="center"><h2>Ajouter une News</h2></th></tr>
		<TR>
                    <Td colspan="4" >Titre:<input name="title" type="text" value="" placeholder= "Titre de la News" style="width:90%;"/></td>
		</TR>
		<TR>
			<td colspan="4">Texte d'introduction:</td>
		</TR>
                <TR>
                <td colspan="4">
		<textarea rows="2" name="prev_texte" id="prev_texte"  style="width: 615px;max-width: 615px;">Texte d'introduction</textarea>
		</td>
                </TR>
		<TR>
		<td colspan="4">
                    <textarea rows="15" name="texte" id="n_texte"  style="width: 615px;max-width: 615px;">Entrez votre texte</textarea>
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
													<textarea name="texte">Entrez votre texte</textarea>											
											</div>										
									</div>
								</div>
							</div>
                </div-->
		</td>
		</TR>
		<TR>
		<td><ul></ul>Afficher Immédiatement:</td>
		<td><ul></ul><input type="radio" name="display" value="1" checked>Oui</td>
		<td><ul></ul><input type="radio" name="display" value="0">Non</td>
		<td><ul></ul></td>
		</TR>
                <TR>
                <Td colspan="4">
                    Type:<select name="type">
                        <option value="1" selected>Nouveauté</option>
                        <option value="2">Event</option>
                        <option value="3">MAJ</option>
                        <option value="4">Promotion</option>
                        <option value="5">Annonce</option>
                        <option value="6">Maintenance</option>
						<option value="6">Mario</option>
                    </select></td>
		</TR>
                <TR>
                <Td colspan="4">
                    Slide <select name="slide">
                        <option value="0" selected>Pas dans le slide</option>
                        <option value="1">Ajouter au slider (Affiche obligatoirement la news)</option>
                    </select>
                </td>
		</TR>
		<TR>
			<Td colspan="4">Lien Forum:<input name="Flink" type="text" value="" placeholder="Lien" style="width:90%;"/></td>
		</TR>
		<TR>
			<Td colspan="4">Lien Image:<input name="IMGlink" type="text" value="" placeholder="Si le champ est vide: image par défaut" style="width:90%;"/></td>
		</TR>
		<TR>
		<td colspan="4" class="center"><div class="clear10"></div>
                    <input type="hidden" name="action" value="Post"/><input type="submit" value="Envoyer"/></td>
		</TR>
</table>
</form>
<div class="clear10"></div>
<center><a  href="<?php echo $lpanel ?>"><button>Retour</button></a></center>
<?php endif;?>