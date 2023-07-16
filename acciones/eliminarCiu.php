<?php
include ('../conec.php');

$codigo = $_GET['id'] ?? NULL;
$eliminarCiu = "DELETE FROM ciudades WHERE id = '$codigo'";
$resultado = mysqli_query($conexion, $eliminarCiu);
header('Location: ../Admin/ciudades.php');

?>