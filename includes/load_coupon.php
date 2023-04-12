<h2><span>Mes coupons</span></h2>
<table class="center" style="width:100%">
       <tr>
           <th>Coupon</th>
            <th>Evenement</th>
            <th>Etat</th>
       </tr>
<?php
$iCoupon = 0;
$stmt= $dbh->prepare("{CALL [dbo].[up_WEB_LoadMemberCoupon] ('$MemberKey')}"); 
$requête=$stmt->execute();
while ($donnees = $stmt->fetch()){
    ++$iCoupon;
    $Coupon_ID=$donnees['f_CouponID'];
    $Event_coupon=$donnees['f_Event'];
    $Coupon_take=$donnees['f_TakeDate'];
    if($Coupon_take==null){$Coupon_state="<span class='defbutton green'>Valide</span>";}else{$Coupon_state="<span class='defbutton'>Utilisé</span>";}
    
    ?>
     <tr>
           <td style="vertical-align:middle;"><?php echo $Coupon_ID ?></td>
            <td style="vertical-align: middle;"><?php echo $Event_coupon ?></td>
            <td style="vertical-align: middle"><?php echo $Coupon_state ?></td>
    </tr>  
<?php     
}
if ($iCoupon==0){
    ?>
       <tr>
           <td colspan="3">Vous ne disposez d'aucun Coupon </td>
       </tr>
       <?php
}
?>
</table>
<a href="#my_acinfo" class="defbutton disabled red" onclick="char_edit()"><i class="fa fa-times"></i>Retour au personnages</a>