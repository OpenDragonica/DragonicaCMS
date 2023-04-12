<h2><span style="
    text-align: center;
    color: white;
    text-shadow: 0 0 10px #ac00ff;
    margin-left: 235px;
">Change Password</span></h2>
<div class="login-passes">
                                                                            <span><i class="fa fa-warning"></i><b>Your password should be no worse than what you use now.</b></span>
										</div>
                                                                    <div class="the-form">
												<form action="updatemdp.php" method="POST">
                                                                                            <p>
												<label for="oldpass"><span class="required"></span></label>
												<input name="oldpass" placeholder="Old password" type="password" maxlength="20" value="" <?php if($msg_session>=1 and $msg_session<=5){print 'class="error-input"';} ?>/>                                                                                              
                                                                                            </p>       
                                                                                            <p>
												<label for="user"><span class="required"></span></label>
												<input name="pass" placeholder="New password" type="password" maxlength="20" value="" <?php if($msg_session>=1 and $msg_session<=5){print 'class="error-input"';} ?>/>                                                                                              
                                                                                            </p>
                                                                                            <p>
												<label for="user"><span class="required"></span></label>
												<input name="pass2" placeholder="Reload password" type="password" maxlength="20" value="" <?php if($msg_session>=1 and $msg_session<=5){print 'class="error-input"';} ?>/>                                                                                           
                                                                                            </p>
                                                                                            <p class="form-footer">
												<input type="submit" value="Changer" />
                                                                                            </p>
                                                                                            </form>                                                                
								</div>
<a href="#my_acinfo" class="defbutton disabled red" onclick="char_edit()"><i class="fa fa-times"></i>Exit</a>