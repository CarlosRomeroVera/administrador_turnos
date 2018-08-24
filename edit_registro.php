<?php
require ("db_config.php");

@$id = $_POST["id"];
$var = array();

$sql = "SELECT * from aud_asuntos_cat_areas WHERE id = '".$id."';";
$result = mysqli_query($con, $sql);
$mostrado = '';
while($obj = mysqli_fetch_object($result)) {
	//$var[] = $obj;
	$mostrado = $obj->mostrado;
}

if (empty($id)){
	echo ("ERROR");
}
elseif ($mostrado == 1) {
 	echo "Bug";
}else {
	$sql = "UPDATE aud_asuntos_cat_areas SET mostrado = '1' WHERE id = '".$id."';";

	$result = mysqli_query($con, $sql);

	if ($result) {
		echo "ok";
	}else{
		echo "Error";
	}
}
//Cierro
mysqli_close($con);

?>