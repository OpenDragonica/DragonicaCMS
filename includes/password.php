<div class="signup-panel">
	<div class="content-padding">
            <?php if(!(strcmp ($ChangeKey, "OK")==0)):?>
            <div class="accordion">                                                                            
			<div class="accordion-tab" id="login_lost">
				<a href="#login_lost">Forgot Username</a>
				<div class="accordion-block">
                                                                <div class="the-form">
                                                                <form action="recover.php" method="POST">
                                                                <p>
					<label for="mail">Email:<span class="required">*</span></label>
					<input maxlength="40" autocomplete="off" type="text" name="mail" value="" <?php if($msg_session>=1 and $msg_session<=8){print 'class="error-input"';} ?>/>                                                                                               
                                                                </p>
                                                                <center>
                                                                    <input type="hidden" name="recovery" value="Login"/>
                                                                    <div class="g-recaptcha" data-sitekey="6LcSTB4UAAAAAPNe7KvmOdulAXi9052Syigmeb2F"></div>
                                                                </center>
                                                                <p class="form-footer">
					<input type="submit" value="Récuperer" />
                                                                </p>
                                                                </form>
                                                                </div>
				</div>
			</div>
			<div class="accordion-tab" id="pw_lost">
				<a href="pw_lost">Forgot your password</a>
				<div class="accordion-block">
                                                                <div class="the-form">
					<form action="recover.php" method="POST">
                                                                <p>
					<label for="user">Login:<span class="required">*</span></label>
					<input maxlength="20" autocomplete="off" type="text" name="user" value="" <?php if($msg_session>=1 and $msg_session<=8){print 'class="error-input"';} ?>/>                                                                                               
                                                                </p>
                                                                    <input type="hidden" name="recovery" value="Mdp"/>
                                                                <p class="form-footer">
					<input type="submit" value="Récuperer" />
                                                                </p>
                                                                </form>
                                                                </div>
				</div>
			</div>                                                                            
		</div>
                                        <?php endif;?>
                                        <?php if(strcmp ($ChangeKey, "OK")==0):?>
                                        <div class="login-passes">
                                                <span><i class="fa fa-warning"></i><b>Your password must contain at least 1 digit and must be at least 6 characters long</b></span>
			</div>
    <div class="the-form">
					<form action="recover.php" method="POST">
                                                                <p>
					<label for="user">New CDM:<span class="required">*</span></label>
					<input name="pass" type="password" maxlength="20" value="" <?php if($msg_session>=1 and $msg_session<=5){print 'class="error-input"';} ?>/>                                                                                              
                                                                </p>
                                                                <p>
					<label for="user">Repeat the CDM:<span class="required">*</span></label>
					<input name="pass2" type="password" maxlength="20" value="" <?php if($msg_session>=1 and $msg_session<=5){print 'class="error-input"';} ?>/>                                                                                           
                                                                </p>
                                                                    <input type="hidden" name="recovery" value="Mdp"/>
                                                                    <input type="hidden" name="Key" value="<?php echo "$Key";?>" />
                                                                <p class="form-footer">
					<input type="submit" value="Récuperer" />
                                                                </p>
                                                                </form>
                                       
	</div> 
    <?php endif;?>
    </div>
</div>            
<?php include_once("includes/whatis.php"); ?>