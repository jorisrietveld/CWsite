<?php
if(empty($_POST)){
	if(empty($_GET['pid'])){
		$query = $database->query("SELECT id, projectcode, titel, omschrijving, link FROM `".$config->dbinfo['prefix']."_project` order by id desc");
		echo "<table style='border-collapse: collapse; width: 960px;'>
			<tr style='border-bottom: 1px solid black;'><td><strong>Titel</strong></td><td><strong>Omschrijving</strong></td><td><strong>Link</strong></td><td><strong>Bewerk project</strong></td></tr>";
		while($project = $database->fetch_assoc($query)){
			echo "<tr style='padding-bottom: 3px; border-bottom: 1px dotted black;'><td valign='top' width='150'>".$project['titel']."</td><td valign='top'>".substr(wordwrap($project['omschrijving'], 80, "<br />"), 0, 150);
			if(strlen($project['omschrijving']) > 150){
				echo '...';
			}
			echo "</td><td valign='top'>".$project['link']."</td><td valign='top'><center><a href='admin/index.php?id=2&pid=".$project['id']."'><img src='img/edit.png'></a></center></td></tr>";
		}
		echo "<table><br /><strong>project toevoegen:</strong><hr>";
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
						Omschrijving:
					</td>
					<td>
						<textarea style='width: 794px;' cols='100' name='omschrijving'></textarea>
					</td>
				</tr>
				<tr>
					<td>
						Link:
					</td>
					<td>
						<input name='link' style='width: 796px;'>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input name='submit' style='width: 800px;' type='submit' value='Voeg project toe'>
					</td>
				</tr>
			</table>
		</form>

		<?php
	} else {
		$query = $database->query("SELECT * FROM `".$config->dbinfo['prefix']."_project` where id='".$_GET['pid']."'");
		$info = $database->fetch_assoc($query);

		$query2 = $database->query("SELECT * FROM `".$config->dbinfo['prefix']."_project_screenshots` where id='".$_GET['pid']."'");
		$info2 = $database->fetch_assoc($query2);
		?>

<form method='post'>
<table>
	<tr>
		<td>
			Titel
		</td>
		<td>
			<input name="titel" value="<?php echo $info['titel']; ?>">
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
			Link
		</td>
		<td>
			<input name="link" value="<?php echo $info['link']; ?>">
		</td>
	</tr>

	<tr>
		<td>
			Afbeelding
		</td>
		<td>
			<input name="afbeelding_url" value="<?php echo $info2['afbeelding_url']; ?>">
		</td>
	</tr>
	<tr>
		<td>
			
		</td>
		<td>
			<input type="submit" value="Update project">
		</td>
	</tr>
</table>
</form>
		<?php
	}
} else {
	if(!isset($_POST['afbeelding_url'])){
	$query = $database->query("INSERT INTO `".$config->dbinfo['prefix']."_project` (titel, omschrijving, link) VALUES ('".$_POST['titel']."','".$_POST['omschrijving']."','".$_POST['link']."')");

	$pidQry = $database->query("SELECT id FROM `".$config->dbinfo['prefix']."_project` order by id desc");
	$pid = $database->fetch_assoc($pidQry);

	$query = $database->query("INSERT INTO `".$config->dbinfo['prefix']."_project_screenshots` (projectid, afbeelding_url) VALUES ('".$pid['id']."','')");
	
	echo 'Project toegevoegd.';
} else {
	$query = $database->query("update `".$config->dbinfo['prefix']."_project` set titel='".$_POST['titel']."',omschrijving='".$_POST['omschrijving']."',link='".$_POST['link']."' where id='".$_GET['pid']."'");
	$query = $database->query("update `".$config->dbinfo['prefix']."_project_screenshots` set afbeelding_url='".$_POST['afbeelding_url']."' where id='".$_GET['pid']."'");
	echo 'Project aangepast.';
}
}