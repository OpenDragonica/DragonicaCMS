<div class="signup-panel">
<h2><span class="top_mainContent_f"></span></h2>

								<div class="content-padding">
									<p class="p-padding">Please identify yourself in order to access your account</p>

									<div class="login-passes">
                                                                            <span><i class="fa fa-warning"></i><b> You can not login in the game and on the site with your forum account</b></span>
										</div>

									<div class="the-form" style="margin-top:40px;">
										<form action="check.php" method="post">
<?php if($login_session==1):?>
											<p>
												<span class="the-error-msg"><i class="fa fa-warning"></i>An error has occurred, Check your credentials.</span>
												<!-- <span class="the-success-msg"><i class="fa fa-check"></i>This is success</span> -->
												<!-- <span class="the-alert-msg"><i class="fa fa-warning"></i>This is alert message</span> -->
											</p>
<?php endif;?>
											<p>
												<label for="login_username"></label>
												<input type="text" name="login_username" id="login_username" value="" placeholder= "Login" autocomplete="off"/>                                                                                                
											</p>
											<p>
												<label for="login_password"></label>
												<input type="password" name="login_password" id="login_password" value="" placeholder="Password" autocomplete="off"/>
											</p>

											<p class="form-footer">
												<input type="submit" name="login_submit" id="login_submit" value="Log In" />
                                                                                                <input type="hidden" name="url" value="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"/>
											</p>
                                                                                        <?php if($trylog_cnt>=5):?>
                                                                                        <p style="margin-top:40px;">
												<span class="info-msg error">You have entered bad IDs repeatedly.<br/>Your next attempt has a wait of 30 seconds.</span>
											</p>                                                                                        
                                                                                        <?php endif;?>
											<p style="margin-top:40px;">
												<span class="info-msg">Do not have an account yet ? <a href="<?php echo $linscription ?>">Register !</a><br /><br />If you do not remember your password <a href="<?php echo $lrecovery ?>">Click here</a> to find it!</span>
											</p>

										</form>
									</div>

								</div>

</div>
<?php include_once("includes/whatis.php"); ?>