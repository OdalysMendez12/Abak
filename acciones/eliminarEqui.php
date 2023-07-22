<?php
include ('../conec.php');

$codigo = $_GET['clave_equipo'] ?? NULL;
$eliminarDep = "DELETE FROM catalogo_equipo WHERE clave_equipo = '$codigo'";
$resultado = mysqli_query($conexion, $eliminarDep);
header('Location: ../Admin/catalogoEqui.php');

?>