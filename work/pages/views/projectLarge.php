<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 13-11-15 - 17:08
 */

$projectTable = new \CWSite\Models\Storage\ProjectsTable( $database );

try
{
	if( isset( $_GET[ "project" ] ) )
	{
		$projects = $projectTable->getProjectById( $_GET[ "project" ] );

		if( count( $projects ) )
		{
			$projects = [$projects];
		}
		else
		{
			exit();
		}
	}
	else
	{
		$projects = $projectTable->getAllProjects();
	}

	foreach( $projects as $project )
	{
		$link        = $project[ "link" ];
		$image       = $project[ "image" ];
		$title       = $project[ "title" ];
		$description = $project[ "description" ];

		echo "
		<div class='OntwikkelaarsRight' style='width: 930px; margin-left: 8px; margin-top: 7px;'>
			<div class='OntwikkelaarsRightBig' style='float: left;'>
				<a href='{$link}'>
					<img src='{$image}' class='BorderRadius ImageBig'>
				</a>
			</div>
			<div class='OntwikkelaarsRightBig2' style='float: left; margin-left: 5px;'>
				<strong>{$title}</strong><br /><br />{$description}<br /><br />
			</div>
		</div>";
	}
}
catch( Exception $e )
{
	//todo properly log the exception.
	if( CAMPUSWERK_SITE_DEBUG_LEVEL )
	{
		var_dump( $e );
	}
}
?>