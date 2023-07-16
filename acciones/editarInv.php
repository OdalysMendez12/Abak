<?php
include('../conec.php');
$codigo = $_POST['id'];
$estatus = $_POST['fk_estado_equipo'];


$editar = "UPDATE equipo SET id = '$codigo', fk_estado_equipo = '$estatus' WHERE id = '$codigo'";
$resultado = mysqli_query($conexion, $editar);
if ($resultado) {
    // La consulta se ejecutó correctamente
    header('Location: ../Admin/inventario.php');
} else {
    // Hubo un error en la consulta
    echo "Error en la consulta de actualización: " . mysqli_error($conexion);
}
?>