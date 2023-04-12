<div class="forum-block">
                                    <?php include("support/read_post.php"); ?>
    <?php if(!($support_state==3)):?>
							<div class="content-padding quick-reply" id="quick-reply">
								<div class="forum-description">
									<a href="#quick-reply" class="newdefbutton"><i class="fa fa-comment-o"></i>Reply</a>
								</div>
                                                            
								<div class="reply-box">
									<div class="comment-avatar left">
										<a href="#" class="avatar big">
                                                                                    <?php if($MemberGMLevel>8):?>
											<span class="wrapimg"><img src="https://scontent.fdnk2-1.fna.fbcdn.net/v/t1.0-1/46521041_509937349486881_396560248904613888_n.png?_nc_cat=107&_nc_ht=scontent.fdnk2-1.fna&oh=ddc052271dba1b2505e51de4ff999668&oe=5CB3DF61" class="setborder" title="" alt=""></span>
                                                                                    <?php elseif($MemberGMLevel<8):?>
                                                                                        <span class="wrapimg"><img src="images/photos/compte_220.jpg" class="setborder" title="" alt=""></span>
                                                                                     <?php endif; ?>
										</a>
									</div>
                                                                    
									<div class="reply-textarea">
										<form action="support/support_post.php" method="POST">
											<div class="respond-textarea">
												<div class="textarea-arrow"></div>
												<div class="textarea-wrapper strike-wysiwyg-enable" rel="wys-current">
													<div class="bbcodes">
														<a href="#strike-bb" class="strike-bold"><i class="fa fa-bold strike-tooltip" title="Bold"></i></a>
														<a href="#strike-bb" class="strike-italic"><i class="fa fa-italic strike-tooltip" title="Italic"></i></a>
														<a href="#strike-bb" class="strike-strike"><i class="fa fa-strikethrough strike-tooltip" title="Strike"></i></a>
														<a href="#strike-bb" class="strike-underline"><i class="fa fa-underline strike-tooltip" title="Underline"></i></a>
														<a href="#strike-bb" class="strike-link"><i class="fa fa-chain strike-tooltip" title="Hyperlink"></i></a>
														<a href="#strike-bb" class="strike-photo"><i class="fa fa-picture-o strike-tooltip" title="Photo"></i></a>
														<a href="#strike-bb" class="strike-quote"><i class="fa fa-comment strike-tooltip" title="Quote"></i></a>
														<a href="#strike-bb" class="strike-yt"><i class="fa fa-youtube strike-tooltip" title="Youtube video"></i></a>
														<a href="#strike-bb" class="strike-code"><i class="fa fa-code strike-tooltip" title="Code"></i></a>
														<a href="#strike-bb-switch" class="right"><i class="fa fa-css3 strike-tooltip" title="Revelio WYSIWYG"></i></a>
													</div>
													<textarea name="texte">Reply</textarea>
												</div>
											</div>
											<div class="respond-submit">
                                                                                                <?php if($MemberGMLevel>8):?>
                                                                            Action:<select name="statut" class="select-opt">
                                                                                    <option class="select-opt" value="1">En attente</option>
                                                                                    <option class="select-opt" value="2" selected>Reply</option>
					                                            <option class="select-opt" value="3">Clore</option>
                                                                            </select>
                                                                            Archiver (Irreversible):<select name="display" class="select-opt">
                                                                                    <option class="select-opt" value="1" selected>Non</option>
                                                                                    <option class="select-opt" value="0" >Oui</option>
                                                                            </select>
                                                                                                <?php elseif($MemberGMLevel<8):?>
                                                                                        <input type="hidden" name="statut" value="1"/>
                                                                                        <input type="hidden" name="display" value="1"/>
                                                                                                <?php endif; ?>
                                                                                                <input type="hidden" name="supp_id" value="<?php echo $supp_id ?>"/>
                                                                                                <input type="hidden" name="supp_guid" value="<?php echo $support_guid ?>"/>
                                                                                                <input type="hidden" name="action" value="Respond"/>
												<input type="submit" name="send" value="Envoyer">
											</div>
										</form>
									</div>
								</div>
							</div>
                                                        <?php elseif(($support_state==3)):?>
                                                        <center><span class='newdefbutton margin-right admin-color'><i class='fa fa-lock'></i>Ticket Fermé</span></center>
							<?php endif;?>
							<div class="content-padding">
								<div class="forum-description">
									<a href="<?php echo $lmessages; ?>" class="newdefbutton margin-right"><i class="fa fa-comments"></i>Return to messages</a>
								</div>
							</div>

						</div>