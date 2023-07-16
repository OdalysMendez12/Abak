<?php
include('../conec.php');
$codigo = $_POST['clave_ticket'];
$estatus = $_POST['fk_estatus'];
$solucion = $_POST['solucion'];
$empleado = $_POST['fk_clave_empleado'];

$editarUsuario = "UPDATE tickets SET clave_ticket = '$codigo', fk_estatus = '$estatus', solucion = '$solucion',
fk_clave_empleado = '$empleado' WHERE clave_ticket = '$codigo'";
$resultado = mysqli_query($conexion, $editarUsuario);
if ($resultado) {
    // La consulta se ejecutó correctamente
    header('Location: ../Admin/ticket.php');
} else {
    // Hubo un error en la consulta
    echo "Error en la consulta de actualización: " . mysqli_error($conexion);
}
?>