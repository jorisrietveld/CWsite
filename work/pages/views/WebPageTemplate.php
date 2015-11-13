<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 13-11-15 - 16:46
 */

$webPageTable = new \CWSite\Models\Storage\WebPageTable( $database );
$webPage  = $webPageTable->getWebPageBySwitchId( $_GET[ "id" ] );

$webPageImage   = $webPage[ "image" ];
$webPageContent = $webPage[ "content" ];

echo "
<div id=\"contentvak\">
	<div class=\"ContentLeft\" style='background-color: #FFFFFF !important;'>
		<img src=\"{$webPageImage}\">
	</div>
	<div class=\"ContentRight\">
		{$webPageContent}
	</div>
</div>
";
?>