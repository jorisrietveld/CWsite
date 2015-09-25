<?php
require_once('FileLocation.class.php');

$location = new FileLocation('site'); // Voor welk project willen we kijken.
	echo "dirPath: ".$location->dirPath()."<br />\n";
	echo "httpPath: ".$location->httpPath()."<br />\n";
	echo "uploadByID: <pre>".print_r($location->uploadByID(1))."</pre>\n";
	echo "uploadsByUserID: <pre>".print_r($location->uploadsByUserID(4))."</pre>\n";
	echo "getUserFileByID: ".$location->getUserFileByID(1)."<br />\n";
	echo "getStoredFileByID: ".$location->getStoredFileByID(1)."<br />";

	echo "<img src='" . $location->httpPath() . $location->getStoredFileByID(1) . "' title='" . $location->httpPath() . $location->getStoredFileByID(1) . "'>";