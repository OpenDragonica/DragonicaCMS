<h2></h2>
						<div class="content-padding">

							<div class="article-full">
								<div class="article-main-photo">
                                                                    <img src="<?php echo $nIMG;?>" alt="" title="" class="article-photo"/>
								</div>
								
								<div class="article-icons">
									<a href="<?php echo $lstaff;?>" class="user-tooltip"><i class="fa fa-user"></i> <?php echo $auteur_pseudo;?></a>
									<a href="#"><i class="fa fa-calendar"></i> <?php echo $news_date;?></a>
									<a href="#" class="show-likes"><i class="fa fa-eye"></i> <?php echo $news_visits;?></a>
                                     <?php if($MemberGMLevel>8){print " - <a href='$lgm_newsEd&GMedit=$news_id'><i class='fa fa-pencil-square-o'></i>Editer</a>" ;} ?>
								</div>
								<span class="top_mainContent_a"></span>
								<div class="clear-float do-the-split"></div>
								<div class="article-content">
                                                                    <?php echo $news_texte;?>
									</div>
							</div>
							
							<!-- <div class="clear-float do-the-split"></div> -->
						
						<!-- END .content-padding -->
						</div>
						<!-- BEGIN .content-padding -->
						<div class="content-padding">
							
							<div class="comment-part">

								<!-- BEGIN #comments -->
								
								<div class="comments-pager"></div>

								<div class="comment-form">
									
                                                                    <div id="respond" class="comment-respond" style="text-align: center;">
											
				
                                                                        </div><!-- #respond -->
								</div>
				
							</div>

						<!-- END .content-padding -->
						</div>

						