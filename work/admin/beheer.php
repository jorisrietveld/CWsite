<style>
	a {
		color: black;
		text-decoration: none;
	}

	.checkboxDiv label {
		display: block;
		width: 16px;
		height: 16px;
		border-radius: 100px;
		margin: 5px;
		margin-top: 7px;
		position: relative;

		-webkit-transition: all .5s ease;
		-moz-transition: all .5s ease;
		-o-transition: all .5s ease;
		-ms-transition: all .5s ease;
		transition: all .5s ease;
		cursor: pointer;
		z-index: 1;

		background: red;

		-webkit-box-shadow:inset 0px 1px 3px rgba(0,0,0,0.5);
		-moz-box-shadow:inset 0px 1px 3px rgba(0,0,0,0.5);
		box-shadow:inset 0px 1px 3px rgba(0,0,0,0.5);
	}

	.checkboxDiv input[type=checkbox]:checked + label {
		background: #26ca28;
	}

	input[type=checkbox]{
		display: none;
	}

</style>

<?php
if(!empty($_POST)){
    $query = $database->query("DELETE FROM `".$config->dbinfo['prefix']."_project_werknemer` where `werknemerid`='".$_GET['pid']."'");
    foreach($_POST['projecten'] as $project){
    	$query = $database->query("INSERT INTO `".$config->dbinfo['prefix']."_project_werknemer` (projectid,werknemerid) VALUES ('".$project."','".$_GET['pid']."')");
    }
    echo 'Projecten aangepast.<br />';
}
?>

<?php if(empty($_GET['pid'])){
    echo 'Kies eerst een medewerker of project in onderstaande lijst:<hr>';
}
?>

<div style='float: left; margin-left: 10px; margin-top: 10px;'>
<?php
$query = $database->query("SELECT id, voornaam, tussenvoegsel, achternaam FROM `".$config->dbinfo['prefix']."_werknemer` order by `id`");
while($user = $database->fetch_assoc($query)){
    echo "- <a href='".$dir."admin/?id=4&pid=".$user['id']."'>";
if(@$_GET['pid'] == $user['id']){
    echo '<strong> '.$user['voornaam'].' '.$user['tussenvoegsel'].' '.$user['achternaam'].'</strong>';
} else {
    echo $user['voornaam'].' '.$user['tussenvoegsel'].' '.$user['achternaam'];
}
echo '</a><br />';
}
?>
</div>



<div style='float: left; margin-left: 50px; margin-top: 10px;'>
<form method="post">
<?php
$query2 = $database->query("SELECT id, titel FROM `".$config->dbinfo['prefix']."_project` order by `id`");
while($project = $database->fetch_assoc($query2)){
	if(!empty($_GET['pid'])){
		$query = $database->query("SELECT projectid, werknemerid FROM `".$config->dbinfo['prefix']."_project_werknemer` where `werknemerid`='".$_GET['pid']."' and `projectid`='".$project['id']."'");
    	if($database->num_rows($query) != 0){ $checkbox = ' checked'; } else { $checkbox=''; }
    	echo "
<div class='checkboxDiv' style='clear: both;'><div style='float: left;'><input type='checkbox' value='".$project['id']."' id='checkbox".$project['id']."' name='projecten[]'".$checkbox."><label for='checkbox".$project['id']."'></label></div><div style='float: left;'><a href='".$dir."admin/?id=5&pid=".$project['id']."'>".$project['titel']."</a></div></div>


    	";
	} else {
		echo "<a href='".$dir."admin/?id=5&pid=".$project['id']."'>".$project['titel']."</a><br />";
	}
}
?>
<input type="hidden" value="OmdatHetKan" name="ZoalsIkAlZei...OmdatHetKan">
<br /><input type="submit" value="Update" style='margin-top: 10px;'>
</form>
</div>

<div style='clear: both;'></div>