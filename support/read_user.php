<?php
$img_playeransw='images/photos/compte_220.jpg';
$img_staffansw='images/ICO_ : HYDRA 2019.png';
if($Answ_MemberGMLevel>8):
$imgansw=$img_staffansw;
$ico_staffansw="<img src='images/MJ.png' class='mj_ico'>";
elseif($Answ_MemberGMLevel<8):
$imgansw=$img_playeransw;
$ico_staffansw="";
if($support_state>1){
Message_Support_visited($support_guid,0);
Support_visited($support_guid,0);}
endif;
$post_user_block="<div class='user-block'>
										<a href='#' class='avatar user-tooltip'>
											<img src='$imgansw' class='setborder' title='' alt='' />
                                                                                           $ico_staffansw 
										</a>
										<div class='user-account'>
											<div>
												<a href='#' class='forum-user user-tooltip'><b>$post_autor</b></a>
											</div>
										</div>
										<div class='clear-float'></div>
									</div>" ?>