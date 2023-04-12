<form action="editchar.php" method="POST">
                        <table class="mcenter">
                            <tr>
                                <th colspan="2">
                                <div class="clear10"></div>
                                Changer Name
                                <input type="hidden" name="action" value="changename"/> 
                                <input type="hidden" name="CharName" value="<?php echo $charNoS;?>">
                                <div class="clear10"></div>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td>
                               <input name="NEWname" type="text" value="" maxlength="20" placeholder="New Name" autocomplete="off" style="margin-left: 13px;">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><div class="clear10"></div></td>
                            </tr>
                            <tr>
                                <th colspan="2">
                                <div class="clear10"></div>
                                <input type="submit" value="Change" style="margin-left: 65px;">
                                <div class="clear10"></div>
                                </th>
                            </tr>
                        </table>
</form>
<form action="editchar.php" method="POST">
                        <table class="mcenter"style="margin-left: 20%;">
                            <tr>
                                <th colspan="2">
                                <div class="clear10"></div>
                                Change Sex
                                <input type="hidden" name="action" value="changesex"/> 
                                <input type="hidden" name="CharNo" value="<?php echo $charNoS;?>">
                                <div class="clear10"></div>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                Sex:
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td><input type="radio" name="sex" value="1" <?php if($chsexNos==1):?> checked <?php endif; ?>></td>
                                            <td>Man</td>
                                            <td><input type="radio" name="sex" value="2" <?php if($chsexNos==2):?> checked <?php endif; ?>></td>
                                            <td>Human</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><div class="clear10"></div></td>
                            </tr>
                            <tr>
                                <th colspan="2">
                                <div class="clear10"></div>
                                <input type="submit" value="Change" style="margin-left: 29px;">
                                <div class="clear10"></div>
                                </th>
                            </tr>
                        </table>
</form>
<div id="Edit_Item1<?php echo $charNoS;?>">
<table class="mcenter">
                            <tr>
                                <th colspan="2">
								<div class="clear10"></div>
                                <div class="clear10"></div>
                                </th>
<center style="color: #abf7ff;text-shadow: silver;display: block;background: #4848484d;color: #ffffff;font-size: 11px;border-radius: 5px;box-shadow: inset 0px 0px 10px #fcba48, 0px 0px 10px #f7c008;/* width: 97px; */text-align: center;text-transform: uppercase;font-weight: bold;line-height: 22px;border: 1px solid #e7b40b;"> W-Coin</center>
<img src="/images/w-coin.png" alt="" style="
    margin-left: 35%;
    margin-top: -15%;
">
                            </tr>
                            <tr>
                                <td colspan="2"><div class="clear10"></div></td>
                            </tr>
                            <tr>
                              <th colspan="2">
                                <form action="editchar.php" method="POST">
                                <input type="hidden" name="action" value="15"/>
                                <input type="hidden" name="CharNo" value="<?php echo $charNoS;?>"/>
								<div class="text">x 50.</del></div> 
                                <input type="submit" value="10 Euro"/>
                                </form>
                             </th>
						     <th colspan="2">
                                <form action="editchar.php" method="POST">
                                <input type="hidden" name="action" value="50"/>
                                <input type="hidden" name="CharNo" value="<?php echo $charNoS;?>"/>
								<div class="text">x 120.</del></div> 
                                <input type="submit" value="20 Euro"/>
                                </form>
                                </th>
				            <th colspan="2">
                                <form action="editchar.php" method="POST">
                                <input type="hidden" name="action" value="100"/>
                                <input type="hidden" name="CharNo" value="<?php echo $charNoS;?>"/>
								<div class="text">x 250.</del></div> 
                                <input type="submit" value="40 Euro"/>
                                </form>
                                </th>
			                <th colspan="2">
                                </th>
                            </tr>
                        </table>
</div>
<div id="Edit_Item2<?php echo $charNoS;?>">
<table class="mcenter">
                            <tr>
                                <th colspan="2">
								<div class="clear10"></div>
                                <div class="clear10"></div>
                                </th>
<center style="color: #abf7ff;text-shadow: silver;display: block;background: #4848484d;color: #ffffff;font-size: 11px;border-radius: 5px;box-shadow: inset 0px 0px 10px #fcba48, 0px 0px 10px #f7c008;/* width: 97px; */text-align: center;text-transform: uppercase;font-weight: bold;line-height: 22px;border: 1px solid #e7b40b;"> Skill Point</center>
<img src="/images/skillp.png" alt="" style="
    margin-left: 45%;
    margin-top: -15%;
">
                            </tr>
                            <tr>
                                <td colspan="2"><div class="clear10"></div></td>
                            </tr>
                            <tr>
                              <th colspan="2">
                                <form action="editchar.php" method="POST">
                                <input type="hidden" name="action" value="500"/>
                                <input type="hidden" name="CharNo" value="<?php echo $charNoS;?>"/>
								<div class="text">x 1000.</del></div> 
                                <input type="submit" value="5 Euro"/>
                                </form>
                             </th>
						     <th colspan="2">
                                <form action="editchar.php" method="POST">
                                <input type="hidden" name="action" value="999"/>
                                <input type="hidden" name="CharNo" value="<?php echo $charNoS;?>"/>
								<div class="text"style="margin-left: 77px;">x 2000.</del></div> 
                                <input type="submit" value="10 Euro" style="margin-left: 70px;">
                                </form>
                                </th>
                            </tr>
                        </table>
</div>
<div id="Edit_Item2<?php echo $charNoS;?>">
<table class="mcenter">
                            <tr>
                                <th colspan="2">
								<div class="clear10"></div>
                                <div class="clear10"></div>
                                </th>
<center style="color: #abf7ff;text-shadow: silver;display: block;background: #4848484d;color: #ffffff;font-size: 11px;border-radius: 5px;box-shadow: inset 0px 0px 10px #fcba48, 0px 0px 10px #f7c008;/* width: 97px; */text-align: center;text-transform: uppercase;font-weight: bold;line-height: 22px;border: 1px solid #e7b40b;"> Enchant scroll +31</center>
<img src="/images/encha.png" alt="" style="
    margin-left: 64%;
    margin-top: -15%;
">
                            </tr>
                            <tr>
                                <td colspan="2"><div class="clear10"></div></td>
                            </tr>
                            <tr>
                              <th colspan="2">
                                <form action="editchar.php" method="POST">
                                <input type="hidden" name="action" value="x4"/>
                                <input type="hidden" name="CharNo" value="<?php echo $charNoS;?>"/>
								<div class="text">x 4.</del></div> 
                                <input type="submit" value="20 Euro"/>
                                </form>
                             </th>
						     <th colspan="2">
                                <form action="editchar.php" method="POST">
                                <input type="hidden" name="action" value="x15"/>
                                <input type="hidden" name="CharNo" value="<?php echo $charNoS;?>"/>
								<div class="text"style="margin-left: 77px;">x 15.</del></div> 
                                <input type="submit" value="40 Euro" style="margin-left: 70px;">
                                </form>
                                </th>
								
                            </tr>
                        </table>
</div>
<div id="Edit_Item2<?php echo $charNoS;?>">
<table class="mcenter">
                            <tr>
                                <th colspan="2">
								<div class="clear10"></div>
                                <div class="clear10"></div>
                                </th>
<center style="color: #abf7ff;text-shadow: silver;display: block;background: #4848484d;color: #ffffff;font-size: 11px;border-radius: 5px;box-shadow: inset 0px 0px 10px #fcba48, 0px 0px 10px #f7c008;/* width: 97px; */text-align: center;text-transform: uppercase;font-weight: bold;line-height: 22px;border: 1px solid #e7b40b;"> Vip System 30 Day</center>
<img src="/images/mngmmark.gif" alt="" style="
    margin-left: 56%;
    margin-top: -10%;
">
                            </tr>
                            <tr>
                                <td colspan="2"><div class="clear10"></div></td>
                            </tr>
							<tr>
						     <th colspan="2">
                                <form action="editchar.php" method="POST">
                                <input type="hidden" name="action" value="vips"/>
                                <input type="hidden" name="CharNo" value="<?php echo $charNoS;?>"/>
								<div class="text"style="margin-left: 11px; color: powderblue;">  <a href="#win1" style="
    color: paleturquoise;
"> Special features.</a></del></div> 
								<div class="text"style="margin-left: 11px; color: powderblue;">  <a href="#win1"> -Enchant and soulcraft +50%</a></del></div> 
								<div class="text"style="margin-left: 11px; color: powderblue;">  <a href="#win1"> -Drop item x20</a></del></div> 
								<div class="text"style="margin-left: 11px; color: powderblue;">  <a href="#win1"> -Boost cash (When will you be online x3)</a></del></div> 
								<div class="text"style="margin-left: 11px; color: powderblue;">  <a href="#win1"> -Pecial icon in chat</a></del></div> 								
                                <input type="submit" value="40 Euro" style="margin-left: 70px;">
                                </form>
                                </th>
                            </tr>
                        </table>
</div>
<!--
<div id="Edit_Item3<?php echo $charNoS;?>">
<table class="mcenter">
                            <tr>
                                <th colspan="2">
								<div class="clear10"></div>
                                <div class="clear10"></div>
                                </th>
<center style="color: #abf7ff;text-shadow: silver;display: block;background: #4848484d;color: #00ffa3;font-size: 11px;border-radius: 5px;box-shadow: inset 0px 0px 10px #fcba48, 0px 0px 10px #f7c008;/* width: 97px; */text-align: center;text-transform: uppercase;font-weight: bold;line-height: 22px;border: 1px solid #e7b40b;"> Event W-Coin</center>
                            </tr>
                            <tr>
                                <td colspan="2"><div class="clear10"></div></td>
                            </tr>
                            <tr>
                              <th colspan="2">
                                <form action="" method="POST">
								<div class="text">x 500.</del></div> 
                                <input type="submit" value="50 HCoin"/>
                                </form>
                             </th>
						     <th colspan="2">
                                <form action="" method="POST">
								<div class="text"style="margin-left: 77px;">x 999.</del></div> 
                                <input type="submit" value="80 HCoin" style="margin-left: 70px;">
                                </form>
                                </th>
                            </tr>
                        </table>
</div>
-->
<?php if($eventANNIV=="ON"):?>
<table class="mcenter">
                            <tr>
                                <th colspan="2">
                                <div class="clear10"></div>
                                <span class="h2 c97E5ED bold">EVENT !</span>
                                </th>
                            </tr>
                            <tr>
                                <td colspan="2"><p class="suggest center">A l'occasion de l'anniversaire ud serveur vous pouvez recevoir un Set complet du dragon Noir accompagné d'une réplique de l'arme du Dragon Noir.</p></td>
                            </tr>
                            <tr>
                                <th colspan="2">
                                <form action="editchar.php" method="POST">
                                <input type="hidden" name="action" value="EVENT"/>
                                <input type="hidden" name="CharNo" value="<?php echo $charNoS;?>"/>
                                <input type="submit"  value="Recevoir sur ce Personnage"/>
                                <div class="clear10"></div>
                                </form>
                                </th>
                            </tr>
                        </table>
<?php endif; ?>