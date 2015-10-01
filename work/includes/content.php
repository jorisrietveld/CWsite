<?php
	switch( $_GET['id'])
	{
		default: case 1:
			//home
			include("includes/pages/home.php");
		break;
		
		case 2:
			//over ons
			include("includes/pages/over_ons.php");
		break;
		
		case 3:
			//projecten
			include("includes/pages/projecten.php");
		break;
			
		case 4:
			//ontwikkelaars
			include("includes/pages/ontwikkelaars.php");
		break;
			
		case 5:
			//contact
			include("includes/pages/contact.php");
		break;
	}
?>