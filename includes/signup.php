<div class="signup-panel">
<h2><span class="top_mainContent_f"></span></h2>

								<div class="content-padding">
                                                                    <?php if($register_session<100):?>
                                                                    <div class="login-passes">
                                                                            <span><i class="fa fa-warning"></i><b>For the security of your data, I suggest you use a login that is not like your character name.</b></span>
										</div>
									<div class="the-form">
                                                                            <form id="newuser" action="register.php" method="POST">
<?php if(($register_session==1)or($register_session==2)or($register_session==3)):?>
											<p>
												<span class="the-error-msg"><i class="fa fa-warning"></i>
      <?php if($register_session==1){echo "Check all fields!.";}
            if($register_session==2){echo "Captcha Incorrect.";}
            if($register_session==3){echo "An error has occurred, try a different login.";} ?></span>
												<!-- <span class="the-success-msg"><i class="fa fa-check"></i>This is success</span> -->
												<!-- <span class="the-alert-msg"><i class="fa fa-warning"></i>This is alert message</span> -->
                                                                                        </p>
<?php endif;?>
											<p>
                                                                                                <input id="parain" name="parrain" type="hidden" <?php if (isset($_GET['parrain'])):$G_PID=(int)($_GET['parrain']);print" value='$G_PID'" ; else: print 'value="0"';endif; ?> />
                                                                                                <label for="signup_username"><span class="required"></span></label>
												<input autocomplete="off" type="text" name="signup_username" placeholder="Login" id="signup_username" value="" <?php if($register_session==3 or $register_session==1){print 'class="error-input"';} ?>/>
                                                                                                <?php //if($register_session==1){print'<span class="error-msg">Entrez au moins 3 caractères</span>';} ?>
                                                                                                
                                                                                        </p><p></p>
                                                                                        <p>
												<label for="signup_password"><span class="required"></span></label>
												<input autocomplete="off" type="password" name="signup_password" placeholder="Password" id="signup_password" value="" <?php if($register_session==1){print 'class="error-input"';} ?>/>
                                                                                                <?php //if($register_session==1){print'<span class="error-msg">Entrez au moins 6 caractères dont au moins 1 chiffre</span>';} ?>
                                                                                               
											</p><p></p>
                                                                                        <p>
												<label for="signup_password_r"><span class="required"></span></label>
												<input autocomplete="off" type="password" name="signup_password_r" placeholder="Reload Pw" id="signup_password_r" value="" <?php if($register_session==1){print 'class="error-input"';} ?>/>
											</p><p></p>
                                                                                        <p>
												<label for="signup_email"><span class="required"></span></label>
												<input autocomplete="off" type="text" name="signup_email" placeholder="E-Mail" id="signup_email" value="" <?php if($register_session==1){print 'class="error-input"';} ?>/>
												<!--span class="error-msg">E-mail must be filled !</span-->
											</p><p></p>
                                                                                        <p>
												
                                                    <label for="signup_rules">I agree to all terms and conditions of the project<span class="required"></span></label><input type="checkbox" name="signup_rules" id="signup_rules" value="1" />

											</p>
                                                                                            

											<p class="form-footer">
												<input type="submit" name="signup_submit" id="signup_submit" value="S'incrire" />
											</p>

											<p>
												<span class="info-msg">Already have an account ? <a href="<?php echo $lconnexion ?>">Log In !</a></span>
											</p>

										</form>
									</div>
<?php endif;?>
                                                                    <?php if($register_session==100):?>
<div class="info-message" style="background-color: #75a226;text-align: center;">										
										<p><strong>Your account has been successfully created!</strong><br>
										<?php if(empty($_SESSION['id'])): ?>
                                                                                    Now you can log in and download the client.<br>
	<a class="button" style="background-color: #519623;" href="<?php echo $lconnexion ?>">Log In</a>
	<?php endif; ?>
										</p>
									</div>
<?php endif; ?>
								</div>
							</div>
						<?php include_once("includes/whatis.php"); ?>