<div id="contentvak" style='background: black;'>

<?php
if(empty($_GET['project'])){
$query = $database->query("SELECT * FROM `".$config->dbinfo['prefix']."_project` order by id desc limit 1");
				while($row = $database->fetch_assoc($query)){
				$projectid = $row['id'];
				
				$query2 = $database->query("SELECT * FROM `".$config->dbinfo['prefix']."_project_screenshots` where projectid='".$projectid."'");
				$row2 = $database->fetch_assoc($query2);
									echo "
						<div class='OntwikkelaarsRight' style='width: 930px; margin-left: 8px; margin-top: 7px;'>
							
							<div class='OntwikkelaarsRightBig' style='float: left;'><a href='".$row['link']."'><img src='" . $row2['afbeelding_url'] . "' class='BorderRadius ImageBig'></a></div>
							<div class='OntwikkelaarsRightBig2' style='float: left; margin-left: 5px;'><strong>" . $row['titel'] . "</strong><br /><br />
								" . $row['omschrijving'] . "<br /><br />
							";

							echo "</div></div>";
					}
					} else {
						$projectid = $_GET['project'];
					$query = $database->query("SELECT * FROM `".$config->dbinfo['prefix']."_project` where id='".$_GET['project']."' order by id desc limit 1");
				while($row = $database->fetch_assoc($query)){
				$projectid = $row['id'];
				
				$query2 = $database->query("SELECT * FROM `".$config->dbinfo['prefix']."_project_screenshots` where projectid='".$projectid."'");
				$row2 = $database->fetch_assoc($query2);

						echo "
						<div class='OntwikkelaarsRight' style='width: 930px; margin-left: 8px; margin-top: 7px;'>
						
							<div class='OntwikkelaarsRightBig' style='float: left;'><a href='".$row['link']."'><img src='" . $row2['afbeelding_url'] . "' class='BorderRadius ImageBig'></a></div>
							<div class='OntwikkelaarsRightBig2' style='float: left; margin-left: 5px;'><strong>" . $row['titel'] . "</strong><br /><br />
								" . $row['omschrijving'] . "<br /><br />
							";
							
							echo "</div></div>";
					}
					}
					?>
					
<div class="spacer"></div>
<div>
	<div style='margin-left: 20px; float: left;'>
		<strong style='color: white;'>Enkele projecten:</strong>
	</div>
	<div style='margin-left: 63px; float: left;'>
		<strong style='color: white;'>Medewerkers van dit project</strong>
	</div>
</div>
<br style='clear: both;' />
	<div class="ContentLeft" style='margin-top: 10px; width: 160px;'>
	
		<?php
				$query = $database->query("SELECT * FROM `".$config->dbinfo['prefix']."_project` where id != '".$projectid."' order by id desc");
				while($row = $database->fetch_assoc($query)){
				$query2 = $database->query("SELECT * FROM `".$config->dbinfo['prefix']."_project_screenshots` where projectid = '".$row['id']."' order by projectid desc");
				$row2 = $database->fetch_assoc($query2);
				
					echo "<div class='BorderRadius employee' style='margin-top: 0px;'>
							<div class=\"img\">
								<a href='site.php?id=3&project=" . $row['id'] . "'><img src='" . $row2['afbeelding_url'] . "' class='ImageSmall' style='width: 160px;'></a>
							</div>
							<div class=\"name\">
								<a href='site.php?id=3&project=" . $row['id'] . "' style='color: white;'>" . $row['titel'] . "</a>
							</div>
							<div style='height: 10px; width: 100%;'></div>
						</div>
					";
				}
		?>
	
		
	</div>

	<div class="ContentRight" style='margin-left: 6px; width: 780x;'>
		<?php
						
				$query = $database->query("SELECT distinct(werknemerid) FROM `".$config->dbinfo['prefix']."_project_werknemer` where projectid = '".$projectid."' order by projectid desc");
				while($row = $database->fetch_assoc($query)){
					$query2 = $database->query("SELECT * FROM `".$config->dbinfo['prefix']."_werknemer` where id = '".$row['werknemerid']."'");
					$row = $database->fetch_assoc($query2);
					echo "
						<div class='OntwikkelaarsRight' style='width: 738px;'>
							<div style='padding: 4px;'>
							<div style='float: left;'><img src='" . $row['afbeelding'] . "' class='BorderRadius' style='width: 150px;'>
<div style='height: 5px; width: 100%;'></div>
							</div>
							<div style='float: left; margin-left: 5px;'><strong>" . $row['voornaam'] . " " . $row['tussenvoegsel'] . " " . $row['achternaam'] . "</strong><br /><br />
								" . substr($row['omschrijving'],0,250) . "...<br /><br />
								<a href='site.php?id=4&werknemer=" . $row['id'] . "'>Lees meer >></div>
							</a>
							</div>	
						</div>
					";
				}
		?>
	</div>
</div>
