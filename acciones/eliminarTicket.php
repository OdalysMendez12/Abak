<?php
include('../conec.php');

$clave = $_GET['clave_ticket'] ?? NULL;

// Eliminar registros relacionados en la tabla "expediente"
$eliminarExpediente = "DELETE FROM expediente WHERE fk_clave_ticket = '$clave'";
$resultadoExpediente = mysqli_query($conexion, $eliminarExpediente);

// Eliminar el ticket
$eliminarTicket = "DELETE FROM tickets WHERE clave_ticket = '$clave'";
$resultadoTicket = mysqli_query($conexion, $eliminarTicket);

if ($resultadoExpediente && $resultadoTicket) {
    // La eliminación se realizó correctamente
    header('Location: ../Admin/ticket.php');
} else {
    // Hubo un error en la eliminación
    echo "Error en la eliminación del ticket: " . mysqli_error($conexion);
}

?>