<?php
include('../../conec.php');
$codigoPaqueteria=$_POST['codigo'];
$nombreSistema = $_POST['nombre'];

$editarSistema = "UPDATE paqueteria SET codigo = '$codigoPaqueteria', nombre = '$nombreSistema'  WHERE codigo = '$codigoPaqueteria'";
$resultado = mysqli_query($conexion, $editarSistema);
if ($resultado) {
    // La consulta se ejecutó correctamente
    header('Location: ../paqueteria.php');
} else {
    // Hubo un error en la consulta
    echo "Error en la consulta de actualización: " . mysqli_error($conexion);
}
