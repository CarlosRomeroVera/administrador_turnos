<?php
require ("db_config.php");
header("access-control-allow-origin: *");

$var = array();
$sql = "SELECT * from cat_eventos order by numero desc";

	$result = mysqli_query($con, $sql);
	while($obj = mysqli_fetch_object($result)) {
		$var[] = $obj;
	}

	echo json_encode($var);

//Cierro
mysqli_close($con);

?>