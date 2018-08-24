<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
header("access-control-allow-origin: *");
header("Content-Type: text/html;charset=utf-8");
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','@sm2sm2Programad0res','audienciasr');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT audiencias.id,cat_areas.name, audiencias.nombre, audiencias.apellido_paterno, audiencias.apellido_materno FROM `audiencias` LEFT JOIN audiencias_por_usuarios ON audiencias_por_usuarios.audiencia_id = audiencias.id LEFT JOIN co_usuarios on co_usuarios.id = audiencias_por_usuarios.co_usuario_id LEFT JOIN cat_areas On cat_areas.id = co_usuarios.cat_area_id WHERE audiencias.id =".$q;
mysqli_query("SET NAMES 'utf8'");
$acentos = $con->query("SET NAMES 'utf8'");
$result = mysqli_query($con,$sql);



$turno ="";
$organismo ="";

while($row = mysqli_fetch_array($result)) {
    $turno =  $row['id'];
    $nombre = $row['nombre']." ".$row['apellido_paterno']." ".$row['apellido_materno'];
    $organismo = $organismo."<h1>".$row['name']."</h1>";
}

echo $turno;
echo "<div style='font-size:70px; margin-top:-380px; position:relative;'>".$nombre."</div>";
echo "<div style='margin-top:-30px; position:relative;'>".$organismo."</div>";

mysqli_close($con);

?>
</body>
</html>