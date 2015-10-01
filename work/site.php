<?php // Edit by joris

// First require an configuration file with some constants.
require( "constants.php" );

// Then require an file that will register the composer autoloader.
require( CAMPUSWERK_SITE_COMPOSER_DIR . "autoload.php" );

?>
<!DOCTYPE html "site created by campuswerk">
<html>
<head>
	<?php
	include( "includes/head.php" );//test
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

	<?php include( "includes/content.php" ); ?>

</div>
</body>
</html>
