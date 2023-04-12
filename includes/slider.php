<?php require_once("data/slider_news.php"); ?>   
	

					<div id="slider-imgs">
						<div class="featured-img-box">
							<div id="featured-img-1" class="featured-img"></div>
							<div id="featured-img-2" class="featured-img invisible"></div>
							<div id="featured-img-3" class="featured-img invisible"></div>
							<div id="featured-img-4" class="featured-img invisible"></div>
						</div>
					
			
                            
<div id="slider-info" class="slider-info">
							<div class="padding-box">
								<ul>    <?php if ($slide_count>=1):?>
									<li>
										<h2><a href="<?php echo $slide1_link ?>"><?php echo $slide1_title ?></a></h2>
										<p><?php echo $slide1_preview ?></p>
										<a href="<?php echo $slide1_link ?>" class="read-more-r">Lire l'article</a>
									</li>
                                                                        <?php endif;?>
                                                                        <?php if ($slide_count>=2):?>
									<li class="dis">
										<h2><a href="<?php echo $slide2_link ?>"><?php echo $slide2_title ?></a></h2>
										<p><?php echo $slide2_preview ?></p>
										<a href="<?php echo $slide2_link ?>" class="read-more-r">Lire l'article</a>
									</li>
                                                                        <?php endif;?>
                                                                        <?php if ($slide_count>=3):?>
									<li class="dis">
										<h2><a href="<?php echo $slide3_link ?>"><?php echo $slide3_title ?></a></h2>
										<p><?php echo $slide3_preview ?></p>
										<a href="<?php echo $slide3_link ?>" class="read-more-r">Lire l'article</a>
									</li>
                                                                        <?php endif;?>
                                                                        <?php if ($slide_count>=4):?>
									<li class="dis">
										<h2><a href="<?php echo $slide4_link ?>"><?php echo $slide4_title ?></a></h2>
										<p><?php echo $slide4_preview ?></p>
										<a href="<?php echo $slide4_link ?>" class="read-more-r">Lire l'article</a>
									</li>
                                                                        <?php endif;?>
								</ul>
							</div>
                                                                        <?php if ($slide_count>=1):?>
							<a href="javascript: featSelect(1);" id="featSelect-1" class="featured-select this-active">
								<span class="w-bar" id="feat-countdown-bar-1">.</span>
								<span class="w-coin" id="feat-countdown-1">0</span>
								<img src="<?php echo $slide1_img ?>" alt="<?php echo $slide1_title ?>" title="<?php echo $slide1_title ?>" class="slider_small"/>
							</a>
    <?php endif;?>
                                                                        <?php if ($slide_count>=2):?>
							<a href="javascript: featSelect(2);" id="featSelect-2" class="featured-select">
								<span class="w-bar" id="feat-countdown-bar-2">.</span>
								<span class="w-coin" id="feat-countdown-2">0</span>
								<img src="<?php echo $slide2_img ?>" alt="<?php echo $slide2_title ?>" title="<?php echo $slide2_title ?>" class="slider_small"/>
							</a>
    <?php endif;?>
                                                                        <?php if ($slide_count>=3):?>
							<a href="javascript: featSelect(3);" id="featSelect-3" class="featured-select">
								<span class="w-bar" id="feat-countdown-bar-3">.</span>
								<span class="w-coin" id="feat-countdown-3">0</span>
								<img src="<?php echo $slide3_img ?>" alt="<?php echo $slide3_title ?>" title="<?php echo $slide3_title ?>" class="slider_small"/>
							</a>
    <?php endif;?>
                                                                        <?php if ($slide_count>=4):?>
							<a href="javascript: featSelect(4);" id="featSelect-4" class="featured-select">
								<span class="w-bar" id="feat-countdown-bar-4">.</span>
								<span class="w-coin" id="feat-countdown-4">0</span>
								<img src="<?php echo $slide4_img ?>" alt="<?php echo $slide4_title ?>" title="<?php echo $slide4_title ?>" class="slider_small"/>
							</a>
    <?php endif;?>
						</div></div>