<script src="js/jquery.slide.js"></script>
<script>
	$(document).ready(function(){
		$('#slider').slide();
	});
</script>
<div id="slider">
	<h2>Laatste <font class='white'>nieuws</font></h2>
	<ul id="slider_container">
	<?php
		$query = $database->query("SELECT `id`,`titel`,`content`,`afbeelding` FROM `".$config->dbinfo['prefix']."_nieuws` ORDER BY `volgorde` DESC");
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
	<div class="ContentLeft">
		<?php
			$query = $database->query("SELECT `value` FROM `".$config->dbinfo['prefix']."_pagina_variabel` where `paginaid`='" . mysql_real_escape_string($_GET['id']) . "' and `variabel_naam`='image'");
			$row = $database->fetch_assoc($query);
		?>
		<img src="<?php echo $row['value']; ?>">
	</div>
	<div class="ContentRight">
		<?php
			$query = $database->query("SELECT `value` FROM `".$config->dbinfo['prefix']."_pagina_variabel` where `paginaid`='" . mysql_real_escape_string($_GET['id']) . "' and `variabel_naam`='text'");
			$row = $database->fetch_assoc($query);
			echo $row['value'];
		?>
	</div>
</div>