<?php
require ("db_config.php");
header("access-control-allow-origin: *");

$id_asunto = $_POST["id_asunto"];
$id_organismo = $_POST["id_organismo"];
$var = array();

$sql = "UPDATE aud_asuntos_cat_areas
		SET estado_turno = 1
		WHERE aud_asunto_id = '".$id_asunto."'
		and cat_area_id = '".$id_organismo."';";

	$result = mysqli_query($con, $sql);
	if ($result) {
		echo "ok";
	}else{
		echo "Error";
	}
	// while($obj = mysqli_fetch_object($result)) {
	// 	$var[] = $obj;
	// }


	// //echo $sql;
	// echo json_encode($var);

//Cierro
mysqli_close($con);

?>