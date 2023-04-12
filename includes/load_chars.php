<div class="staff-block">
    <?php if(empty($char1name)):?>
    <table>
    <tr><td colspan="3" class="center"><div class="clear10"></div>No characters</td></tr>
    </table>
    <?php endif;?>
                <?php if(!empty($char1name)):?>
                <div class='item'>
            <table class="char_tab-mcenter">
                <tr class="center" style="height:75px;">
                    <td colspan="2">
						<div class="wheel-bonus"><div class="logocenter Mskclass class<?php echo $char1Class; ?>" ></div></div>
                        <div class="vtop char_name"><?php echo $char1name; ?></div>
                    </td>                    
                </tr>
				<tr class="char_tab-desc">
                <tr>
                    <td colspan="2" class="center"><div class="char_guildL vtop"><?php if(!empty($char1guild)):?>
                            <div class="vtop guild icon<?php echo $char1Emblem; ?>"></div>
                            <div class="vtop char_guild"><?php echo $char1guild; ?></div>
                                <?php endif;?></div></td>
                </tr>
                <tr class="center">
                    <td colspan="2">Level <?php echo $ch1Lvl; ?></td>                                   
                </tr>
                <tr class="center">
                    <td colspan="2">Location:<br/><?php echo $char1map; ?></td>                                   
                </tr>
				
				</tr>
                <?php if($ch1Lvl<=0):?>
                <tr>
                <td colspan="2">
                    <div class="login-passes">
                       <span><i class="fa fa-info"></i><b> Information:</b>The change of class will be possible from the site from level 20 against 500 cash</span> 
                    </div>
                </td>
                </tr>
                <?php endif;?>
                <tr>                    
                <td colspan="2" class="center">
                    <div class="accordion">
                        <div class="accordion-tab">
							<a href="#"><i class="fa fa-wrench"></i>Edit</a>
							<div class="accordion-block">
							<?php $charNoname=$char1name;$charNoS=1;$chsexNos=$_SESSION['char1Sex'];$chargGUID=$_SESSION['char1GUID']; ?>
							<?php @include('includes/charname_form.php'); ?>
							</div>
                        </div>
                    </div>
                    <?php if($char1_changeclass==100):?>
                    <div class="accordion">
                        <div class="accordion-tab">
							<a href="#"><i class="fa fa-level-up"></i>Class Change (500 Cash)</a>
							<div class="accordion-block">
							<?php $char_classNos=$char1Class; @include('includes/changeclass_form.php'); ?>
							</div>
                        </div>
                    </div>                        
                    <?php endif;?>
                </td>
                </tr>
            </table>
                </div>
                <?php endif;?>
                <?php if(!empty($char2name)):?>
                <div class='item'>
            <table class="char_tab-mcenter">
                <tr class="center" style="height:75px;">
                    <td colspan="2">
                        <div class="wheel-bonus"><div class="logocenter Mskclass class<?php echo $char2Class; ?>" ></div></div>
                        <div class="vtop char_name"><?php echo $char2name; ?></div>
                    </td>                    
                </tr>
                <tr>
                    <td colspan="2" class="center"><div class="char_guildL vtop"><?php if(!empty($char2guild)):?>
                            <div class="vtop guild icon<?php echo $char2Emblem; ?>"></div>
                            <div class="vtop char_guild"><?php echo $char2guild; ?></div>
                                <?php endif;?></div></td>
                </tr>
                <tr class="center">
                    <td colspan="2">Level <?php echo $ch2Lvl; ?></td>                                   
                </tr>
                <tr class="center">
                    <td colspan="2">Location:<br/><?php echo $char2map; ?></td>                                   
                </tr>
                <?php if($ch2Lvl<=0):?>
                <tr>
                                <td colspan="2">
                                    <div class="login-passes">
                                       <span><i class="fa fa-info"></i><b> Information:</b>The change of class will be possible from the site from level 20 against 500 cash</span> 
                                    </div>
                                </td>
                </tr>
                <?php endif;?>
                <tr>
                    <td colspan="2" class="center">
                        <div class="accordion">
                            <div class="accordion-tab">
				<a href="#"><i class="fa fa-wrench"></i>Edit</a>
				<div class="accordion-block">
                                <?php $charNoname=$char2name;$charNoS=2;$chsexNos=$_SESSION['char2Sex'];$chargGUID=$_SESSION['char2GUID'];?>
				<?php @include('includes/charname_form.php'); ?>
				</div>
                            </div>
                        </div>
                        <?php if($char2_changeclass==100):?>
                        <div class="accordion">
                            <div class="accordion-tab">
				<a href="#"><i class="fa fa-level-up"></i>Class Change (500 Cash)</a>
				<div class="accordion-block">
				<?php $char_classNos=$char2Class; @include('includes/changeclass_form.php'); ?>
				</div>
                            </div>
                        </div>                        
                        <?php endif;?>
                    </td>
                </tr>
            </table>
                </div>
                <?php endif;?>
                <?php if(!empty($char3name)):?>
                <div class='item'>
            <table class="char_tab-mcenter">
                <tr class="center" style="height:75px;">
                    <td colspan="2">
                        <div class="wheel-bonus"><div class="logocenter Mskclass class<?php echo $char3Class; ?>" ></div></div>
                        <div class="vtop char_name"><?php echo $char3name; ?></div>
                    </td>                    
                </tr>
                <tr>
                    <td colspan="2" class="center"><div class="char_guildL vtop"><?php if(!empty($char3guild)):?>
                            <div class="vtop guild icon<?php echo $char3Emblem; ?>"></div>
                            <div class="vtop char_guild"><?php echo $char3guild; ?></div>
                                <?php endif;?></div></td>
                </tr>
                <tr class="center">
                    <td colspan="2">Level <?php echo $ch3Lvl; ?></td>                                   
                </tr>
                <tr class="center">
                    <td colspan="2">Location:<br/><?php echo $char3map; ?></td>                                   
                </tr>
                <?php if($ch3Lvl<=0):?>
                <tr>
                                <td colspan="2">
                                    <div class="login-passes">
                                       <span><i class="fa fa-info"></i><b> Information:</b>The change of class will be possible from the site from level 20 against 500 cash</span> 
                                    </div>
                                </td>
                </tr>
                <?php endif;?>
                <tr>
                    <td colspan="2" class="center">
                        <div class="accordion">
                            <div class="accordion-tab">
				<a href="#"><i class="fa fa-wrench"></i>Edit</a>
				<div class="accordion-block">
                                <?php $charNoname=$char3name;$charNoS=3;$chsexNos=$_SESSION['char3Sex'];$chargGUID=$_SESSION['char3GUID'];?>
				<?php @include('includes/charname_form.php'); ?>
				</div>
                            </div>
                        </div>
                        <?php if($char3_changeclass==100):?>
                        <div class="accordion">
                            <div class="accordion-tab">
				<a href="#"><i class="fa fa-level-up"></i>Class Change (500 Cash)</a>
				<div class="accordion-block">
				<?php $char_classNos=$char3Class; @include('includes/changeclass_form.php'); ?>
				</div>
                            </div>
                        </div>                        
                        <?php endif;?>
                    </td>
                </tr>
            </table>
                </div>
                <?php endif;?>
                <?php if(!empty($char4name)):?>
                <div class='item'>
            <table class="char_tab-mcenter">
                <tr class="center" style="height:75px;">
                    <td colspan="2">
                        <div class="wheel-bonus"><div class="logocenter Mskclass class<?php echo $char4Class; ?>" ></div></div>
                        <div class="vtop char_name"><?php echo $char4name; ?></div>
                    </td>                    
                </tr>
                <tr>
                    <td colspan="2" class="center"><div class="char_guildL vtop"><?php if(!empty($char4guild)):?>
                            <div class="vtop guild icon<?php echo $char4Emblem; ?>"></div>
                            <div class="vtop char_guild"><?php echo $char4guild; ?></div>
                                <?php endif;?></div></td>
                </tr>
                <tr class="center">
                    <td colspan="2">Level <?php echo $ch4Lvl; ?></td>                                   
                </tr>
                <tr class="center">
                    <td colspan="2">Location:<br/><?php echo $char4map; ?></td>                                   
                </tr>
                <?php if($ch4Lvl<=0):?>
                <tr>
                                <td colspan="2">
                                    <div class="login-passes">
                                       <span><i class="fa fa-info"></i><b> Information:</b>The change of class will be possible from the site from level 20 against 500 cash</span> 
                                    </div>
                                </td>
                </tr>
                <?php endif;?>
                <tr>
                    <td colspan="2" class="center">
                        <div class="accordion">
                            <div class="accordion-tab">
				<a href="#"><i class="fa fa-wrench"></i>Edit</a>
				<div class="accordion-block">
                                <?php $charNoname=$char4name;$charNoS=4;$chsexNos=$_SESSION['char4Sex'];$chargGUID=$_SESSION['char4GUID'];?>
				<?php @include('includes/charname_form.php'); ?>
				</div>
                            </div>
                        </div>
                        <?php if($char4_changeclass==100):?>
                        <div class="accordion">
                            <div class="accordion-tab">
				<a href="#"><i class="fa fa-level-up"></i>Class Change (500 Cash)</a>
				<div class="accordion-block">
				<?php $char_classNos=$char4Class; @include('includes/changeclass_form.php'); ?>
				</div>
                            </div>
                        </div>                        
                        <?php endif;?>
                    </td>
                </tr>
            </table>
                </div>
                <?php endif;?>
                <?php if(!empty($char5name)):?>
                <div class='item'>
            <table class="char_tab-mcenter">
                <tr class="center" style="height:75px;">
                    <td colspan="2">
                        <div class="wheel-bonus"><div class="logocenter Mskclass class<?php echo $char5Class; ?>" ></div></div>
                        <div class="vtop char_name"><?php echo $char5name; ?></div>
                    </td>                    
                </tr>
                <tr>
                    <td colspan="2" class="center"><div class="char_guildL vtop"><?php if(!empty($char5guild)):?>
                            <div class="vtop guild icon<?php echo $char5Emblem; ?>"></div>
                            <div class="vtop char_guild"><?php echo $char5guild; ?></div>
                                <?php endif;?></div></td>
                </tr>
                <tr class="center">
                    <td colspan="2">Level <?php echo $ch5Lvl; ?></td>                                   
                </tr>
                <tr class="center">
                    <td colspan="2">Location:<br/><?php echo $char5map; ?></td>                                   
                </tr>
                <?php if($ch5Lvl<=0):?>
                <tr>
                                <td colspan="2">
                                    <div class="login-passes">
                                       <span><i class="fa fa-info"></i><b> Information:</b>The change of class will be possible from the site from level 20 against 500 cash</span> 
                                    </div>
                                </td>
                </tr>
                <?php endif;?>
                <tr>
                    <td colspan="2" class="center">
                    <div class="accordion">
                            <div class="accordion-tab">
				<a href="#"><i class="fa fa-wrench"></i>Edit</a>
				<div class="accordion-block">
                                <?php $charNoname=$char5name;$charNoS=5;$chsexNos=$_SESSION['char5Sex'];$chargGUID=$_SESSION['char5GUID'];?>
				<?php @include('includes/charname_form.php'); ?>
				</div>
                            </div>
                        </div>
                        <?php if($char5_changeclass==100):?>
                        <div class="accordion">
                            <div class="accordion-tab">
				<a href="#"><i class="fa fa-level-up"></i>Class Change (500 Cash)</a>
				<div class="accordion-block">
				<?php $char_classNos=$char5Class; @include('includes/changeclass_form.php'); ?>
				</div>
                            </div>
                        </div>                        
                        <?php endif;?>
                    </td>
                </tr>
            </table>
                </div>
                <?php endif;?>
                <?php if(!empty($char6name)):?>
                <div class='item'>
            <table class="char_tab-mcenter">
                <tr class="center" style="height:75px;">
                    <td colspan="2">
                        <div class="wheel-bonus"><div class="logocenter Mskclass class<?php echo $char6Class; ?>" ></div></div>
                        <div class="vtop char_name"><?php echo $char6name; ?></div>
                    </td>                    
                </tr>
                <tr>
                    <td colspan="2" class="center"><div class="char_guildL vtop"><?php if(!empty($char6guild)):?>
                            <div class="vtop guild icon<?php echo $char6Emblem; ?>"></div>
                            <div class="vtop char_guild"><?php echo $char6guild; ?></div>
                                <?php endif;?></div></td>
                </tr>
                <tr class="center">
                    <td colspan="2">Level <?php echo $ch6Lvl; ?></td>                                   
                </tr>
                <tr class="center">
                    <td colspan="2">Location:<br/><?php echo $char6map; ?></td>                                   
                </tr>
                <?php if($ch6Lvl<=0):?>
                <tr>
                                <td colspan="2">
                                    <div class="login-passes">
                                       <span><i class="fa fa-info"></i><b> Information:</b>The change of class will be possible from the site from level 20 against 500 cash</span> 
                                    </div>
                                </td>
                </tr>
                <?php endif;?>
                <tr>
                    <td colspan="2" class="center">
                        <div class="accordion">
                            <div class="accordion-tab">
				<a href="#"><i class="fa fa-wrench"></i>Edit</a>
				<div class="accordion-block">
                                <?php $charNoname=$char6name;$charNoS=6;$chsexNos=$_SESSION['char6Sex'];$chargGUID=$_SESSION['char6GUID'];?>
				<?php @include('includes/charname_form.php'); ?>
				</div>
                            </div>
                        </div>
                        <?php if($char6_changeclass==100):?>
                        <div class="accordion">
                            <div class="accordion-tab">
				<a href="#"><i class="fa fa-level-up"></i>Class Change (500 Cash)</a>
				<div class="accordion-block">
				<?php $char_classNos=$char6Class; @include('includes/changeclass_form.php'); ?>
				</div>
                            </div>
                        </div>                        
                        <?php endif;?>
                    </td>
                </tr>
            </table>
                </div>
                <?php endif;?>
                <?php if(!empty($char7name)):?>
                <div class='item'>
            <table class="char_tab-mcenter">
                <tr class="center" style="height:75px;">
                    <td colspan="2">
                        <div class="wheel-bonus"><div class="logocenter Mskclass class<?php echo $char7Class; ?>" ></div></div>
                        <div class="vtop char_name"><?php echo $char7name; ?></div>
                    </td>                    
                </tr>
                <tr>
                    <td colspan="2" class="center"><div class="char_guildL vtop"><?php if(!empty($char7guild)):?>
                            <div class="vtop guild icon<?php echo $char7Emblem; ?>"></div>
                            <div class="vtop char_guild"><?php echo $char7guild; ?></div>
                                <?php endif;?></div></td>
                </tr>
                <tr class="center">
                    <td colspan="2">Level <?php echo $ch7Lvl; ?></td>                                   
                </tr>
                <tr class="center">
                    <td colspan="2">Location:<br/><?php echo $char7map; ?></td>                                   
                </tr>
                <?php if($ch7Lvl<=0):?>
                <tr>
                                <td colspan="2">
                                    <div class="login-passes">
                                       <span><i class="fa fa-info"></i><b> Information:</b>The change of class will be possible from the site from level 20 against 500 cash</span> 
                                    </div>
                                </td>
                </tr>
                <?php endif;?>
                <tr>
                    <td colspan="2" class="center">
                    <div class="accordion">
                            <div class="accordion-tab">
				<a href="#"><i class="fa fa-wrench"></i>Edit</a>
				<div class="accordion-block">
                                <?php $charNoname=$char7name;$charNoS=7;$chsexNos=$_SESSION['char7Sex'];$chargGUID=$_SESSION['char7GUID'];?>
				<?php @include('includes/charname_form.php'); ?>
				</div>
                            </div>
                        <?php if($char7_changeclass==100):?>
                        <div class="accordion">
                            <div class="accordion-tab">
				<a href="#"><i class="fa fa-level-up"></i>Class Change (500 Cash)</a>
				<div class="accordion-block">
				<?php $char_classNos=$char7Class; @include('includes/changeclass_form.php'); ?>
				</div>
                            </div>
                        </div>                        
                        <?php endif;?>
                        </div>
                    </td>
                </tr>
            </table>
                </div>
                <?php endif;?>
                <?php if(!empty($char8name)):?>
                <div class='item'>
            <table class="char_tab-mcenter">
                <tr class="center" style="height:75px;">
                    <td colspan="2">
                        <div class="wheel-bonus"><div class="logocenter Mskclass class<?php echo $char8Class; ?>" ></div></div>
                        <div class="vtop char_name"><?php echo $char8name; ?></div>
                    </td>                    
                </tr>
                <tr>
                    <td colspan="2" class="center"><div class="char_guildL vtop"><?php if(!empty($char8guild)):?>
                            <div class="vtop guild icon<?php echo $char8Emblem; ?>"></div>
                            <div class="vtop char_guild"><?php echo $char8guild; ?></div>
                                <?php endif;?></div></td>
                </tr>
                <tr class="center">
                    <td colspan="2">Level <?php echo $ch8Lvl; ?></td>                                   
                </tr>
                <tr class="center">
                    <td colspan="2">Location:<br/><?php echo $char8map; ?></td>                                   
                </tr>
                <?php if($ch8Lvl<=0):?>
                <tr>
                                <td colspan="2">
                                    <div class="login-passes">
                                       <span><i class="fa fa-info"></i><b> Information : </b>The change of class will be possible from the site from level 20 against 500 cash</span> 
                                    </div>
                                </td>
                </tr>
                <?php endif;?>
                <tr>
                    <td colspan="2" class="center">
                        <div class="accordion">
                            <div class="accordion-tab">
				<a href="#"><i class="fa fa-wrench"></i>Edit</a>
				<div class="accordion-block">
                                <?php $charNoname=$char8name;$charNoS=8;$chsexNos=$_SESSION['char8Sex'];$chargGUID=$_SESSION['char8GUID'];?>
				<?php @include('includes/charname_form.php'); ?>
				</div>
                            </div>
                        </div>
                        <?php if($char8_changeclass==100):?>
                        <div class="accordion">
                            <div class="accordion-tab">
				<a href="#"><i class="fa fa-level-up"></i>Class Change (500 Cash)</a>
				<div class="accordion-block">
				<?php $char_classNos=$char8Class; @include('includes/changeclass_form.php'); ?>
				</div>
                            </div>
                        </div>                        
                        <?php endif;?>
                    </td>
                </tr>
            </table>
                </div>
                <?php endif;?>        
</div>