<?php 
$ptitle="News";
$psubtitle="News";
@include('config.php');
@include('link_map.php');
$display=0;
if(isset($_GET['list'])){$display=1;}
elseif(isset($_GET['news'])){
$display=2;
require_once("article/news_load.php");
}
?>
<!DOCTYPE HTML>
<html lang = "fr">
	<head>
            <?php @include_once("common/head.php"); ?>
            <?php @include_once("css/custom-style.html"); ?>
	</head>
	<body class="no-slider">
	<!-- <body class="has-top-menu"> -->
<div id="top-layer">
		<div id="header-top">  
		<header id="header">
			                          	
				<div class="wrapper">					
								<?php include_once("includes/Menu_Bottom.php"); ?>									
				</div>
			
		</header>
		</div>
			<section id="content">
                            <div id="logo">
                                <a href="./"><div class="logo_hydra"></div></a>
                            </div>
				<div id="main-box">
				<div class="mainContent boxCenter">
					<div class="top_mainContent bg_mainContent"><h1 class="text-center title"><?php echo $title; ?></h1></div>
					<div class="box_mainContent bg_mainContent">
						 <?php 
                                                 if($display<2):
                                                     @include("article/post_list.php");
                                                       elseif($display==2):
                                                     @include("article/news_text.php");
                                                 endif; 
                                                 ?>
					</div>
					<div class="bottom_mainContent bg_mainContent "></div>
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