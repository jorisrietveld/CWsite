<?php
/*
Klaar, en... kan straks ook allemaal weer anders...
*/
if(empty($_POST)){
	if(empty($_GET['wid'])){
		$query = $database->query("SELECT id, gebruikersnaam, wachtwoord, voornaam, tussenvoegsel, achternaam, level, omschrijving, afbeelding FROM `".$config->dbinfo['prefix']."_werknemer` order by id desc");
		echo "<table style='border-collapse: collapse; width: 960px;'>
			<tr style='border-bottom: 1px solid black;'><td><strong>Naam</strong></td><td><strong>Omschrijving</strong></td><td><strong>Afbeelding</strong></td><td><strong>Bewerk medewerker</strong></td></tr>";
		while($medewerker = $database->fetch_assoc($query)){
			echo "<tr style='padding-bottom: 3px; border-bottom: 1px dotted black;'><td valign='top' width='150'>".$medewerker['voornaam']." ".$medewerker['tussenvoegsel']." ".$medewerker['achternaam']."(".$medewerker['gebruikersnaam'].")</td><td valign='top'>".substr(wordwrap($medewerker['omschrijving'], 80, "<br />"), 0, 150);
			if(strlen($medewerker['omschrijving']) > 150){
				echo '...';
			}
			echo "</td><td valign='top'><a href='".$medewerker['afbeelding']."' target='_blank'>".$medewerker['afbeelding']."</a></td><td valign='top'><center><a href='admin/index.php?id=3&wid=".$medewerker['id']."'><img src='img/edit.png'></a></center></td></tr>";
		}
		echo "<table><br /><strong>medewerker toevoegen:</strong><hr>";
		?>
		<form method='post'>
			<table>
			<tr>
					<td>
						Gebruikersnaam:
					</td>
					<td>
						<input name='gebruikersnaam' style='width: 800px;'>
					</td>
				</tr>
			<tr>
					<td>
						Voornaam:
					</td>
					<td>
						<input name='voornaam' style='width: 800px;'>
					</td>
				</tr>

				<tr>
					<td>
						Tussenvoegsel:
					</td>
					<td>
						<input name='tussenvoegsel' style='width: 800px;'>
					</td>
				</tr>

				<tr>
					<td>
						Achternaam:
					</td>
					<td>
						<input name='achternaam' style='width: 800px;'>
					</td>
				</tr>
				
				<tr>
					<td>
						Omschrijving:
					</td>
					<td>
						<textarea style='width: 800px;' cols='100' name='omschrijving'></textarea>
					</td>
				</tr>
				<tr>
					<td>
						Afbeelding:
					</td>
					<td>
						<input name='afbeelding' style='width: 800px;'>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input name='submit' style='width: 800px;' type='submit' value='Voeg medewerker toe'>
					</td>
				</tr>
			</table>
		</form>

		<?php
	} else {
		$query = $database->query("SELECT * FROM `".$config->dbinfo['prefix']."_werknemer` where id='".$_GET['wid']."'");
		$info = $database->fetch_assoc($query);

		?>

<form method='post'>
<table>
	<tr>
		<td>
			Voornaam
		</td>
		<td>
			<input name="voornaam" value="<?php echo $info['voornaam']; ?>">
		</td>
	</tr>
	<tr>
		<td>
			Tussenvoegsel
		</td>
		<td>
			<input name="tussenvoegsel" value="<?php echo $info['tussenvoegsel']; ?>">
		</td>
	</tr>
	<tr>
		<td>
			Achternaam
		</td>
		<td>
			<input name="achternaam" value="<?php echo $info['achternaam']; ?>">
		</td>
	</tr>
	<tr>
		<td>
			Omschrijving
		</td>
		<td>
			<textarea name="omschrijving" rows="10" style="width: 800px; text-align: left;"><?php echo $info['omschrijving']; ?></textarea>
		</td>
	</tr>
	<tr>
		<td>
			Afbeelding
		</td>
		<td>
			<input name="afbeelding" value="<?php echo $info['afbeelding']; ?>">
		</td>
	</tr>

	<tr>
		<td>
			
		</td>
		<td>
			<input type="submit" value="Update medewerker">
		</td>
	</tr>
</table>
</form>
		<?php
	}
} else {
	if(isset($_POST['gebruikersnaam'])){
	$query = $database->query("INSERT INTO `".$config->dbinfo['prefix']."_werknemer` (gebruikersnaam, voornaam, tussenvoegsel, achternaam, omschrijving, afbeelding) VALUES ('".$_POST['gebruikersnaam']."','".$_POST['voornaam']."','".$_POST['tussenvoegsel']."','".$_POST['achternaam']."','".$_POST['omschrijving']."','".$_POST['afbeelding']."')");
	echo 'medewerker toegevoegd.';
} else {
	$query = $database->query("update `".$config->dbinfo['prefix']."_werknemer` set voornaam='".$_POST['voornaam']."',tussenvoegsel='".$_POST['tussenvoegsel']."',achternaam='".$_POST['achternaam']."',omschrijving='".$_POST['omschrijving']."',afbeelding='".$_POST['afbeelding']."' where id='".$_GET['wid']."'");
	echo 'medewerker aangepast.';
}
}