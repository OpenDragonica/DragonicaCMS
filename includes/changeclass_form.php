<form action="editchar.php" method="POST">
                        <table class="mcenter">
                            <tr>
                                <th colspan="2">
                                <div class="clear10"></div>
                                Choix de la classe
                                <input type="hidden" name="action" value="changeclass"/> 
                                <input type="hidden" name="CharName" value="<?php echo $charNoS;?>">
                                <div class="clear10"></div>
                                </th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <select name="classno">
                                <?php if($char_classNos==1):?>   
                                <option value="21" selected>Dragon</option>
                                <option value="22">Destructeur</option>
                                <?php endif;?>
                                <?php if($char_classNos==2):?>   
                                <option value="23" selected>Oracle</option>
                                <option value="24">Arcaniste</option>
                                <?php endif;?>
                                <?php if($char_classNos==3):?>   
                                <option value="25" selected>Sentinelle</option>
                                <option value="26">Commando</option>
                                <?php endif;?>
                                <?php if($char_classNos==4):?>   
                                <option value="27" selected>Voltigeur</option>
                                <option value="28">Ombre</option>
                                <?php endif;?>
                                <?php if($char_classNos==51):?>   
                                <option value="57" selected>Elémentaliste</option>
                                <?php endif;?>
                                <?php if($char_classNos==52):?>   
                                <option value="58" selected>Furie Drake</option>
                                <?php endif;?>                                
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><div class="clear10"></div></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="login-passes">
                                       <span><i class="fa fa-warning"></i><b> Attention:</b>Vous devez être deconnecté pour effectuer cette action</span> 
                                    </div>
                                </td>
                            </tr>                            
                            <tr>
                                <th colspan="2">
                                <div class="clear10"></div>
                                <input type="submit"  value="Confirmer"/>
                                <div class="clear10"></div>
                                </th>
                            </tr>
                        </table>
</form>