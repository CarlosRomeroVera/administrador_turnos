<?php
require ("db_config.php");


$var = array();
$evento = $_POST['evento_id'];
$numero = $_POST['numero'];
$sql = "SELECT * from turnoGobernadorPantalla";

	$result = mysqli_query($con, $sql);
	$turno = '';
	while($obj = mysqli_fetch_object($result)) {
		$var[] = $obj;
		$turno = $obj->turno;
	}
	//echo json_encode($var);
	//echo $turno;
	$turno = $numero;
	$sql = "UPDATE turnoGobernadorPantalla
			set turno =".$turno."
			where id = 1;";
	$result = mysqli_query($con, $sql);

	// echo $sql;
	//echo $turno;
	$sql = "SELECT
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
	        WHERE aud_audiencias.turno =".$turno." and aud_audiencias.cat_evento_id =".$evento;
	$result = mysqli_query($con, $sql);
	while($obj = mysqli_fetch_object($result)) {
		$var[] = $obj;
		$nombre = $obj->nombre." ".$obj->apellido_paterno." ".$obj->apellido_materno;
	}
	// //echo json_encode($var);
	// //echo $turno;
	// $turno = $turno+1;
	// $sql = "UPDATE turnoGobernadorPantalla
	// 		set turno =".$turno."
	// 		where id = 1;";
	// $result = mysqli_query($con, $sql);

	// // echo $sql;
	//echo $turno;
	$aux['turno'] = $turno;
	$aux['nombre'] = $nombre;

	echo json_encode($aux);

//Cierro
mysqli_close($con);

?>