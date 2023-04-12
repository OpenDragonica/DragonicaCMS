<?php 
$ptitle="GM Panel";
$psubtitle="GM Panel";
@include('config.php');
@include('link_map.php');
require_once ('data/secu.php');
require_once ('data/secu_gm.php');
?>
<!DOCTYPE HTML>
<html lang = "fr">
	<head>
            <?php @include_once("common/head.php"); ?>
            <?php @include_once("css/custom-style.html"); ?>
            <link href="css/class_icon.css" rel="stylesheet" type='text/css' />
            <link href="css/guild.css" rel="stylesheet" type='text/css' />
            <link rel="stylesheet" type="text/css" href="css/js/jquery.cleditor.css" />
            <style>
                .w615{
                    width: 100%;
                }
                th
                {
                  width: 25%;  
                }
                .list-puce {
    padding: 2px;
}

                .badge-list-puce{                    
                    padding: 2px 7px;
                    color: #fff;
                    background: #6fb205;
                    background-color: rgb(111, 178, 5);
                    border-radius: 2px;
                    font-size: 13px;
                    font-weight: bold;
                }
                small{
    display: inline-block;
    background: #d2382c;
    color: #fff;
    font-size: 11px;
    padding: 1px 5px;
    border-radius: 2px;
    line-height: 15px;
    margin-left: 8px;
    -moz-transition: background 0.2s, color 0.2s;
    -webkit-transition: background 0.2s, color 0.2s;
    -o-transition: background 0.2s, color 0.2s;
}
            </style>
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

				<div id="main-box" class="full-width">
					
					<div id="main">
                                            <div class="content-padding33">
                                            <?php include_once("includes/GM_panel.php"); ?>
                                            </div>
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
                <?php if($gm_task==1){
                    ?>
                <script type='text/javascript' src='jscript/modernizr.custom.50878.js'></script>
		<script type='text/javascript' src='jscript/iscroll.js'></script>
		<script type='text/javascript' src='jscript/dat-menu.js'></script>
		<script type='text/javascript'>
			var strike_autostart = false;
		</script>
		<script type='text/javascript' src='jscript/theme-script.js'></script>
                <script type='text/javascript' src='jscript/Origins.js'></script>
                        <?php
                }else{include_once("jscript/includes_noslider.php");}?>
                <!--script type='text/javascript' src='jscript/rangyinputs-jquery-1.1.2.min.js'></script>
		<script type='text/javascript' src='jscript/rangy-core.js'></script>
		<script type='text/javascript' src='jscript/rangy-selectionsaverestore.js'></script-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="jscript/jquery.cleditor.min.js"></script>
<script type="text/javascript">      
	$(document).ready(function() {  $("#n_texte").cleditor();  });  
</script>
	</body>
</html>