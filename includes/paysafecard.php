<div id="cs_paysafecard" >
    <style>
        #main input[type="text"]{
            width: auto;
        }
        th.ps_table,
        td.ps_th{
    border: 1px solid wheat;
}
input[type="text"].pin_code{
    width: auto;
}
    </style>
	<center>
		<h3>Paysafecard</h3>		
		<form name="paysafecard_pin" action="paysafe_post.php" method="POST">
		<TABLE class="paysafecard_pin">
		<TR>
			<th colspan="4" style="text-align:center;padding-bottom: 2px;">Code PIN</th>
		</TR>
		<TR>
                    <td><input class="pin_code" type='text' maxlength="4" size="4" onkeypress='validate(event)' name="pin1" onKeyup="autotab(this, document.paysafecard_pin.pin2)"/></td>
			<td>-<input class="pin_code" type='text' maxlength="4" size="4" onkeypress='validate(event)' name="pin2" onKeyup="autotab(this, document.paysafecard_pin.pin3)"/></td>
			<td>-<input class="pin_code" type='text' maxlength="4" size="4" onkeypress='validate(event)' name="pin3" onKeyup="autotab(this, document.paysafecard_pin.pin4)"/></td>
			<td>-<input class="pin_code" type='text' maxlength="4" size="4" onkeypress='validate(event)' name="pin4" onKeyup="autotab(this, document.paysafecard_pin.amount)"/></td>
		</tr>
		<ul></ul>
		<tr>
			<TD colspan="2"><div class="clear10"></div>Montant(€):</TD>
			<TD colspan="2"><div class="clear10"></div><input class="pin_code" type='text' maxlength="2" size="9" onkeypress='validate(event)' name="amount"/></TD>
		</tr>
		
		<tr>
			<TD colspan="4" style="text-align:center;">
                            <div class="clear10"></div>
                <center><input type="submit" value="Envoyer"></center></TD>
		</Tr>
		</TABLE>
		</form>
                <div class="clear10"></div>
		<a target="_blank" href="https://www.paysafecard.com/fr-fr/demander-le-solde/">Vérifier le Solde</a>
		<div class="clear10"></div>
		<!--h4>Tarifs</h4-->
                <TABLE class="mcenter center" style="min-width:300px;">
		<tr>
                    <th colspan="2">Tarifs<div class="clearBTM"></div></th>
		</tr>
			<TR>
				<TH class="ps_table">Prix</TH>
				<TH class="ps_table">Montant</TH>
			</TR>
			<TR>
				<TD class="ps_th">5€</TD>
                                <TD class="ps_th">5000<img src="images/coins.png" title="Cashs" alt="Cashs" style="width:16px;"></TD>
			</TR>
			<TR>
				<TD class="ps_th">10€</TD>
				<TD class="ps_th">10000<img src="images/coins.png" title="Cashs" alt="Cashs" style="width:16px;"></TD>
			</TR>
			<TR>
				<TD class="ps_th">15€</TD>
				<TD class="ps_th">15000<img src="images/coins.png" title="Cashs" alt="Cashs" style="width:16px;"></TD>
			</TR>
			<TR>
				<TD class="ps_th">25€</TD>
				<TD class="ps_th">26000<img src="images/coins.png" title="Cashs" alt="Cashs" style="width:16px;"></TD>
			</TR>
			<TR>
				<TD class="ps_th">50€</TD>
				<TD class="ps_th">56000<img src="images/coins.png" title="Cashs" alt="Cashs" style="width:16px;"></TD>
			</TR>
		</TABLE>
                <div class="clear10"></div>

<?php
$stmt = $dbh->prepare("SELECT TOP (4) Code, Montant,Date, Statut
	FROM [dbo].[TB_Paysafecard] 
	WHERE  Membre = :membre
	ORDER BY Date DESC");
$stmt->bindParam(':membre', $_SESSION['id']);
$stmt->execute();
$arrValues = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (!empty($arrValues)){
// open the table
print "<h4>Historique</h4><table style='
border: 3px solid grey;width: 97%;text-align: center;max-height:120px;'>\n";
print "<tr style='border-bottom:1px solid grey'>\n";
// add the table headers
foreach ($arrValues[0] as $key => $useless){
    print "<th>$key</th>";
}
print "</tr>";
// display data
foreach ($arrValues as $row){
    print "<tr>";
    foreach ($row as $key => $val){
		if (strcmp ($val, "Validé")== 0){print "<td style='color:green;'>$val</td>";} //Validé
		elseif (strcmp ($val, "Validé(Steam)")== 0){print "<td style='color:green;'>Validé</td>";} //Validé(Steam)
		elseif (strcmp ($val, "Invalide")== 0){print "<td style='color:red;'>$val</td>";}
		elseif (strcmp ($val, "X")== 0){print "<td style='color:orange;'>En Attente</td>";}
		elseif (strlen ($val)== 23){$val=substr("$val", 0, 16);print "<td>$val</td>";}
        else {print "<td>$val</td>";}
    }
    print "</tr>\n";
}
// close the table
print "</table>\n";
}
else{}
?>
<div class="clear10"></div>
</center>
<script>
function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
/*
Auto tabbing script- By JavaScriptKit.com
http://www.javascriptkit.com
This credit MUST stay intact for use
*/

function autotab(original,destination){
if (original.getAttribute&&original.value.length==original.getAttribute("maxlength"))
destination.focus()
}

</script>
</div>