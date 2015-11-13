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
		?>
	</ul>
</div>

<div id="contentvak">
	<?php

	try{
		$projectTable = new \CWSite\Models\Storage\ProjectsTable( $database );

		$projects = $projectTable->getAllActiveProjects( "`id` DESC", "3" );

		if( count( $projects) >2 )
		{
			$projectHtml = "<h2>Recente <font class='highlight'>projecten</font></h2>";

			foreach( $projects as $project )
			{
				$projectId = $project["id"];
				$projectTitle = $project["title"];
				$projectImageUrl = $project["image"];

				$projectHtml .= "
					<div class=\"project\">
						<div class='projectimage'>
							<div class='alignmiddle'>
								<a href='site.php?id=3&project={$projectId}'><img src='{$projectImageUrl}'/></a>
							</div>
						</div>
						<span class='titel'>{$projectTitle}</span>
					</div>";
			}
		}
		else
		{
			echo "no projects found.";
		}
	}
	catch (Exception $e )
	{
		//TODO handle error properly and log the exception.
		if(CAMPUSWERK_SITE_DEBUG_LEVEL)
		{
			var_dump( $e );
		}
	}
	?>
</div>