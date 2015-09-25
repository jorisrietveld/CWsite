<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Softwarehuis NP</title>

<base href="/site/work/"></base>

<script src="js/jquery.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/jquery.slidemenu.js"></script>
<script src="js/jquery.themeswitcher.js"></script>
<script>
	$(document).ready(function(){
		$('#nav').slidemenu();
	});
</script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link id="theme" href="css/theme_default.css" rel="stylesheet" type="text/css" />
<style>
#nav ul {
	width: 570px !important;
}
</style>
<?php
if(isset($_COOKIE['theme'])){
	echo '<script>$(document).ready(function(){ $(\'#colorswitcher .'.$_COOKIE['theme'].'\').trigger(\'click\'); });</script>';
}
?>