<script src="js/jquery.slide.js"></script>
<script>
	$(document).ready(function(){
		$('#slider').slide();
	});
</script>
<div id="slider">
	<h2>Laatste <font class='highlight'>nieuws</font></h2>
	<ul id="slider_container">
	<?php

	try
	{
		$newsTable = new \CWSite\Models\Storage\NewsTable( $database );
		$newsArticles = $newsTable->getAllActiveArticles();

		foreach( $newsArticles as $newsArticle )
		{

		}
	}
	catch ( Exception $e )
	{

	}

		$query = $database->query("SELECT `id`,`titel`,`content`,`afbeelding` FROM `".$config->dbinfo['prefix']."_nieuws` WHERE `active` = '1' ORDER BY `volgorde` DESC");
		while($row = $database->fetch_assoc($query))
		{
			$titel = $row['titel'];
			$content = substr($row['content'],0,240)."...";
			$afbeelding = file_exists($row['afbeelding']) && !empty($row['afbeelding']) ? "<img src=\"".$row['afbeelding']."\"/>" : "<img src=\"images/nieuws/slider_empty.jpg\"/>";
			
			echo "<li>
				<div class=\"nieuws_image\">
					".$afbeelding."
				</div>
				<div class=\"content\">
					<h3>".$titel."</h3>
					".$content."
				</div>
			</li>";
		}
	?>
    </ul>
</div>

<div id="contentvak">
    <?php
		$query = $database->query("SELECT `id`,`projectcode`,`titel`,`omschrijving`,`link`,`datum_oplevering` FROM `".$config->dbinfo['prefix']."_project` ORDER BY `id` DESC LIMIT 3");
		
		if($database->num_rows($query) >= 3)
		{
			$html = "<h2>Recente <font class='highlight'>projecten</font></h2>";
			while($row = $database->fetch_assoc($query))
			{
				$query2 = $database->query("SELECT `afbeelding_url` FROM `".$config->dbinfo['prefix']."_project_screenshots` WHERE `projectid` = '".$row['id']."'");
				$row2 = $database->fetch_assoc($query2);
				$afbeelding = "images/nieuws/slider_empty.jpg";
				if($database->num_rows($query2) > 0){
					$afbeelding = $row2['afbeelding_url'];
				}
				$html .= "<div class=\"project\">
					<div class='projectimage'>
						<div class='alignmiddle'>
							<a href='site.php?id=3&project=".$row['id']."'><img src='".$afbeelding."'/></a>
						</div>
					</div>
					<span class='titel'>".$row['titel']."</span>
				</div>";
			}
			echo $html;
		}
	?>
</div>