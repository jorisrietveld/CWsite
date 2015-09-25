<?php
	require_once('../config.php');
	require_once('../classes/database.php');
	$database = new database($config->dbinfo["server"],$config->dbinfo["dbuser"],$config->dbinfo["dbpass"],$config->dbinfo["dbname"]);

	switch(@$_GET['id']){
		default: case 1:
			if(file_exists("nieuws.php")){ include("nieuws.php"); } else { echo 'Pagina niet gevonden.'; }
		break;
		
		case 2:
			if(file_exists("projecten.php")){ include("projecten.php"); } else { echo 'Pagina niet gevonden.'; }
			break;
		
		case 3:
			if(file_exists("ontwikkelaars.php")){ include("ontwikkelaars.php"); } else { echo 'Pagina niet gevonden.'; }
			break;
			
		case 4:
			if(file_exists("beheer.php")){ include("beheer.php"); } else { echo 'Pagina niet gevonden.'; }
			break;

		case 5:
			if(file_exists("beheer2.php")){ include("beheer2.php"); } else { echo 'Pagina niet gevonden.'; }
			break;
			
		case 6:
			if(file_exists("uitloggen.php")){ include("uitloggen.php"); } else { echo 'Pagina niet gevonden.'; }
			break;
	}
?>