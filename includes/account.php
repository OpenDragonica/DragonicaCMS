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
										<li class="active"><a href="#my_acinfo"><i class="fa fa-globe"></i>My Information</a></li>
										<li><a href="<?php echo $lmessages; ?>"><i class="fa fa-comment"></i>My Messages<span class="notif"><?php echo $lmessages_count;?></span></a></li>
										<li><a href="#my_chars" onclick="char_edit()"><i class="fa fa-users"></i>Characters</a></li>
                                        <li><a href="<?php echo $lbuycash; ?>"><i class="fa fa-cart-plus"></i>Donate</a></li>
									</ul>
								</div>

							<!-- END .profile-left-side -->
							</div>

							<!-- BEGIN .profile-right-side -->
							

						<!-- END .user-profile -->
						</div>
						<div class="profile-right-side">

								
								<!-- BEGIN .content-padding -->
								<div class="content-padding">
								<div class="user-profile-wrapper"></div>
								<h2 class="info-blocks-text"><span>Mon Compte</span></h2>
									<!-- BEGIN .info-blocks -->									
									<div class="info-blocks">
										<ul>
											<li><span class="info-block"><b><?php echo $Filleuls; ?></b><span>Referrals</span></span></li>
                                                                                        <li><span class="info-block"><b><?php echo $charNo; ?></b><span>Characters</span></span></li>
											<li><a href="<?php echo $lbuycash ?>" class="info-block"><b><?php echo $MemberCash ?></b><span>Cash</span></a></li>
											<li><a href="#" class="info-block"><b><?php echo $user_WebCash ?></b><span>Euro</span></a></li>
											<li><a href="#" class="info-block" style="color: #90ffa4;"><b style="color: #90ffa4;"><?php echo $user_HCash ?></b><span>HCoin</span></a></li>
										</ul>
										<div class="clear-float"></div>
									<!-- END .info-blocks -->
									</div>
									<div>
										<div id="my_acinfo" style="width:100%;">
											<h2 class="info-blocks-text"><span>My Information</span></h2>
											
											<ul class="profile-info">
												<li>
													<span class="first">Login:</span>
													<span class="last"><?php echo $MemberID ?></span>
												</li>
												<li>
													<span class="first">E-Mail:</span>
													<span class="last"><?php echo $MemberMail?></span>
												</li>
												<li>
													<span class="first">Cash:</span>
													<span class="last"><?php echo $MemberCash ?> <img src="images/coins.png" title="Cashs" alt="Cashs" style="width:16px;"></span>
												</li>
												<li>
													<span class="first">Euro:</span>
													<span class="last"><?php echo $user_WebCash ?> <img src="images/coins.png" title="Cashs" alt="Cashs" style="width:16px;"></span>
												</li>
												<li>
													<span class="first">Register Date</span>
													<span class="last"><?php echo $MemberJoinDate ?></span>
												</li>
												<li>
													<span class="first">Referrals Link:</span>
                                                    <span class="last"><a href="<?php echo $MemberParrainLink ?>"><?php echo $MemberParrainLink ?></a></span>
												</li>
											</ul>

											<div class="clear-float"></div>
										</div>
									</div>
									<div>
										<center>
                                                                                    <a href="<?php echo $lbuycash ?>" class="defbutton"><i class="fa fa-cart-plus"></i>Donate</a><a href="#my_Coupons" class="defbutton" onclick="disp_coupon()"><i class="fa fa-cart-plus"></i>Change Euro > Cash</a><a href="#my_passF" class="defbutton" onclick="pass_edit()"><i class="fa fa-wrench"></i>Change password</a>
										<a href="<?php echo $lmessages ?>" class="defbutton"><i class="fa fa-comment"></i>Mes messages</a><a href="<?php echo $llogout ?>" class="defbutton disabled red"><i class="fa fa-sign-out"></i>Log Out</a>
                                                                                </center>
									</div>
																		<a href="https://dragonica-hydra.com/wcoin.php">
<img src="images/woody.png" class="" alt="" style="
    margin-left: 81%;
    margin-top: -69%; <
    div class=;">
									</a>
                                                                        <div id="my_chars">
									<h2 class="info-blocks-text"><span>Mes Personnages</span></h2>
                                                                        <?php include_once("includes/load_chars.php"); ?>
                                                                        </div>
                                                                        <div id="my_passF">
                                                                        <?php include_once("includes/change_pass.php"); ?>
                                                                        </div>
                                                                        <div id="my_Coupons">
                                                                        <?php include_once("includes/change_eur.php"); ?>
                                                                        </div>
									<!-- BEGIN .music-blocks >
									<div id="my_chars" class="staff-block">
										<ul>
											<li>
												<ol>
													<li><a href="user-single-music-single.html"><span class="music-img"><img src="http://i4.ytimg.com/vi/AHitulGaS9k/default.jpg" alt=""></span><b>Jonas Brothers</b><span>Pom Poms</span><span class="clear-float"></span></a></li>
													<li><a href="user-single-music-single.html"><span class="music-img"><img src="http://i4.ytimg.com/vi/vIAQuDkhXpQ/default.jpg" alt=""></span><b>Feint</b><span>Snake Eyes (Feat. CoMa)</span><span class="clear-float"></span></a></li>
													<li><a href="user-single-music-single.html"><span class="music-img"><img src="http://i4.ytimg.com/vi/rNpBahr49mA/default.jpg" alt=""></span><b>Ellie Goulding</b><span>Figure 8</span><span class="clear-float"></span></a></li>
												</ol>
											</li>
											<li>
												<ol>
													<li><a href="user-single-music-single.html"><span class="music-img"><img src="http://i4.ytimg.com/vi/4Xk_pViVP_k/default.jpg" alt=""></span><b>Foster The People</b><span>Don't Stop (TheFatRat Remix)</span><span class="clear-float"></span></a></li>
													<li><a href="user-single-music-single.html"><span class="music-img"><img src="http://i4.ytimg.com/vi/qizlN1Ow1Fc/default.jpg" alt=""></span><b>JIKES &amp; Greg Cooke</b><span>Its Amazing</span><span class="clear-float"></span></a></li>
													<li><a href="user-single-music-single.html"><span class="music-img"><img src="http://i4.ytimg.com/vi/FU4cnelEdi4/default.jpg" alt=""></span><b>Netsky</b><span>Puppy</span><span class="clear-float"></span></a></li>
												</ol>
											</li>
										</ul>
										<div class="clear-float"></div>
									<!-- END .music-blocks -->
									</div>

								<!-- END .content-padding -->
								</div>
							<!-- END .profile-right-side -->
							</div>

