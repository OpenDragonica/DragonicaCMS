<?php 
$ptitle="Main";
@include('config.php');
@include('link_map.php');
?>
<!DOCTYPE HTML>
<html lang = "fr">
	<head>		
            <?php include_once("common/head.php"); ?>
            <?php include_once("css/custom-style.html"); ?>
	</head>
	<!--<body class="no-slider">-->
	<body class="has-top-menu">            
		<!-- BEGIN #slider-imgs -->

		<!-- BEGIN #top-layer -->
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
					<div class="top_mainContent bg_mainContent"></div>
					
					<div class="box_mainContent bg_mainContent">
					
		<div class="top_content">
					<div class="item_topR"><img src="//web.archive.org/web/20160826212020im_/http://cdn.exe.in.th/dgo.exe.in.th/images/object_tophead_bnc.png" alt=""></div>
          <div class="clearfix">
            <div id="carousel-example-generic" class="carousel slide carousel_top_content pull-left" data-ride="carousel">
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
			  
					
				<?php include_once("includes/slider.php"); ?>						
                
              </div>
              <!-- Controls -->
              <div class="carousel_frame left3"></div>
              <div class="carousel_frame right3"></div>
              <div class="carousel_frame left4"></div>
              <div class="carousel_frame right4"></div>
            </div>
            <div class="topR_mainContent pull-left"> 
              <a href="<?php echo $ldownload; ?>" target="_blank" class="btn_download_topR">
                <img src="/images/btn_download.png"> 
              </a> 
              <a href="/site/register" target="_blank" class="text-center btn_topR">
                <div class="btn_register_topR text-center"></div>
              </a> 
              <a href="/refillCenter/" target="_blank" class="text-center btn_topR">
                <div class="btn_refill_topR text-center"></div>
              </a> 
			  <div class="progress-bar">
			  <div class="border-bar">
              <div class="the-progress" style="width: <?php echo $charge_percent ?>%;"><span id="Channel1">Channel</span><strong><?php echo $charge_percent ?>%</strong></div>
			  </div>
				</div>
              <a target="_blank" class="text-center btn_topR cursor_disable">
			    <img src="/images/btn_readmore.png" style="margin-top: 141px;margin-left: 61px;">	
<div style="margin-top: -38px;
    margin-left: 23px;
    /* line-height: 6; */
    color: #fff;
    text-shadow: 0 0 5px rgba(255,53,195,1);">	Ver : <?php echo $serverVER; ?></div>				 
              </a>
              <div class="item_topR"><img src="/images/object_tophead_bnc.png" alt=""></div>
            </div>
          </div>
        </div>
<?php
		$server = '86.105.212.111';
		$port = 11005;
		$status = "<div class='severstatus_offline'>"; //offline
		$timeout = 3;
		$fp = @fsockopen ($server, $port, $errno, $errstr, $timeout);
		if ($fp) {
		$status = 'online';
		@fwrite ($fp, "HEAD / HTTP/1.0\r\nHost: $server:$port\r\n\r\n");
		if (strlen(@fread($fp,1024))>0) $status = "<div class='severstatus_online'>"; //online
		fclose ($fp);
		}
		echo "<div class=\"srv\">".$status."</div>";
?>
<span class="top_mainContent_s" style="
    font-family: fantasy;
">EMPORIA</span>
<div class="emporia_board">
<div class="emporia">
<?php
// Début de la requête PHP
$requête = $dbh2->query('SELECT	TOP(2)
		TB_EMPORIA.[EmporiaID]
		,	TB_EMPORIA.[Grade]
		,	TB_EMPORIA.[State]
		,	TB_EMPORIA.[OwnerGuildID]
		,	TB_EMPORIA.[HaveDate]
		,	TB_GUILD.[GuildName]
		,	TB_GUILD.[Emblem]
	FROM(	
			[dbo].[TB_Emporia] AS TB_EMPORIA
			LEFT OUTER JOIN
			[dbo].[TB_Guild_Basic_Info] AS TB_GUILD
		ON
			TB_EMPORIA.[OwnerGuildID] = TB_GUILD.[GuildGuid]
		)
	WHERE TB_EMPORIA.[State]>=1
	ORDER BY TB_EMPORIA.Grade DESC
		'); // On envois la requête à la connexion PDO, le "query" permet d'envoyer une requête à la BDD.
 
while ($donnees = $requête->fetch()) // On effectue une boucle des données récupérées plus haut grâce à la requête nommée "$requête".
{ // Ouverture de la boucle NEWS 
$star = $donnees['Grade'];
$guildname = $donnees['GuildName'];
$guildicon = ($donnees['Emblem'])+1;
$star1='star1';
$star2='star2';?>
<?php
if ($star==1){$starclass=$star1;}
elseif ($star==2){$starclass=$star2;}
?>
<?php  if ($starclass==$star1):?>
<div class="clear_star"></div>
 <?php endif;?>
<div class="<?php echo $starclass;?>">
        <table><tr><td><div class="guild" id="icon<?php echo $guildicon;?>"></div></td><td class="Text"><?php echo $guildname;?></td><td class="<?php echo $starclass;?>"></td></tr></table>
    </div> 

<?php
} // Fermeture de la boucle NEWS
$requête->closeCursor(); // On ferme la connexion PDO, pour éviter les problèmes
?>
</div>
</div>
<?php include_once("includes/index_news.php"); ?>	
                                            					

					<div class="clear-float"></div>

				</div>
				</div>
				</div>
				<div class="bottom_mainContent bg_mainContent "></div>
				</div>
			</section>
		<!-- END #top-layer -->
		</div>
		<a class="wheel-bonus1" href="https://dragonica-hydra.com/messages.php"><img class="wheel-bonus__icon" src="/images/support.png" alt=""></a>
		<div class="clear-float"></div>
		
		<div class="wrapper">
			<!-- BEGIN .footer -->
                        <?php include_once("includes/footer.php"); ?>
			
		</div>
                <?php @include("includes/popups.php"); ?>
                <?php include_once("jscript/includes.php"); ?>		
	</body>
</html>