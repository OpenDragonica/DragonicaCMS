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
                                                                                        <li><span class="defbutton profile-button disabled"><i class="fa fa-ban"></i> Your account is suspended until <?php echo $Bantime;?></span></li>
                                                                                        <?php endif;?>
										</ul>
									</div>
								</div>
								
								<div class="the-profile-navi">
									<ul class="profile-navi">
										<li><a href="<?php echo $lmoncompte; ?>"><i class="fa fa-globe"></i>My information</a></li>
										<li class="active"><a href="#"><i class="fa fa-comment"></i>My messages<span class="notif"><?php echo $lmessages_count;?></span></a></li>
										<li><a href="<?php echo $lmessages_create; ?>"><i class="fa fa-comment-o"></i>Open a ticket</a></li>
                                        <li><a href="<?php echo $lbuycash; ?>"><i class="fa fa-cart-plus"></i>Donate</a></li>
									</ul>
								</div>

							<!-- END .profile-left-side -->
							</div>

							<!-- BEGIN .profile-right-side -->
							<div class="profile-right-side">
                                                                
								<h2 class="info-blocks-text"><span>Mes messages</span></h2>

                                <div class="messages-control">
								<a href="<?php echo $lmessages_create; ?>" class="newdefbutton margin-right"><i class="fa fa-comments"></i>Create a new ticket</a>
                                </div>
								<div class="forum-threads-head">
									<strong class="thread-subject"><span>Topic</span></strong>
									<strong class="thread-replies">Replies</strong>
									<strong class="thread-last">Last message</strong>
								</div>

								<!-- BEGIN .forum-threads -->
								<div class="forum-threads">
									<?php include("support/list_block.php"); ?>
								<!-- END .forum-threads -->
								</div>
								<!-- END .content-padding -->
								</div>

							<div class="clear-float"></div>

						<!-- END .user-profile -->
						</div>
