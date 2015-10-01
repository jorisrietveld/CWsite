<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 1-10-15 - 14:01
 */

if( isset( $_GET[ "id" ] ) )
{
	switch( $_GET[ "id" ] )
	{
		default: case 1:
			// Home pagina
			$page = CAMPUSWERK_SITE_PAGES_DIR . "home.php";
		break;

		case 2:
			//over ons pagina
			$page = CAMPUSWERK_SITE_PAGES_DIR . "over_ons.php";
		break;

		case 3:
			//projecten pagina
			$page = CAMPUSWERK_SITE_PAGES_DIR . "projecten.php";
		break;

		case 4:
			//ontwikkelaars pagina
			$page = CAMPUSWERK_SITE_PAGES_DIR . "ontwikkelaars.php";
		break;

		case 5:
			//contact pagina
			$page = CAMPUSWERK_SITE_PAGES_DIR . "contact.php";
		break;
	}
}
else
{
	$page = CAMPUSWERK_SITE_PAGES_DIR . "home.php";
}