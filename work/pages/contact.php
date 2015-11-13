<script src="js/jquery.slide.js"></script>
<script>
	$(document).ready(function () {
		$('#slider').slide();
	});
</script>
<div id="slider">
	<h2>Laatste <font class='white'>nieuws</font></h2>
	<ul id="slider_container">
		<?php include( "views/newsSlider.php" ); ?>
	</ul>
</div>

<?php include( "views/WebPageTemplate.php")
/*$webPageTable = new \CWSite\Models\Storage\WebPageTable( $database );
$contactPage  = $webPageTable->getWebPageBySwitchId( $_GET[ "id" ] );

$contactPageImage   = $contactPage[ "image" ];
$contactPageContent = $contactPage[ "content" ];

echo "
<div id=\"contentvak\">
	<div class=\"ContentLeft\" style='background-color: #FFFFFF !important;'>
		<img src=\"{$contactPageImage}\">
	</div>
	<div class=\"ContentRight\">
		{$contactPageContent}
	</div>
</div>
";*/
?>