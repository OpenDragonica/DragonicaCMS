<?php 
$ptitle="Roulette";
$psubtitle="Gestion de compte";
@include('config.php');
@include('link_map.php');
require_once ('data/secu.php');
require_once ('includes/characters.php');
$MemberParrainLink=$lhost_link.'/'.$linscription.'?parrain='.$PID;
$MemberSupportLink='support.php';
?>
<!DOCTYPE HTML>
<html lang = "fr">
	<head>
            <?php @include_once("common/head_wcoin.php"); ?>
            <?php @include_once("css/custom-style.html"); ?>
		    <link href="css/class_icon_w.css" rel="stylesheet" type='text/css' />
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
					<div class="top_mainContent bg_mainContent"><h1 class="text-center title">Roulette</h1></div>
					
					<div class="box_mainContent bg_mainContent">
					
							
                                            <?php include_once("includes/wc.php"); ?>
					
					
					<div class="clear-float"></div>
					
				</div>
				<div class="bottom_mainContent bg_mainContent "></div>
				</div>
				</div>
			</section>
			
		
			
		<div class="clear-float"></div>
		
		<div class="wrapper">
			<!-- BEGIN .footer -->
                        <?php include_once("includes/footer.php"); ?>
		</div>
		<p><!-- --><br />

                <?php @include("includes/popups.php"); ?>
		<?php include_once("jscript/includes_noslider.php"); ?>
	</body>
</html>