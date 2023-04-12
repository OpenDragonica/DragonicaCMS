<nav id="menu" class="main-menu">
	<div class="blur-before"></div>
	<a href="#dat-menu" class="datmenu-prompt"><i class="fa fa-bars"></i>Menu</a>
	<ul class="panel_responsive" rel="Menu">	
		<li><a href="index.php"><strong>Home</strong></a></li>
		<li><a href="<?php echo $lactu; ?>"><span><strong>Guide</strong></span></a>
			<ul class="sub-menu">
                <li><a href="<?php echo $lhistory; ?>">History</a></li>
                <li><a href="<?php echo $lhplay; ?>">How To Play</a></li>
				<li><a href="<?php echo $lclasses; ?>">Classes</a></li>
			</ul>
		</li>
		<li><a href="<?php echo $lactu; ?>"><span><strong>News</strong></span></a>
			<ul class="sub-menu">
                <li><a href="<?php echo $lactu; ?>">All news</a></li>
                <li><a href="<?php echo $lnewslist; ?>">News</a></li>
			</ul>
		</li>
        <li><a href="<?php if(empty($_SESSION['id'])){echo "#";}else{echo $lmoncompte;} ?>"><span><strong>Account</strong></span></a>
			<ul class="sub-menu">
                <?php if(empty($_SESSION['id'])):?>
				<li><a href="<?php echo $linscription ?>">Registration</a></li>
                <?php elseif(!empty($_SESSION['id'])):
                if($MemberGMLevel>8){echo"<li><a href='$lgm_clear'>Admin Panel</a></li>";}?>
                <li><a href="<?php echo $lmoncompte ?>">Account management</a></li>
                <li><a href="<?php echo $lbuycash ?>">Recharge</a></li>
                <li><a href="<?php echo $lmessages ?>">My messages</a></li>
                <?php endif; ?>
				
			</ul> 
		</li>
		<li><a href="<?php echo $lbuycash; ?>"><strong>Donate</strong></a></li>
        <li><a href="<?php echo $ldownload; ?>"><strong>Download</strong></a></li>
		<li><a href="<?php echo $lcontact; ?>"><strong>Support</strong></a></li>
	</ul>
	<ul class="panel_login">
	<?php if(empty($_SESSION['id'])):?>
		<li onclick="open_id('login_box')"><a href="#"><strong>Log in</strong></a></li>
        <li><a href="<?php echo $linscription ?>"><strong>Sign Up</strong></a></li>
    <?php elseif(!empty($_SESSION['id'])):
	if($MemberGMLevel>8){echo"<li><a href='$lgm_clear'><strong>GM</strong></a></li><li><a href='$lstats'><strong>Stats</strong></a></li>";}?>
    <li><a href="<?php echo $lmoncompte ?>"><strong><?php echo $MemberID ?></strong></a></li>
    <li><a href="<?php echo $lbuycash ?>"><strong><?php echo $user_WebCash ?> Euro</strong> <img src="images/coins.png" title="Cashs" alt="Cashs" style="width:16px;"></a></li> 
    <li><a href="<?php echo $lbuycash ?>"><strong><?php echo $MemberCash ?> Cash</strong> <img src="images/coins.png" title="Cashs" alt="Cashs" style="width:16px;"></a></li> 
    <li><a href="<?php echo $lmessages ?>"><strong>Messages </strong><small><?php echo $lmessages_count ?></small></a></li> 
	<li class="logout_button"><a href="<?php echo $llogout ?>"><i class="fa fa-power-off"></i></a></li>
    <?php endif; ?>

	</ul>
	
</nav>