<?php
//todo[ edit joris]

// First require an configuration file with some constants.
require( "constants.php" );

// Then require an file that will register the composer autoloader.
require( CAMPUSWERK_SITE_COMPOSER_DIR . "autoload.php" );

?>
<!DOCTYPE html "site created by campuswerk">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Softwarehuis NP</title>
	<script src="js/jquery.js"></script>
	<script src="js/jquery.cookie.js"></script>
	<script src="js/jquery.slidemenu.js"></script>
	<script src="js/jquery.themeswitcher.js"></script>
	<script>
		$(document).ready(function () {
			$('#nav').slidemenu();
		});
	</script>
	<link href="css/style.css" rel="stylesheet" type="text/css"/>
	<link id="theme" href="css/theme_default.css" rel="stylesheet" type="text/css"/>

	<?php
		$script = '<script>$(document).ready(function(){ $(\'#colorswitcher .' . $_COOKIE[ 'theme' ] . '\').trigger(\'click\'); });</script>';
		echo isset( $_COOKIE[ "theme" ] ) ? $script : '';
	?>

</head>
<body>
<div id="container">
	<div id="logocontainer">
		<?php
		if( !isset( $_COOKIE[ 'theme' ] ) )
		{
			echo '<img id="logo" src="img/logo_default.png"/>';
		}
		else
		{
			echo '<img id="logo" src="img/logo_' . $_COOKIE[ 'theme' ] . '.png"/>';
		}
		?>
	</div>

	<div id="nav">
		<ul>
			<div id="menublock_selected"></div>
			<?php
			include( "includes/menu.php" );
			?>
		</ul>
	</div>

	<div id="colorswitcher" style='margin-right:8px; margin-top:2px;'>
		<div class="red"></div>
		<div class="green"></div>
		<div class="blue"></div>
	</div>

	<?php
	//TODO replace this
	if( isset( $_GET[ 'id' ] ) )
	{
		$paginaid = $_GET[ 'id' ];
	}
	else
	{
		$paginaid = "1";
	}
	$hide = [ '3', '4' ];
	if( !in_array( $paginaid, $hide ) )
	{
		?>
		<div id="headerimg">
			<img src="img/header.jpg"/>
		</div>
		<?php
	}
	?>

	<?php
	/**
	 * Determine what page must be included. (set the $page variable to the path)
	 */
	require( "includes/pageSwitch.php" );

	/**
	 * Check if the page variable holds an valid path to the web page if so include the webpage.
	 */
	if( isset( $page ) && is_file( $page ) )
	{
		include( $page );
	}
	else
	{
		$message = \CWSite\Helper\Message::getMessage("website.errors.pageNotFound", [ $page ] );
		echo "<div id=\"contentvak\" style='min-height:100px;height: 100px'>" . $message . "</div>>";
	}
	?>
</div>
</body>
</html>
