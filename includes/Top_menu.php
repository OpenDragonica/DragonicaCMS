<ul class="right">
						<li><a href="<?php echo $lsocial1 ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="<?php echo $lsocial2 ?>" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
						<li><a href="<?php echo $lsocial3 ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="<?php echo $lsocial4 ?>" target="_blank"><div class="ts3_ico"></div></a></li>
						<li><a href="<?php echo $lsocial5 ?>" target="_blank"><i class="fa fa-twitch"></i></a></li>
						<!--<li><a href="#" target="_blank"><i class="fa fa-steam"></i></a></li>-->
					</ul>
<ul class="load-responsive" rel="DGN Hydra">
                    <?php if(empty($_SESSION['id'])):?>
						<li onclick="open_id('login_box')"><a href="#">Se Connecter</a></li>
                                                <li><a href="<?php echo $linscription ?>">S'Inscrire</a></li>
                                                <?php elseif(!empty($_SESSION['id'])):if($MemberGMLevel>8){echo"<li><a href='$lgm_clear'>GM Panel</a></li>";}?>
                                                <li class="logout_button"><a href="<?php echo $llogout ?>"><i class="fa fa-power-off"></i></a></li>
                                                <li><a href="<?php echo $lmoncompte ?>"><?php echo $MemberID ?></a></li>
                                                <li><a href="<?php echo $lbuycash ?>"><?php echo $MemberCash ?> <img src="images/coins.png" title="Cashs" alt="Cashs" style="width:16px;"></a></li> 
                                                <li><a href="<?php echo $lmessages ?>">Messages <small><?php echo $lmessages_count ?></small></a></li> 
                                                <?php endif; ?>
                                                <li><a href="<?php echo $lforum ?>">Forum</a></li>
                                                <li><a href="<?php echo $ldownload ?>">Telechargement</a></li>
</ul>