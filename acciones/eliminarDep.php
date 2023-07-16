<?php
include ('../conec.php');

$codigo = $_GET['id'] ?? NULL;
$eliminarDep = "DELETE FROM departamento WHERE id = '$codigo'";
$resultado = mysqli_query($conexion, $eliminarDep);
header('Location: ../Admin/departamentos.php');

?>