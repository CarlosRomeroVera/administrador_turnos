<?php
require ("db_config.php");
header("access-control-allow-origin: *");

$var = array();

$sql = "SELECT
		aud_asuntos_cat_areas.id,
        aud_asuntos_cat_areas.aud_asunto_id,
		aud_asuntos_cat_areas.cat_area_id,
		aud_asuntos_cat_areas.estado_turno,
        aud_asuntos_cat_areas.mostrado,
		aud_asuntos.aud_audiencia_id,
		aud_audiencias.created,
        aud_audiencias.turno,
		cat_ciudadanos.nombre,
        cat_ciudadanos.apellido_paterno,
        cat_ciudadanos.apellido_materno,
        cat_areas.name
		FROM
		aud_asuntos_cat_areas
		INNER JOIN aud_asuntos ON aud_asuntos_cat_areas.aud_asunto_id = aud_asuntos.id
		INNER JOIN aud_audiencias ON aud_asuntos.aud_audiencia_id = aud_audiencias.id
		INNER JOIN cat_ciudadanos ON aud_audiencias.cat_ciudadano_id = cat_ciudadanos.id
        INNER JOIN cat_areas ON aud_asuntos_cat_areas.cat_area_id = cat_areas.id
		where 
		aud_asuntos_cat_areas.mostrado = 0 and aud_asuntos_cat_areas.estado_turno = 1
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