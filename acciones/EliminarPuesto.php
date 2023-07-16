<?php
include ('../conec.php');

$clave = $_GET['id'] ?? NULL;
var_dump($clave);
$eliminarPuesto = "DELETE FROM puesto WHERE id = '$clave'";
$resultado = mysqli_query($conexion, $eliminarPuesto);
header('Location: ../Admin/puesto.php');

?>