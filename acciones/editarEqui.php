<?php
include('../conec.php');

$codigo = $_POST['clave_equipo'];
$nombre = $_POST['nombre'];

$editarUsuario = "UPDATE catalogo_equipo SET clave_equipo = '$codigo', nombre = '$nombre' WHERE clave_equipo = '$codigo'";
$resultado = mysqli_query($conexion, $editarUsuario);

if ($resultado) {
    // La consulta se ejecutó correctamente
    header('Location: ../Admin/catalogoEqui.php');
} else {
    // Hubo un error en la consulta
    echo "Error en la consulta de actualización: " . mysqli_error($conexion);
}
?>
