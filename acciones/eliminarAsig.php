<?php
include('../conec.php');

$asignacionId = $_GET['id'] ?? NULL;

// Eliminar la asignación
$eliminarAsignacion = "DELETE FROM asignaciones WHERE id = '$asignacionId'";
$resultadoEliminar = mysqli_query($conexion, $eliminarAsignacion);
header('Location: ../Admin/asignaciones.php');
?>
