<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 13-11-15 - 14:51
 */
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