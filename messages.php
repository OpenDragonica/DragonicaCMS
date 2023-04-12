<?php 
$ptitle="Support";
$psubtitle="Messages";
@include('config.php');
@include('link_map.php');
require_once ('data/secu.php');
$display=0;
if(isset($_GET['mode'])){$display=1;}
elseif(isset($_GET['id'])){
$display=2;
$checkSupport=checkExistSupport($_GET['id']);
if ($checkSupport[0] == 1){
    $supp_id=$_GET['id'];
    $visit_id=$_GET['id'];
$support_select= Support_INFO($_GET['id']);
$support_MemberGuid=$support_select['MemberKey'];
$support_state=$support_select['statut'];
$ticket_on="<span><i class='fa fa-unlock-alt'></i>Ticket Ouvert</span>";
$ticket_off="<span class='newdefbutton margin-right admin-color'><i class='fa fa-lock'></i>Ticket Fermé</span>";
$ticket_state="";
//statut
if ($support_state==1){$ticket_state=$ticket_on;}
elseif ($support_state==2){$ticket_state=$ticket_on;}
elseif ($support_state==3){$ticket_state=$ticket_off;}


if(($support_MemberGuid==$MemberKey)or($MemberGMLevel>8)){
    
$support_guid=$support_select['GUID'];
$support_title=$support_select['Objet'];
$sup_title=html_entity_decode($support_title);
$support_display=$support_select['display'];
$ptitle="Messages";
$psubtitle=$support_title;
}else {
    $_SESSION['msg_state']=99;
    header("Location:$lmessages#denied");exit();
    }
}
 else {
     $_SESSION['msg_state']=12;
  header("Location:$l404");exit();  
}
//require_once("support/message_load.php");
}
?>
<!DOCTYPE HTML>
<html lang = "fr">
	<head>
            <?php @include_once("common/head.php"); ?>
            <?php @include_once("css/custom-style.html"); ?>
            <style>
                img.setborder {
                    width: 39px;
                    height: 39px;
                }
                .mj_ico {
                    height: 15px !important;
                    width: auto !important;
                    padding: 0 30%;
                }
                .sticky.blue {
    background-color: #0fa7a1;
}
            </style>
	</head>
	<body class="no-slider">
	<!-- <body class="has-top-menu"> -->
		<!-- BEGIN #slider-imgs -->
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
					<div class="top_mainContent bg_mainContent"><h1 class="text-center title">MY MESSAGES</h1></div>
					
					<div class="box_mainContent bg_mainContent">	
                                            <?php 
                                            if($display==0):
                                            include_once("support/messages_list.php");
                                            elseif($display==1):
                                            include_once("support/messages_write.php");
                                            elseif($display==2):                                                
                                            include_once("support/message_load.php");
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
                <script type='text/javascript' src='jscript/rangyinputs-jquery-1.1.2.min.js'></script>
		<script type='text/javascript' src='jscript/rangy-core.js'></script>
		<script type='text/javascript' src='jscript/rangy-selectionsaverestore.js'></script>
	</body>
</html>