<form id="Ban_Member" name="Ban_Member" action="admin/moderate.php" method="POST">
    <input type="hidden" value="EVENT_cash" name="action"/>
    <table class="mcenter" style="padding: 5px;">
		<tr>
                    <th colspan="3">EVENT
                    <div class="clear10"></div>
                    </th>                
		</tr>
		<tr>
			<td style="text-align:center">
			<label for="memberID">CharName</label>
			</td>
			<td style="text-align:center">
			<label for="Event_cashA">Count Cash</label>
			</td>
			<td style="text-align:center">
			<label for="Event_Name">Titre Event</label>
			</td>
		</tr>
		<tr>
			<td>
			<center><input id="memberID" name="memberID" type="text" value="" maxlength="15" /></center>
			</td>
			<td>
			<center><input id="Event_cashA" name="Event_cashA" type="number" value="0" step="100" min="0"/></center>
			</td>
			<td>
			<center><input id="Event_Name" name="Event_Name" type="text" value="" maxlength="50" /></center>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td style="text-align:center">
			<ul></ul>
			<center><input type="submit" value="Valider"></center>
			</td>
			<td>
			</td>
		</tr>
	</table>
</form>
<div class="clear10"></div>
<div class="clearBTM"></div> 
<form name="item_send" action="admin/moderate.php" method="POST">
    <input type="hidden" value="item_send" name="action"/>
    <table class="mcenter">
		<tr>
                    <th colspan="5"><center>Add Item (Mail Send)</center></th>
		</tr>
		<tr>
			<td style="text-align:center">
			<label>CharName</label>
			</td>
			<td style="text-align:center">
			<label>ItemNo</label>
			</td>
                        <td style="text-align:center">
			<label>Count</label>
			</td>
                        <td style="text-align:center">
			<label>Descr</label>
			</td>
                        <td style="text-align:center">
			<label>Titre Event</label>
			</td>
		</tr>
		<tr>
			<td>
			<center><input name="character" class="GM" type="text" value="" maxlength="20" style="
    width: 100px;"></center>
			</td>
			<td>
			<center><input name="itemno" type="text" value="" maxlength="20" style="
    width: 100px;
"></center>
			</td>
                        <td>
                        <center><input name="count" type="number" value="1"/></center>
			</td>
                        <td>
                        <center><input name="gold" type="number" value="0"/></center>
			</td>
                        <td>
			<center><input name="Event_Name" type="text" value="" maxlength="40" style="
    width: 54px;
    margin-left: 21px;
"></center>
			</td>
		</tr>
		<tr>
			<td colspan="5" style="text-align:center">
			<ul></ul>
			<center><input type="submit" value="Envoyer"></center>
			</td>
		</tr>
	</table>
</form>
<a href="<?php echo $lgm_clear ?>"><button>Retour</button></a>