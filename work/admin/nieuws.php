<?php

if(empty($_POST)){
	if(empty($_GET['nid'])){
		$query = $database->query("SELECT id, titel, content, afbeelding, volgorde, active FROM `".$config->dbinfo['prefix']."_nieuws` order by id desc");
		echo "<table style='border-collapse: collapse; width: 960px;'>
			<tr style='border-bottom: 1px solid black;'><td><strong>Titel</strong></td><td><strong>Content</strong></td><td><!--Afbeelding URL--></td><td><strong>Verwijder artikel</strong></td></tr>";
		while($nieuws = $database->fetch_assoc($query)){
			echo "<tr style='padding-bottom: 3px; border-bottom: 1px dotted black;'><td valign='top' width='150'>".$nieuws['titel']."</td><td valign='top'>".substr(wordwrap($nieuws['content'], 80, "<br />"), 0, 150);
			if(strlen($nieuws['content']) > 150){
				echo '...';
			}
			echo "</td><td valign='top'><!--".$nieuws['afbeelding']."--></td><td valign='top'><center><a href='admin/index.php?nid=".$nieuws['id']."'><img src='img/delete.gif'></a></center></td></tr>";
		}
		echo "<table><br /><strong>Nieuws toevoegen:</strong><hr>";
		?>
		<form method='post'>
			<table>
				<tr>
					<td>
						Titel:
					</td>
					<td>
						<input name='titel' style='width: 796px;'>
					</td>
				</tr>
				<tr>
					<td>
						Content:
					</td>
					<td>
						<textarea style='width: 794px;' cols='100' name='content'></textarea>
					</td>
				</tr>
				<tr>
					<td>
						Afbeelding:
					</td>
					<td>
						<input name='afbeelding' style='width: 796px;'>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input name='submit' style='width: 800px;' type='submit' value='Voeg artikel toe'>
					</td>
				</tr>
			</table>
		</form>

		<?php
	} else {
		$query = $database->query("DELETE FROM `".$config->dbinfo['prefix']."_nieuws` where id='".$_GET['nid']."'");
		echo "Artikel met ID ".$_GET['nid']." is verwijderd!<br /><a href='admin/index.php'>Klik hier om terug te gaan.</a>";
	}
} else {
	$query = $database->query("INSERT INTO `".$config->dbinfo['prefix']."_nieuws` (titel, content, afbeelding) VALUES ('".$_POST['titel']."','".$_POST['content']."','".$_POST['afbeelding']."')");
	echo 'Artikel toegevoegd.';
}