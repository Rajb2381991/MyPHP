<?php
	$conn = mysql_connect("localhost","root","") or die('Error in DB');
	mysql_select_db("dbsample",$conn) or die('Error Selecting DB');
	date_default_timezone_set("Asia/Kolkata");
?>