<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
require_once('../config.php');
include("includes/head.php");
?>
</head>
<body>
	<div id="container">
    	<div id="logocontainer">
        	<?php
			if(!isset($_COOKIE['theme'])){
				echo '<img id="logo" src="'.$dir.'img/logo_default.png"/>';
			} else {
				echo '<img id="logo" src="'.$dir.'img/logo_'.$_COOKIE['theme'].'.png"/>';
			}
			?>
        </div>
    
    	<div id="nav">
        	<ul>
            	<div id="menublock_selected"></div>
                <?php
					include("includes/menu.php");
				?>
            </ul>
        </div>
        
        <div id="colorswitcher" style='margin-right:8px; margin-top:2px;'>
        	<div class="red"></div>
            <div class="green"></div>
            <div class="blue"></div>
        </div>
        
        <?php
		if(isset($_GET['id'])){
			$paginaid = $_GET['id'];
		} else {
			$paginaid = "1";
		}
		$hide = array('3','4');
		if(!in_array($paginaid,$hide)){
		}
		?>
        
       <?php include("includes/content.php"); ?>
    </div>
</body>
</html>