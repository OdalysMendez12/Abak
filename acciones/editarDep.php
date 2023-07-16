<?php
include('../conec.php');
$codigo = $_POST['id'];
$nombreDepartamento = $_POST['nombre_dep'];


$editarDepartamento = "UPDATE departamento SET id = '$codigo', nombre_dep = '$nombreDepartamento' WHERE id = '$codigo'";
$resultado = mysqli_query($conexion, $editarDepartamento);
if ($resultado) {
    // La consulta se ejecutó correctamente
    header('Location: ../Admin/departamentos.php');
} else {
    // Hubo un error en la consulta
    echo "Error en la consulta de actualización: " . mysqli_error($conexion);
}