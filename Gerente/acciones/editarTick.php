<?php
include('../../conec.php');
$codigo = $_POST['clave_ticket'];
$estatus = $_POST['fk_estatus'];
$solucion = $_POST['solucion'];
$empleado = $_POST['fk_clave_empleado'];
$tipoMantenimiento = $_POST['tipo_mantenimiento'];
$descMantenimiento = $_POST['dec_mantenimiento'];

// Consultar el estatus actual del ticket antes de la actualización
$consultaEstatus = "SELECT fk_estatus FROM tickets WHERE clave_ticket = '$codigo'";
$resultadoEstatus = mysqli_query($conexion, $consultaEstatus);

if ($resultadoEstatus) {
    // La consulta se ejecutó correctamente, ahora podemos obtener el valor de fk_estatus y fecha_inicio_atencion
    $filaEstatus = mysqli_fetch_assoc($resultadoEstatus);
    $estatusAnterior = $filaEstatus['fk_estatus'];
    $fechaInicioAtencion = $filaEstatus['fecha_inicio_atencion'];

    // Verificar si el estatus actual es diferente al estatus anterior
    if ($estatus != $estatusAnterior) {
        if ($estatus == 2 || $estatus == 3 || $estatus == 5) {
            // Si el nuevo estatus es "abierto", actualizamos la fecha de inicio de atención a la fecha actual
            $actualizarFechaInicio = "UPDATE expediente SET fecha_inicio_atencion = NOW() WHERE fk_clave_ticket = '$codigo'";
            $resultadoFechaInicio = mysqli_query($conexion, $actualizarFechaInicio);

            if (!$resultadoFechaInicio) {
                echo "Error al actualizar la fecha de inicio: " . mysqli_error($conexion);
                exit; // Detenemos la ejecución en caso de error
            }
        } else if ($estatus == 4) {
            // Si el nuevo estatus es "cerrado", actualizamos la fecha de fin de atención a la fecha actual
            $actualizarFechaFin = "UPDATE expediente SET fecha_fin_atencion = NOW() WHERE fk_clave_ticket = '$codigo'";
            $resultadoFechaFin = mysqli_query($conexion, $actualizarFechaFin);

            if (!$resultadoFechaFin) {
                echo "Error al actualizar la fecha de fin de atención: " . mysqli_error($conexion);
                exit; // Detenemos la ejecución en caso de error
            }
        }

        // Calculamos el tiempo de atención transcurrido si el ticket fue cerrado
        if ($estatus == 4 && $fechaInicioAtencion != 2) {
            $consultaFechas = "SELECT fecha_inicio_atencion, fecha_fin_atencion FROM expediente WHERE fk_clave_ticket = '$codigo'";
            $resultadoFechas = mysqli_query($conexion, $consultaFechas);
            $filaFechas = mysqli_fetch_assoc($resultadoFechas);
            $fechaInicio = new DateTime($filaFechas['fecha_inicio_atencion']);
            $fechaFin = new DateTime($filaFechas['fecha_fin_atencion']);
            $intervalo = $fechaInicio->diff($fechaFin);
            $tiempoAtencion = $intervalo->format('%h horas %i minutos %s segundos');

            // Actualizamos el campo de tiempo de atención en la tabla expediente
            $actualizarTiempoAtencion = "UPDATE expediente SET tiempo_atencion = '$tiempoAtencion' WHERE fk_clave_ticket = '$codigo'";
            $resultadoTiempoAtencion = mysqli_query($conexion, $actualizarTiempoAtencion);

            if (!$resultadoTiempoAtencion) {
                echo "Error al actualizar el tiempo de atención: " . mysqli_error($conexion);
                exit; // Detenemos la ejecución en caso de error
            }
        }
    }
}

// Actualizar los demás datos del ticket y expediente
$editarTicket = "UPDATE tickets SET clave_ticket = '$codigo', fk_estatus = '$estatus', solucion = '$solucion',
    fk_clave_empleado = '$empleado' WHERE clave_ticket = '$codigo'";
$resultadoTicket = mysqli_query($conexion, $editarTicket);

$editarExpediente = "UPDATE expediente SET tipo_mantenimiento = '$tipoMantenimiento', dec_mantenimiento = '$descMantenimiento', fk_clave_empleado = '$empleado'
WHERE fk_clave_ticket = '$codigo'";
$resultadoExpediente = mysqli_query($conexion, $editarExpediente);

if ($resultadoTicket && $resultadoExpediente) {
    // La consulta se ejecutó correctamente
    header('Location: ../ticket.php');
} else {
    // Hubo un error en la consulta
    echo "Error en la consulta de actualización: " . mysqli_error($conexion);
}
?>
