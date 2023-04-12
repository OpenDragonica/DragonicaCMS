<form action="admin/news_post.php" method="POST">
<table id="ADD_NEWS">
	<caption id="ADD_NEWS"><h2>Ajouter une News</h2></caption>
		<TR>
			<Td>Titre:</Td>
			<Td colspan="3"><input name="title" type="text" value="" placeholder= "Titre de la News"/></td>
		</TR>
		<TR>
			<td colspan="4">Texte:</td>
		</TR>
		<TR>
		<td colspan="4" rows="2">
		<textarea rows="15" cols="50" name="texte" id="texte">Entrez votre texte</textarea>
		</td>
		</TR>
		<TR>
		<td><ul></ul>Afficher Immédiatement:</td>
		<td><ul></ul><input type="radio" name="display" value="1" checked>Oui</td>
		<td><ul></ul><input type="radio" name="display" value="0">Non</td>
		<td><ul></ul></td>
		</TR>
		<TR>
		<td style="float:right;"><input type="radio" name="type" value="1" checked><span class="badge" id="new">news</span></td>
		<td><center><input type="radio" name="type" value="2"><span class="badge" id="event">Event</span></center></td>
		<td><center><input type="radio" name="type" value="3"><span class="badge" id="maj">M.à.j</span></center></td>
		<td><center><input type="radio" name="type" value="4"><span class="badge" id="new">Promo</span></center></td>
		</TR>
		<TR>
			<Td><ul></ul>Lien Forum:</Td>
			<Td colspan="3"><input name="Flink" type="text" value="" placeholder="Lien"/></td>
		</TR>
		<input type="hidden" name="action" value="Post"/>
		<TR>
		<td colspan="4"><center><ul></ul><input type="submit" value="Envoyer"></center></td>
		</TR>
</table>
</form>