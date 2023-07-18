<?php
include('../../conec.php');

// Obtener el último ID ocupado
$query = "SELECT MAX(id) AS ultimo_id FROM asignaciones";
$resultado2 = mysqli_query($conexion, $query);
$fila2 = mysqli_fetch_assoc($resultado2);
$ultimoId = $fila2['ultimo_id'];

// Calcular el siguiente ID
$siguienteId = $ultimoId + 1;
// Obtener los datos del formulario
if (isset($_POST['Enviar'])) {
    $Usuario = $_POST['fk_clave_usuario'];
    $equipo = $_POST['fk_clave_equipo'];
    $FechaAsig = $_POST['fecha_asignacion'];
    $sucursal = $_POST['fk_sucursal'];
    // Insertar la asignación
    $insertarAsignacion = "INSERT INTO asignaciones (id, fk_clave_usuario, fk_clave_equipo, fecha_asignacion, fk_sucursal) 
    VALUES ('$siguienteId', '$Usuario', '$equipo', '$FechaAsig', '$sucursal')";
$resultado = mysqli_query($conexion, $insertarAsignacion);

    if ($resultado) {   
        // Actualizar el stock en la tabla "equipo"
        $actualizarStock = "UPDATE equipo SET stock = stock - 1 WHERE fk_clave_equipo = '$equipo' AND fk_sucursal = '$sucursal'";
        $resultadoStock = mysqli_query($conexion, $actualizarStock);

        if (!$resultadoStock) {
            echo '<script>alert("Error al actualizar el stock del equipo.")</script>';
        }
    } else {
        echo '<script>alert("Error al insertar la asignación.")</script>';
    }

    header('Location: ../asignaciones.php');
}

// Cerrar la conexión
mysqli_close($conexion);

?>
