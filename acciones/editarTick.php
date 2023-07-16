<?php
include('../conec.php');
$codigo = $_POST['clave_ticket'];
$estatus = $_POST['fk_estatus'];
$solucion = $_POST['solucion'];
$empleado = $_POST['fk_clave_empleado'];
$tipoMantenimiento = $_POST['tipo_mantenimiento'];
$descMantenimiento = $_POST['dec_mantenimiento'];
$FechaFin = $_POST['fecha_fin'];

// Actualizar los datos en la tabla tickets
$editarTicket = "UPDATE tickets SET clave_ticket = '$codigo', fk_estatus = '$estatus', solucion = '$solucion',
    fk_clave_empleado = '$empleado' WHERE clave_ticket = '$codigo'";
$resultadoTicket = mysqli_query($conexion, $editarTicket);

// Actualizar los datos en la tabla expediente
$editarExpediente = "UPDATE expediente SET tipo_mantenimiento = '$tipoMantenimiento', dec_mantenimiento = '$descMantenimiento', fk_clave_empleado = '$empleado',
    fecha_fin = '$FechaFin' WHERE fk_clave_ticket = '$codigo'";
$resultadoExpediente = mysqli_query($conexion, $editarExpediente);

if ($resultadoTicket && $resultadoExpediente) {
    // La consulta se ejecutó correctamente
    header('Location: ../Admin/ticket.php');
} else {
    // Hubo un error en la consulta
    echo "Error en la consulta de actualización: " . mysqli_error($conexion);
}
?>
