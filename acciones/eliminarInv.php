<?php
include ('../conec.php');

$clave = $_GET['id'] ?? NULL;
$eliminar = "DELETE FROM equipo WHERE id = '$clave'";
$resultado = mysqli_query($conexion, $eliminar);
header('Location: ../Admin/inventario.php');

?>