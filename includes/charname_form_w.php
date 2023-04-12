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
                            </tr>
										                <th colspan="2">
                                <form action="editchar.php" method="POST">
                                <input type="hidden" name="action" value="999W"/>
                                <input type="hidden" name="CharNo" value="<?php echo $charNoS;?>"/>
<div class="text" style="
    color: springgreen;
">x 999 (Event Hydra.)</div>
<input type="submit" value="65 Euro" style="
">
                                </form>
                                </th>
                        </table>
</div>
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