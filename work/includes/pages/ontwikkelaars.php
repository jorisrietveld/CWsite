<div id="contentvak" style='background: black;'>

<?php
error_reporting(E_ALL);
ini_set(display_errors,true);
if(empty($_GET['werknemer'])){
$query = $database->query("SELECT * FROM `".$config->dbinfo['prefix']."_werknemer` order by id desc limit 1");
				while($row = $database->fetch_assoc($query)){
				$werknemerid = $row['id'];
					echo "
						<div class='OntwikkelaarsRight' style='width: 928px; margin-left: 1%; margin-top: 5px;'>
							<a href='site.php?id=4&werknemer=" . $row['id'] . "'>
							<div style='float: left; width: 205px;'><img src='" . $row['afbeelding'] . "' style='max-width: 180px;'></div>
							<div style='float: left; margin-left: 5px; width: 650px;'>" . $row['voornaam'] . " " . $row['tussenvoegsel'] . " " . $row['achternaam'] . "<br />
								" . $row['omschrijving'] . "<br /><br />
								
								Hier de projecten waaraan gewerkt is door " . $row['voornaam'] . " " . $row['tussenvoegsel'] . " " . $row['achternaam'] . "<br />Hier de buttons met een link.
								
							</div></a>
								
						</div>
					";
					}
					} else {
					$query = $database->query("SELECT * FROM `".$config->dbinfo['prefix']."_werknemer` where id = '".$_GET['werknemer']."' order by id desc limit 1");
					$row = $database->fetch_assoc($query);
						echo "<div class='OntwikkelaarsRight' style='width: 928px; margin-left: 1%; margin-top: 5px;'>
							<a href='site.php?id=4&werknemer=" . $row['id'] . "'>
							<div style='float: left; width: 205px;'><img src='" . $row['afbeelding'] . "' style='max-width: 180px;'></div>
							<div style='float: left; margin-left: 5px; width: 650px;'>" . $row['voornaam'] . " " . $row['tussenvoegsel'] . " " . $row['achternaam'] . "<br />
								" . $row['omschrijving'] . "<br /><br />
								
								Hier de projecten waaraan gewerkt is door " . $row['voornaam'] . " " . $row['tussenvoegsel'] . " " . $row['achternaam'] . "<br />Hier de buttons met een link.
								
							</div></a>
								
						</div>";
						$werknemerid = $_GET['werknemer'];
					}
					?>
<div class="spacer"></div>
<div>
	<div style='margin-left: 20px; float: left;'>
		<strong style='color: white;'>Enkele medewerkers:</strong>
	</div>
	<div style='margin-left: 30px; float: left;'>
		<strong style='color: white;'>Projecten van deze medewerker</strong>
	</div>
</div>

	<div class="ContentLeft" style="width: 155px; margin-top: 10px; clear: left;">
		<?php
			$query = $database->query("SELECT * FROM `".$config->dbinfo['prefix']."_werknemer` order by id desc");
			while($row = $database->fetch_assoc($query)){
				echo "
					<div class='OntwikkelaarsLeft' style=' margin-left: -5px;'>
					<a href='site.php?id=4&werknemer=" . $row['id'] . "' style='font-size: 14px;'><img src='".$row['afbeelding']."' style='width: 155px;'>
						" . $row['voornaam'] . " " . $row['achternaam'] . "
							<br />
						</a>
					</div>
				";
			}
		?>
		
	</div>
	<div class="ContentRight" style="margin-left: 0px; width: 753px;">
		<?php
			if(empty($_GET['werknemer'])){
				$query = $database->query("SELECT * FROM `".$config->dbinfo['prefix']."_project_werknemer` where werknemerid='".$werknemerid."' order by id desc");
	
				if($database->num_rows($query) == 0){
					echo "<div class='OntwikkelaarsRight' style='width: 97%; margin-left: 1%;'>Deze medewerker is nog niet met een project bezig.</div>";
				}
				while($row = $database->fetch_assoc($query)){
					$query2 = $database->query("SELECT * FROM `".$config->dbinfo['prefix']."_project` where id='".$row['projectid']."'");
					$row2 = $database->fetch_assoc($query2);

					$query3 = $database->query("SELECT * FROM `".$config->dbinfo['prefix']."_project_screenshots` where projectid='".$row['projectid']."'");
					$row3 = $database->fetch_assoc($query3);

					echo "
						<div class='OntwikkelaarsRight' style='width: 97%; margin-left: 1%;'>
						<div style='margin: 5px;'>
							<a href='site.php?id=3&project=" . $row['projectid'] . "'>
							<div style='float: left; width: 205px;'><img src='" . $row3['afbeelding_url'] . "' style='max-width: 180px;'></div>
							<div style='float: left; margin-left: 5px; width: 375px;'>" . $row2['titel'] . "<br />
								" . substr($row2['omschrijving'],0,250) . "...<br /><br />
								Lees meer >>
							</div></a>
							<div style='width: 100%; height: 2px; clear: both;'></div>
								</div>
						</div>
					";
				}
			} else {
				$query = $database->query("SELECT * FROM `".$config->dbinfo['prefix']."_project_werknemer` where werknemerid='".$werknemerid."' order by id desc");
				if($database->num_rows($query) == 0){
					echo "<div class='OntwikkelaarsRight' style='width: 97%; margin-left: 1%;'>Deze medewerker is nog niet met een project bezig.</div>";
				}
				while($row = $database->fetch_assoc($query)){
					$query2 = $database->query("SELECT * FROM `".$config->dbinfo['prefix']."_project` where id='".$row['projectid']."'");
					$row2 = $database->fetch_assoc($query2);

					$query3 = $database->query("SELECT * FROM `".$config->dbinfo['prefix']."_project_screenshots` where projectid='".$row['projectid']."'");
					$row3 = $database->fetch_assoc($query3);

					echo "
						<div class='OntwikkelaarsRight' style='width: 97%; margin-left: 1%;'>
						<div style='padding: 5px;'>
							<a href='site.php?id=3&project=" . $row['projectid'] . "'>
							<div style='float: left; width: 205px;'><img src='" . $row3['afbeelding_url'] . "' style='max-width: 180px;'></div>
							<div style='float: left; margin-left: 5px; width: 375px;'>" . $row2['titel'] . "<br />
								" . substr($row2['omschrijving'],0,250) . "...<br /><br />
								Lees meer >>
							</div></a>
							<div style='height: 2px; width: 100%; clear: both;'></div>
								</div>
						</div>
					";
			}
			}
		?>
	</div>
</div>