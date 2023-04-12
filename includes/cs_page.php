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
										<li><a href="<?php echo $lmessages; ?>"><i class="fa fa-comment"></i>My messages<span class="notif"><?php echo $lmessages_count;?></span></a></li>
										<li><a href="<?php echo $lmoncompte;?>#my_chars" onclick="char_edit()"><i class="fa fa-users"></i>Characters</a></li>
                                        <li class="active"><a href="#"><i class="fa fa-cart-plus"></i>DONATE</a></li>
									</ul>
								</div>

							<!-- END .profile-left-side -->
						</div>
						</div>

							<!-- BEGIN .profile-right-side -->
						<div class="profile-right-side">

								<h2 class="info-blocks-text"><span>Recharger</span></h2>
								<!-- BEGIN .content-padding -->
								
								<div class="content-padding">
								<div class="user-profile-wrapper"></div>
									<!-- BEGIN .info-blocks -->									
									<div>
                                                                            <p class="mcenter suggest">Any your purchase is credited instantly, everything is done for your convenience!.</p>
                                                                                <div  style="width:100%;">
											<h2 class="info-blocks-text"><span>Paypal</span></h2>
                                                                                        <div class="accordion">
                                                                                            <div class="accordion-tab">
                                                                                            <a href="#"><img src="images/paypal.png" title="pp" alt="pp"></a>
                                                                                            <div class="accordion-block">
												<?php @include('includes/paypal.php'); ?>
                                                                                            </div>
                                                                                            </div>
                                                                                        </div>  
											<div class="clear-float"></div>
										</div>
 
									</div>
	
								<!-- END .content-padding -->
								</div>
							<!-- END .profile-right-side -->
							</div>
							

							<div class="clear-float"></div>

						<!-- END .user-profile -->
						</div>
                                                </div>