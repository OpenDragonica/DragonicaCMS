<!-- BEGIN .user-profile -->
<h2><span class="top_mainContent_f"></span></h2>
						<div class="user-profile">
							
							<div class="profile-shadow"></div>

							<!-- BEGIN .profile-left-side -->
							<div class="profile-left-side">

								<div class="the-profile-top">
									<div class="profile-user-name">
										<h1><?php echo $MemberID ?></h1>
									</div>
                                                                        <?php if(($unbandate>$now)and($MemberBlock==100)):?>
                                                                        <div class="avatar away">
                                                                        <?php else :?>
									<div class="avatar actived">
                                                                            <?php endif;?>
										<!--div class="avatar-button"><a href="#"><i class="fa fa-camera-retro"></i>Change Photo</a></div-->
										<img src="images/photos/compte_220.jpg" class="borderset" alt="" />
									</div>
									
									<div>
                                        <ul class="user-button-list">
                                            <?php if(($unbandate>$now)and($MemberBlock==100)):?>
                                            <li><span class="defbutton profile-button disabled"><i class="fa fa-ban"></i> Votre compte est suspendu jusqu'au <?php echo $Bantime;?></span></li>
                                            <?php endif;?>
										</ul>
									</div>
								</div>
								
								<div class="the-profile-navi">
									<ul class="profile-navi">
										<li><a href="<?php echo $lmoncompte; ?>"><i class="fa fa-globe"></i>My information</a></li>
										<li><a href="#"><i class="fa fa-comment"></i>My messages<span class="notif"><?php echo $lmessages_count;?></span></a></li>
										<li class="active"><a href="<?php echo $lmessages_create; ?>"><i class="fa fa-comment-o"></i>Open a ticket</a></li>
                                        <li><a href="<?php echo $lbuycash; ?>"><i class="fa fa-cart-plus"></i>Donate</a></li>
									</ul>
								</div>

							<!-- END .profile-left-side -->
							</div>

							<!-- BEGIN .profile-right-side -->
							<div class="profile-right-side">

						<h2 class="info-blocks-text"><span>New Ticket</span></h2>
						<div class="content-padding">
							<div class="messages-control">
								<a href="<?php echo $lmessages; ?>" class="newdefbutton margin-right"><i class="fa fa-comments"></i>Back to messages</a>
							</div>

						</div>

						<!-- BEGIN .conversation-container -->
						<div class="conversation-container">

							<form action="support/support_post.php" method="POST">
								<div class="conversation-start-new-block">
									<h3>Select request category</h3>
									<div class="conv-recipent">										                                                                             
										<select name="type" class="select-opt">
                                        <option class="select-opt" value="1">Players</option>
					                    <option class="select-opt" value="2">Server</option>
					                    <option class="select-opt" value="3">Site</option>
					                    <option class="select-opt" value="4">Other</option>
                                        </select>
									</div>
                                    <h3>Description</h3>
                                    <input type="text" id="Text_Support" name="title"/>
									<h3>Message</h3>
								</div>
                                <div class="content-padding full-reply">
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
													<textarea name="texte">Enter your message</textarea>											
											</div>										
									</div>
								</div>
							</div>
                </div>
								<div class="conv-submit start-new">                                                                        
									<div class="conv-textarea">										
										<div class="conv-bottom">
                                            <input type="hidden" name="action" value="Post"/>
											<input type="submit" value="Send" id="Sumbit_Support" class="send-conv-button" />
										</div>
									</div>
								</div>
							</form>

						<!-- END .conversation-container -->
						</div>
							<!-- END .profile-right-side -->
							</div>

							<div class="clear-float"></div>

						<!-- END .user-profile -->
						</div>
