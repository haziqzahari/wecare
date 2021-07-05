<?php
 
$servername = "lrgs.ftsm.ukm.my";
$username = "a163388";
$password = "smallpurplefrog";
$dbname = "a163388";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
	echo "Database connection failed".mysqli_connect_error();
	}

mysqli_query($conn,"set character_set_server 'utf8'");
mysqli_query($conn,"SET NAMES 'utf8'");
 
?>