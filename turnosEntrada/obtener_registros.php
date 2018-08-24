<?php
require ("db_config.php");
header("access-control-allow-origin: *");

$id = $_POST["id"];
$id_evento = $_POST["id_evento"];
$var = array();

$sql = "SELECT
		aud_asuntos_cat_areas.aud_asunto_id,
		aud_asuntos_cat_areas.cat_area_id,
		aud_asuntos_cat_areas.estado_turno,
		aud_asuntos.aud_audiencia_id,
		aud_audiencias.created,
		cat_ciudadanos.nombre,
		aud_audiencias.turno
		FROM
		aud_asuntos_cat_areas
		INNER JOIN aud_asuntos ON aud_asuntos_cat_areas.aud_asunto_id = aud_asuntos.id
		INNER JOIN aud_audiencias ON aud_asuntos.aud_audiencia_id = aud_audiencias.id
		INNER JOIN cat_ciudadanos ON aud_audiencias.cat_ciudadano_id = cat_ciudadanos.id
		where 
		aud_asuntos_cat_areas.cat_area_id =".$id." and aud_audiencias.cat_evento_id =".$id_evento."
		ORDER by aud_audiencias.created DESC";

	$result = mysqli_query($con, $sql);
	while($obj = mysqli_fetch_object($result)) {
		$var[] = $obj;
	}


	//echo $sql;
	echo json_encode($var);

//Cierro
mysqli_close($con);

?>