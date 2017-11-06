<?php
$server = mysqli_connect("sql208.epizy.com", "epiz_20983631", "ronaldo07"); 
$db = mysqli_select_db($server, "epiz_20983631_DMT");

if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>