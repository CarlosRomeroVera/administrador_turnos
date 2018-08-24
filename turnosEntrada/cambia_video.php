<?php
require ("db_config.php");
header("access-control-allow-origin: *");

$var = array();
$video = $_POST['video'];

	$sql = "UPDATE turnoEntrada
			set video =".$video."
			where id = 1;";
	$result = mysqli_query($con, $sql);

	// echo $sql;
	// echo $turno;

	echo $result;

//Cierro
mysqli_close($con);

?>