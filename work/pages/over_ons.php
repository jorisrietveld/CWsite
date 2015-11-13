<script src="js/jquery.slide.js"></script>
<script>
	$(document).ready(function(){
		$('#slider').slide();
	});
</script>
<div id="slider">
	<h2>Laatste <font class='white'>nieuws</font></h2>
	<ul id="slider_container">
	<?php include( "views/newsSlider.php" ); ?>
    </ul>
</div>

<?php include("views/WebPageTemplate.php") ?>