<?php
header("access-control-allow-origin: *");
@$url = $_SERVER[REQUEST_URI];

	$mysql_db_hostname = "localhost";
	$mysql_db_user = "root";
	$mysql_db_password = "@sm2sm2Programad0res";
	$mysql_db_database = "audienciasnv";

	$con = @mysqli_connect($mysql_db_hostname, $mysql_db_user, $mysql_db_password, $mysql_db_database) or die('error');

	mysqli_set_charset($con,"utf8");

	if (!$con) {
	 trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
	}

?>