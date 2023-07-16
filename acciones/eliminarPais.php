<?php
include ('../conec.php');

$clave = $_GET['id'] ?? NULL;
$eliminarPais = "DELETE FROM pais WHERE id = '$clave'";
$resultado = mysqli_query($conexion, $eliminarPais);
header('Location: ../Admin/paises.php');

?>