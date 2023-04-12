<?php
if($Answ_MemberGMLevel>8):
$ico_staffansw="<img src='images/MJ.png'>";
elseif($Answ_MemberGMLevel<8):
$ico_staffansw="";
endif;

$thread_link="<!-- BEGIN .thread-link -->
									<div class='$visit_state'>
										<a href='$lmessages?id=$support_id#post-$Answer_count'>
											$thr_type
											<span>$stick $title</span>
										</a>
										<div class='thread-replies'>
											<span>$Answ_Count</span>
										</div>
										<div class='thread-last'>
											<span class='f-user-link'><a href='$lmessages?id=$support_id#post-$Answer_count'><strong>$ico_staffansw $LastMessage_autor</strong></a></span>
											<div><span class='t-date'>$posted_date</span>
                                                                                        <span class='t-date'>$hours_date</span></div>
										</div>
									<!-- END .thread-link -->
									</div>";
?>