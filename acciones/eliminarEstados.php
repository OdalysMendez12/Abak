<?php
include ('../conec.php');

$clave = $_GET['id'] ?? NULL;
$eliminarEstado = "DELETE FROM estados WHERE id = '$clave'";
$resultado = mysqli_query($conexion, $eliminarEstado);
header('Location: ../Admin/estados.php');

?>