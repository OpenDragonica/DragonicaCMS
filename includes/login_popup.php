<div id="login_box">
<div class="content">
<div class ="notification_box">
    
	<div class="notification_msg">
            <h1 class='notification_msg bold'>Login</h1>
            <div class="the-form">
										<form action="check.php" method="post">
											<p>
												<label for="login_username"></label>
												<input type="text" name="login_username" id="login_username" value="" placeholder= "Identifiant" autocomplete="off"/>                                                                                                
											</p>
											<p>
												<label for="login_password"></label>
												<input type="password" name="login_password" id="login_password" value="" placeholder="Mot de passe" autocomplete="off"/>
											</p>
                                                                                        <p class="form-footer">
												<input type="submit" name="login_submit" id="login_submit" value="Log In" />
                                                                                                <input type="hidden" name="box_url" value="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"/>
                                                                                                <input type="hidden" name="box_log" value="1"/>
											</p>
										</form>
									</div>
            <div style="width: 100; text-align:center" onclick="close_id('login_box')"><span class="box_close center">x</span></div>
        </div>
</div>
</div>
</div>