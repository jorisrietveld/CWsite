<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 13-11-15 - 14:51
 */
try
{
	$newsTable    = new \CWSite\Models\Storage\NewsTable( $database );
	$newsArticles = $newsTable->getAllActiveArticles();

	foreach( $newsArticles as $newsArticle )
	{
		$title = $newsArticle[ "title" ];
		// Cut the first 240 chars from the article as an preview.
		$content = substr( $newsArticle[ "article" ], 0, 240 ) . "...";
		// Before including the image check if it exists if not set the image to the default.
		$image   = file_exists( $newsArticle[ "image" ] ) ? "<img src=\"" . $newsArticle[ "image" ] . "\"/>" : "<img src=\"images/nieuws/slider_empty.jpg\"/>";

		echo "
				<li>
					<div class=\"nieuws_image\">
						{$image}
					</div>

					<div class=\"content\">
						<h3>{$title}</h3>
						{$content}
					</div>
				</li>";
	}
}
catch( Exception $e )
{
	//TODO handle error properly and log the exception.
	if(CAMPUSWERK_SITE_DEBUG_LEVEL)
	{
		var_dump( $e );
	}
}