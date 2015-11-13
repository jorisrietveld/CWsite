<script src="js/jquery.slide.js"></script>
<script>
	$(document).ready(function () {
		$('#slider').slide();
	});
</script>
<div id="slider">
	<h2>Laatste <font class='highlight'>nieuws</font></h2>
	<ul id="slider_container">
		<?php
		include( "views/newsSlider.php" );
		?>
	</ul>
</div>

<div id="contentvak">
	<?php
	include( "views/projectPreview.php" );
	?>
</div>