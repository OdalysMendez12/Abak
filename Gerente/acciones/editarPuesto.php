<?php
include('../../conec.php');
$codigo = $_POST['id'];
$nombrePuesto = $_POST['nombre_puesto'];


$editarPuesto = "UPDATE puesto SET id = '$codigo', nombre_puesto = '$nombrePuesto' WHERE id = '$codigo'";
$resultado = mysqli_query($conexion, $editarPuesto);
if ($resultado) {
    // La consulta se ejecutó correctamente
    header('Location: ../puesto.php');
} else {
    // Hubo un error en la consulta
    echo "Error en la consulta de actualización: " . mysqli_error($conexion);
}