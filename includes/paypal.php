<div id="cs_paypal">
    <style>
        option.select-opt{
           /* background-color: black;*/
        }
    </style>
	<center>
		<h3>Paypal</h3>                
		<!--h1 style="color:red;">Temporairement Indisponible</h1-->
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
				<select name="amount" id="PP" class="select-opt">
					<option class="select-opt" value="5">€5,00 EUR</option>
					<option class="select-opt" value="10">€10,00 EUR</option>
					<option class="select-opt" value="20">€20,00 EUR</option>
					<option class="select-opt" value="40">€40,00 EUR</option>
					<option class="select-opt" value="60">€60,00 EUR</option>
					<option class="select-opt" value="60">€65,00 EUR (Event Hydra.)</option>
					<option class="select-opt" value="80">€80,00 EUR</option>
					<option class="select-opt" value="100">€100,00 EUR</option>
					<option class="select-opt" value="150">€150,00 EUR</option>
					<option class="select-opt" value="200">€200,00 EUR</option>
					<option class="select-opt" value="350">€350,00 EUR</option>
					<option class="select-opt" value="500">€500,00 EUR</option>
				</select>
				<div class="clear10"></div>
				<input name="currency_code" type="hidden" value="EUR">
				<input name="shipping" type="hidden" value="0.00">
				<input name="tax" type="hidden" value="0.00">
				<input name="return" type="hidden" value="dragonica-hydra.com/buycash.php?msg=1">
				<input name="cancel_return" type="hidden" value="dragonica-hydra.com/buycash.php">
				<input name="notify_url" type="hidden" value="dragonica-hydra.com/validationPaiement.php">
				<input name="cmd" type="hidden" value="_xclick">
				<input name="business" type="hidden" value="goodgamesdgn@gmail.com">
				<input name="item_name" type="hidden" value="Dragonica Hydra Cash">
				<input name="no_note" type="hidden" value="1">
				<input name="lc" type="hidden" value="FR">
				<input name="bn" type="hidden" value="PP-BuyNowBF">
				<input name="custom" type="hidden" value="<?php echo $MemberID ?>">
                                <input alt="Effectuez vos paiements via PayPal : une solution rapide, gratuite et sécurisée" name="submit" value="Buy" type="submit">
				<img src="https://www.paypal.com/fr_FR/i/scr/pixel.gif" border="0" alt="" width="1" height="1">
				<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
</form>
<div class="clear10"></div>
</center>
</div>