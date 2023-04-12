<div id="sidebar">
						<!-- BEGIN .panel -->
						<div class="panel">
							<h2>SOCIAL</h2>
							<div class="panel-content socialize">
								
								<a href="<?php echo $lsocial1; ?>" target="_blank" class="strike-tooltip s-fb" title="Facebook"><i class="fa fa-facebook"></i></a>
								<a href="<?php echo $lsocial3; ?>" target="_blank" class="strike-tooltip s-tw" title="Twitter"><i class="fa fa-twitter"></i></a>
								<a href="<?php echo $lsocial2; ?>" target="_blank" class="strike-tooltip s-yt" title="YouTube"><i class="fa fa-youtube-play"></i></a>
								<a href="<?php echo $lsocial5; ?>" target="_blank" class="strike-tooltip s-tc" title="Twitch"><i class="fa fa-twitch"></i></a>
								<a href="<?php echo $lsocial4; ?>" target="_blank" class="strike-tooltip s-st" title="Discord"><div class="fa fa-discord"></div></a>
								
							</div>
						<!-- END .panel -->
						</div>
    <!-- BEGIN .panel -->
						<div class="panel">
							<h2>Info Serveur</h2>
							<div class="panel-content">

								<div class="donation-widget">
                                                                    <table style="width: 100%;">
        <tr>
	<th class="left" style="padding:0 5px">ÉTAT:</th>
	<th class ="right" style="padding:0 5px">
	<?php echo $serverSTATE; ?>		
	</th>
	</tr>
	<TR>
		<th class="left" style="padding:0 5px">Heure :</th>
		<th class ="right" style="padding:0 5px"><div id="horloge"></div><script language="JavaScript" src="jscript/h.js"></script><script type="text/javascript">WinTime(<?php echo date("H"); ?>, <?php echo date("i"); ?>, <?php echo date("s"); ?>)</script></th>
	</TR>
	<tr>
	<th class="left" style="padding:0 5px">Version:</th>
	<th class ="right" style="padding:0 5px"><?php echo $serverVER; ?></th>
	</tr>
	<tr>
	<th class="left" style="padding:0 5px">Extension:</th>
	<th class ="right" style="padding:0 5px"><?php echo $ServerVer_Memo; ?></th>
	</tr>
</table>
                                                                    <hr />
									<div class="donation-stats">
										<h3>Population: <span class="value"><?php echo $charge_text ?></span></h3>
										<div class="progress-bar">
											<div class="border-bar">
                                                                                            <div class="the-progress" style="width: <?php echo $charge_percent ?>%;"><span></span><strong><?php echo $charge_percent ?>%</strong></div>
											</div>
										</div>
									</div>
								</div>
								
							</div>
						<!-- END .panel -->
						</div>		
						<!-- BEGIN .panel -->
						<div class="panel">
							<h2>Prochaines arènes</h2>
							<div class="panel-content">
								
								<div class="panel-games-lobby">
									<ol>
										<li>
											<div class="lobby-block" style="background:url(<?php echo $Next1_img ?>) no-repeat center;">
												<span class="caption"><?php echo $Next1_name ?></span>
												<div class="join-button">
													<a href="#"><?php echo $Next1_name ?></a>
												</div>
											</div>
											<div class="lobby-info">
												<span class="right"><?php echo $Next1_date ?></span>
												<span class="left"><b class="countdown-text" rel="<?php echo $Next1_time ?>">Chargement..</span></b>
												<div class="clear-float"></div>
											</div>
										</li>

										<li>
											<div class="lobby-block" style="background:url(<?php echo $Next2_img ?>) no-repeat center;">
												<span class="caption"><?php echo $Next2_name ?></span>
												<div class="join-button">
													<a href="#"><?php echo $Next2_name ?></a>
												</div>
											</div>
											<div class="lobby-info">
												<span class="right"><?php echo $Next2_date ?></span>
												<span class="left"><b class="countdown-text" rel="<?php echo $Next2_time ?>">Chargement..</span></b>
												<div class="clear-float"></div>
											</div>
										</li>
									</ol>
								</div>

							</div>
						<!-- END .panel -->
						</div>
						
						<!-- <div class="panel">
							<h2>Jaunākās Tēmas</h2>
							<div class="top-right"><a href="forum.php">Forums</a></div>
							<div class="panel-content no-padding">
								
								<div class="new-forum-line">
									<a href="user-single.php" class="avatar online user-tooltip">
										<img src="images/photos/avatar-1.jpg" class="setborder" title="" alt="" />
									</a>
									<a href="forum-single.php" class="f_content">
										<font class="sidebar-comments"><font>1</font></font>
										<strong>Mesarchum signiferumque sea eu no harum definiebas quo</strong>
										<span>autors <b class="user-tooltip">marcisbee</b>, 20/12/2012</span>
									</a>
								</div>
								
								<div class="new-forum-line">
									<a href="user-single.php" class="avatar online user-tooltip">
										<img src="images/photos/avatar-2.jpg" class="setborder" title="" alt="" />
									</a>
									<a href="forum-single.php" class="f_content">
										<font class="sidebar-comments inactive"><font>6</font></font>
										<strong>Lorem ipsum dolor sit amet usu at</strong>
										<span>autors <b class="user-tooltip">minkka.</b>, 20/12/2012</span>
									</a>
								</div>
								
								<div class="new-forum-line">
									<a href="user-single.php" class="avatar offline user-tooltip">
										<img src="images/photos/avatar-3.jpg" class="setborder" title="" alt="" />
									</a>
									<a href="forum-single.php" class="f_content">
										<font class="sidebar-comments"><font>21</font></font>
										<strong>Propriae senserit erroribus pro ea</strong>
										<span>autors <b class="user-tooltip">Daviskrex</b>, 20/12/2012</span>
									</a>
								</div>
								
								<div class="new-forum-line">
									<a href="user-single.php" class="avatar online user-tooltip">
										<img src="images/photos/avatar-1.jpg" class="setborder" title="" alt="" />
									</a>
									<a href="forum-single.php" class="f_content">
										<font class="sidebar-comments inactive"><font>103</font></font>
										<strong>Ne vis oblique nominavi honestatis mea ex minim nemore</strong>
										<span>autors <b class="user-tooltip">marcisbee</b>, 20/12/2012</span>
									</a>
								</div>
								
								<div class="new-forum-line">
									<a href="user-single.php" class="avatar away user-tooltip">
										<img src="images/photos/avatar-4.jpg" class="setborder" title="" alt="" />
									</a>
									<a href="forum-single.php" class="f_content">
										<font class="sidebar-comments inactive"><font>7</font></font>
										<strong>Cu quaeque repudiare per nisl partiendo ullamcorper per an</strong>
										<span>autors <b class="user-tooltip">Paakjis</b>, 20/12/2012</span>
									</a>
								</div>
								
								<div class="new-forum-line">
									<a href="user-single.php" class="avatar ingame user-tooltip">
										<img src="images/photos/avatar-5.jpg" class="setborder" title="" alt="" />
									</a>
									<a href="forum-single.php" class="f_content">
										<font class="sidebar-comments inactive"><font>2</font></font>
										<strong>No pro blandit voluptua oportere</strong>
										<span>autors <b class="user-tooltip">LIONz</b>, 20/12/2012</span>
									</a>
								</div>
								
								<div class="new-forum-line">
									<a href="user-single.php" class="avatar offline user-tooltip">
										<img src="images/photos/avatar-6.jpg" class="setborder" title="" alt="" />
									</a>
									<a href="forum-single.php" class="f_content">
										<font class="sidebar-comments inactive"><font>9</font></font>
										<strong>Tantas officiis consulatu mel ex</strong>
										<span>autors <b class="user-tooltip">Arr0</b>, 20/12/2012</span>
									</a>
								</div>
								
								<div class="new-forum-line">
									<a href="user-single.php" class="avatar offline user-tooltip">
										<img src="images/photos/avatar-7.jpg" class="setborder" title="" alt="" />
									</a>
									<a href="forum-single.php" class="f_content">
										<font class="sidebar-comments"><font>3</font></font>
										<strong>Ut tota illum qui ad quo ignota commodo</strong>
										<span>autors <b class="user-tooltip">Svens</b>, 20/12/2012</span>
									</a>
								</div>
								
							</div>
						</div> -->
						
						<!-- <div class="panel">
							<h2>Online (4)</h2>
							<div class="top-right"><a href="users.php">Visi lietotāji</a></div>
							<div class="panel-content">

								<ul class="with-online-users">
									<li>
										<a href="user-single.php" class="avatar online user-tooltip">
											<img src="images/photos/avatar-1.jpg" class="setborder" title="" alt="" />
										</a>
									</li>
									<li>
										<a href="user-single.php" class="avatar online user-tooltip">
											<img src="images/photos/avatar-2.jpg" class="setborder" title="" alt="" />
										</a>
									</li>
									<li>
										<a href="user-single.php" class="avatar away user-tooltip">
											<img src="images/photos/avatar-4.jpg" class="setborder" title="" alt="" />
										</a>
									</li>
									<li>
										<a href="user-single.php" class="avatar ingame user-tooltip">
											<img src="images/photos/avatar-5.jpg" class="setborder" title="" alt="" />
										</a>
									</li>
								</ul>
								<div class="clear-float"></div>
								
							</div>
						</div> -->
						
						<!-- BEGIN .panel -->
						<div class="panel">
							<h2>Articles Populaires</h2>
                                                        <?php include_once("article/news_popular.php"); ?>	
							<div class="top-right"><a href="<?php echo $lactu; ?>">Voir tout</a></div>
							<div class="panel-content">
								
								<div class="d-articles">
									<div class="item">
										<div class="item-header">
											<a href="<?php echo $popular1_link; ?>"><img src="<?php echo $popular1_img; ?>" alt="" /></a>
										</div>
										<div class="item-content">
											<h4><a href="<?php echo $popular1_link; ?>"><?php echo $popular1_title; ?></a></h4>
											<p><?php echo $popular1_preview; ?></p>
										</div>
									</div>
									<div class="item">
										<div class="item-header">
											<a href="<?php echo $popular2_link; ?>"><img src="<?php echo $popular2_img; ?>" alt="" /></a>
										</div>
										<div class="item-content">
											<h4><a href="<?php echo $popular2_link; ?>"><?php echo $popular2_title; ?></a></h4>
											<p><?php echo $popular2_preview; ?></p>
										</div>
									</div>
									<div class="item">
										<div class="item-header">
											<a href="<?php echo $popular3_link; ?>"><img src="<?php echo $popular3_img; ?>" alt="" /></a>
										</div>
										<div class="item-content">
											<h4><a href="<?php echo $popular3_link; ?>"><?php echo $popular3_title; ?></a></h4>
											<p><?php echo $popular3_preview; ?></p>
										</div>
									</div>
									<div class="item">
										<div class="item-header">
											<a href="<?php echo $popular4_link; ?>"><img src="<?php echo $popular4_img; ?>" alt="" /></a>
										</div>
										<div class="item-content">
											<h4><a href="<?php echo $popular4_link; ?>"><?php echo $popular4_title; ?></a></h4>
											<p><?php echo $popular4_preview; ?></p>
										</div>
									</div>
									<div class="item">
										<div class="item-header">
											<a href="<?php echo $popular5_link; ?>"><img src="<?php echo $popular5_img; ?>" alt="" /></a>
										</div>
										<div class="item-content">
											<h4><a href="<?php echo $popular5_link; ?>"><?php echo $popular5_title; ?></a></h4>
											<p><?php echo $popular5_preview; ?></p>
										</div>
									</div>
								</div>
								
							</div>
						<!-- END .panel -->
						</div>
						<!-- BEGIN .panel -->
						<div class="panel">                                                    
							<h2>Emporia</h2>
							<div class="panel-content">

								<!--div class="voting-line">
									<div class="voting-left" style="width:70%;"><span>70%</span></div>
									<div class="voting-right" style="width:30%;"><span>30%</span></div>
									<div class="clear-float"></div>
								</div-->
								
								<div class="panel-duel">
                                                                    <?php 
$empo_starclass='star1';
$empo_guildicon='1';
$empo_guildname='Emporia';
/*
                                                    // Début de la requête PHP
$empo_requête = $dbh2->query('SELECT	TOP(1)
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
	WHERE TB_EMPORIA.[State]=1
	ORDER BY TB_EMPORIA.Grade DESC
		');  
while ($empo_donnees = $empo_requête->fetch())
{ // Ouverture de la boucle NEWS 
$empo_star = $empo_donnees['Grade'];
$empo_guildname = $empo_donnees['GuildName'];
$empo_guildicon = ($empo_donnees['Emblem'])+1;
$empo_star1='star1';
$empo_star2='star2';
if ($empo_star==1){$empo_starclass=$empo_star1;}
elseif ($empo_star==2){$empo_starclass=$empo_star2;}
                                                    ?>
                                                                    
                                                                    <div class="panel-duel-block">
										<div class="star_empo">
                                                                                <table>
                                                                                    <tr><td class="<?php echo $empo_starclass;?>i"></td></tr>
                                                                                </table>
                                                                                </div>
                                                                                <div class="guild_empo">
                                                                                <table class="mcenter">
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="guild icon<?php echo $empo_guildicon;?>"></div>
                                                                                        </td>
                                                                                        <td style="padding: 5px;">
                                                                                            <?php echo $empo_guildname;?>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                                </div>
                                                                    </div>
                                                                    <?php
} // Fermeture de la boucle NEWS
$requête->closeCursor(); // On ferme la connexion PDO, pour éviter les problèmes*/
?>
                                                                    <div class="panel-duel-block">
										<div class="star_empo">
                                                                                <table>
                                                                                    <tr><td class="<?php echo $empo_starclass;?>i"></td></tr>
                                                                                </table>
                                                                                </div>
                                                                                <div class="guild_empo">
                                                                                <table class="mcenter">
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="guild icon<?php echo $empo_guildicon;?>"></div>
                                                                                        </td>
                                                                                        <td style="padding: 5px;">
                                                                                            <?php echo $empo_guildname;?>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                                </div>
                                                                    </div>
                                                                    <div class="panel-duel-block">
										<div class="star_empo">
                                                                                <table>
                                                                                    <tr><td class="star2i"></td></tr>
                                                                                </table>
                                                                                </div>
                                                                                <div class="guild_empo">
                                                                                <table class="mcenter">
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="guild "></div>
                                                                                        </td>
                                                                                        <td style="padding: 5px;">
                                                                                            Fermé
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                                </div>
                                                                    </div>
									<!--div class="panel-duel-block">
										<span class="star_empo">Tempor delenit</span>
                                                                                <span class="guild_empo">Tempor delenit</span>
									</div>
									<div class="panel-duel-block">
										<span class="star_empo">Tempor delenit</span>
                                                                                <span class="guild_empo">Tempor delenit</span>
									</div>
									<!--div class="duel-versus"></div>
									<div class="clear-float"></div-->
								</div>
								
								<!--div class="panel-duel-voting">
									<div class="panel-duel-vote">
										<a href="#">Vote</a>
									</div>
									<div class="panel-duel-vote">
										<a href="#">Vote</a>
									</div>
									<div class="clear-float"></div>
								</div-->
								
							</div>
						<!-- END .panel -->
						</div>
						
						<!-- BEGIN .panel >
						<div class="panel">
							<h2>Latest Comments</h2>
							<div class="panel-content no-padding">
							
								<div class="new-forum-line">
									<a href="user-single.php" class="avatar online user-tooltip">
										<img src="images/photos/avatar-1.jpg" class="setborder" title="" alt="" />
									</a>
									<a href="forum-single.php" class="f_content">
										<span class="sidebar-comments"><span>1</span></span>
										<strong>Mesarchum signiferumque sea eu no harum definiebas quo</strong>
										<span><b class="user-tooltip">marcisbee</b>, 20/12/2012</span>
									</a>
								</div>
								
								<div class="new-forum-line">
									<a href="user-single.php" class="avatar online user-tooltip">
										<img src="images/photos/avatar-2.jpg" class="setborder" title="" alt="" />
									</a>
									<a href="forum-single.php" class="f_content">
										<span class="sidebar-comments inactive"><span>6</span></span>
										<strong>Lorem ipsum dolor sit amet usu at</strong>
										<span><b class="user-tooltip">minkka.</b>, 20/12/2012</span>
									</a>
								</div>
								
								<div class="new-forum-line">
									<a href="user-single.php" class="avatar offline user-tooltip">
										<img src="images/photos/avatar-3.jpg" class="setborder" title="" alt="" />
									</a>
									<a href="forum-single.php" class="f_content">
										<span class="sidebar-comments"><span>21</span></span>
										<strong>Propriae senserit erroribus pro ea</strong>
										<span><b class="user-tooltip">Daviskrex</b>, 20/12/2012</span>
									</a>
								</div>
								
								<div class="new-forum-line">
									<a href="user-single.php" class="avatar online user-tooltip">
										<img src="images/photos/avatar-1.jpg" class="setborder" title="" alt="" />
									</a>
									<a href="forum-single.php" class="f_content">
										<span class="sidebar-comments inactive"><span>103</span></span>
										<strong>Ne vis oblique nominavi honestatis mea ex minim nemore</strong>
										<span><b class="user-tooltip">marcisbee</b>, 20/12/2012</span>
									</a>
								</div>
								
								<div class="new-forum-line">
									<a href="user-single.php" class="avatar away user-tooltip">
										<img src="images/photos/avatar-4.jpg" class="setborder" title="" alt="" />
									</a>
									<a href="forum-single.php" class="f_content">
										<span class="sidebar-comments inactive"><span>7</span></span>
										<strong>Cu quaeque repudiare per nisl partiendo ullamcorper per an</strong>
										<span><b class="user-tooltip">Paakjis</b>, 20/12/2012</span>
									</a>
								</div>
								
							</div>
						<!-- END .panel >
						</div>
						
						<!-- BEGIN .panel >
						<div class="panel">
							<h2>Contact Information</h2>
							<div class="panel-content">
								
								<div>
									<h4>What do we stand for ?</h4>
									<p>Soleat aperiam ex pri, at pericula constituam efficiantu per, voluptaria intellegam eu nec. Duo modus homero vivendum an, facete timeam ne eum.</p>

									<a href="mailto:revelio@oursite.com" class="icon-line">
										<i class="fa fa-comment"></i><span>revelio@oursite.com</span>
									</a>
				
									<span class="icon-line">
										<i class="fa fa-map-marker"></i><span>949 West Grassland Drive, UT 84003</span>
									</span>
				
								</div>
								
							</div>
						<!-- END .panel >
						</div>
						
						<!-- BEGIN .panel >
						<div class="panel">
							<h2>Tag Cloud</h2>
							<div class="panel-content">
								
								<div class="tagcloud">
									<a href="#">sapien</a><a href="#">scelerisque</a><a href="#">sed</a><a href="#">sem</a><a href="#">senectus</a><a href="#">sit</a><a href="#">sodales</a><a href="#">sollicitudin</a><a href="#">tellus</a><a href="#">tempus</a><a href="#">tincidunt</a><a href="#">tristique</a><a href="#">ullamcorper</a><a href="#">urna</a><a href="#">ut</a><a href="#">varius</a><a href="#">vel</a><a href="#">vivamus</a><a href="#">viverra</a><a href="#">volutpat</a>
								</div>
								
							</div>
						<!-- END .panel>
						</div>
						
						<!-- BEGIN .panel->
						<div class="panel">
							<h2>Default Calendar</h2>
							<div class="panel-content">
								
								<div id="calendar_wrap">
									<table id="wp-calendar">
										<caption>January 2015</caption>
										<thead>
											<tr>
												<th scope="col" title="Monday">M</th>
												<th scope="col" title="Tuesday">T</th>
												<th scope="col" title="Wednesday">W</th>
												<th scope="col" title="Thursday">T</th>
												<th scope="col" title="Friday">F</th>
												<th scope="col" title="Saturday">S</th>
												<th scope="col" title="Sunday">S</th>
											</tr>
										</thead>

										<tfoot>
											<tr>
												<td colspan="3" id="prev"><a href="http://omnomnom.datcouch.com/2014/05/" title="View posts for May 2014">« May</a></td>
												<td class="pad">&nbsp;</td>
												<td colspan="3" id="next" class="pad">&nbsp;</td>
											</tr>
										</tfoot>

										<tbody>
											<tr>
												<td colspan="3" class="pad">&nbsp;</td><td>1</td><td>2</td><td>3</td><td>4</td>
											</tr>
											<tr>
												<td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td>
											</tr>
											<tr>
												<td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td>
											</tr>
											<tr>
												<td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td>
											</tr>
											<tr>
												<td>26</td><td>27</td><td>28</td><td id="today">29</td><td>30</td><td>31</td>
												<td class="pad" colspan="1">&nbsp;</td>
											</tr>
										</tbody>
									</table>
								</div>
								
							</div>
						<!-- END .panel>
						</div>
						
					<!-- END #sidebar -->
					</div>