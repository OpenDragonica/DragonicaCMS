<?php 
$ptitle="Recovery";
$psubtitle="Compte";
@include('config.php');
@include('link_map.php');
$ChangeKey='N/A';
if(isset($_GET['Key'])){
$Key=$_GET['Key'];
$checkKey=check_Exist_Key($Key);
    if($checkKey['KEYcount']>=1){
    //@include("include/password_form.php"); 
   $ChangeKey='OK';
    }else{
     $_SESSION['msg_state']=12;
     header("location:$lrecovery");    
    }
}
?>
<!DOCTYPE HTML>
<html lang = "fr">
	<head>
            <?php @include_once("common/head.php"); ?>
            <?php @include_once("css/custom-style.html"); ?>
            <script src='https://www.google.com/recaptcha/api.js'></script>
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
					<div class="top_mainContent bg_mainContent"><h1 class="text-center title">RECOVERY</h1></div>
					
					<div class="box_mainContent bg_mainContent">	
                                            <?php include_once("includes/password.php"); ?>
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