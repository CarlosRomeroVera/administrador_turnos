<?php
require ("db_config.php");
header("access-control-allow-origin: *");

$id = $_POST["id_asunto"];
$var = array();

$sql = "SELECT * from aud_asuntos_cat_areas where estado_turno = 1 and aud_asunto_id =".$id;

	$result = mysqli_query($con, $sql);
	while($obj = mysqli_fetch_object($result)) {
		$var[] = $obj;
	}

	if (empty($var)) {
		echo "ok";
	}else{
		echo "En atencion";
	}
	//echo $sql;
	//echo json_encode($var);

//Cierro
mysqli_close($con);

?>