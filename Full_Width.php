<?php 
$ptitle="News";
@include('config.php');
@include('link_map.php');
?>
<!DOCTYPE HTML>
<html lang = "fr">
	<head>
            <?php @include_once("common/head.php"); ?>
            <?php @include_once("css/custom-style.html"); ?>
	</head>
	<body class="no-slider">
	<!-- <body class="has-top-menu"> -->
		<!-- BEGIN #slider-imgs -->
		<div id="slider-imgs">
			<div class="featured-img-box">
				<div id="featured-img-1" class="featured-img"></div>
				<div id="featured-img-2" class="featured-img invisible"></div>
				<div id="featured-img-3" class="featured-img invisible"></div>
				<div id="featured-img-4" class="featured-img invisible"></div>
			</div>
		<!-- END #slider-imgs -->
		</div>

		<!-- BEGIN #top-layer -->
		<div id="top-layer">
			<div id="header-top">
				<div class="wrapper">
                                    <?php include_once("includes/Top_menu.php"); ?>
				</div>
			</div>
			<section id="content">
                            <div id="logo">
                                <a href="./"><div class="logo_ : HYDRA 2019"></div></a>
                            </div>
				<header id="header">
					<div id="menu-bottom">
					<?php include_once("includes/Menu_Bottom.php"); ?>
					</div>

					<div class="wrapper">
						<div class="header-breadcrumbs">
							<?php include_once("includes/page_location.php"); ?>
						</div>
					</div>
					
				</header>
				<div id="main-box" class="full-width">
					
					<div id="main">			
                                            <?php //include_once("includes/page.php"); ?>
					</div>
					
					<div class="clear-float"></div>
					
				</div>
			</section>
		</div>
			
		<div class="clear-float"></div>
		
		<div class="wrapper">
			<!-- BEGIN .footer -->
                        <?php include_once("includes/footer.php"); ?>
		</div>
                <?php @include("includes/popups.php"); ?>
		<?php include_once("jscript/includes_noslider.php"); ?>
	</body>
</html>