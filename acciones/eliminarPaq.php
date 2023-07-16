<?php
include ('../conec.php');

$codigo = $_GET['id'] ?? NULL;
$eliminarPaqu = "DELETE FROM paqueteria WHERE id = '$codigo'";
$resultado = mysqli_query($conexion, $eliminarPaqu);
header('Location: ../Admin/paqueteria.php');

?>