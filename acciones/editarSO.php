<?php
include('../conec.php');
$codigo = $_POST['id'];
$nombreSistema = $_POST['nombre_so'];


$editarPuesto = "UPDATE so SET id = '$codigo', nombre_so = '$nombreSistema' WHERE id = '$codigo'";
$resultado = mysqli_query($conexion, $editarPuesto);
if ($resultado) {
    // La consulta se ejecutó correctamente
    header('Location: ../Admin/sistemaOp.php');
} else {
    // Hubo un error en la consulta
    echo "Error en la consulta de actualización: " . mysqli_error($conexion);
}