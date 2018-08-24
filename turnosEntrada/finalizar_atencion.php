<?php
require ("db_config.php");
header("access-control-allow-origin: *");

$id = $_POST["id_organismo"];
$var = array();

$sql = "SELECT * from aud_asuntos_cat_areas where estado_turno = 1 and cat_area_id =".$id;

	$result = mysqli_query($con, $sql);
	$idRegistro = '';
	while($obj = mysqli_fetch_object($result)) {
		$var[] = $obj;
		$idRegistro = $obj->id;
	}

	$sql = "UPDATE aud_asuntos_cat_areas
		SET estado_turno = 2
		WHERE id =".$idRegistro;

	$result = mysqli_query($con, $sql);
	if ($result) {
		echo "ok";
	}else{
		echo "Error";
	}
	//echo $sql;
	//echo json_encode($var);

//Cierro
mysqli_close($con);

?>