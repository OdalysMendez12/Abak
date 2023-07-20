<?php
include('../conec.php');

if (isset($_POST['Enviar'])) {
    $fecha = $_POST['fecha_reporte'];
    $usuario = $_POST['fk_clave_usuario'];
    $equipo = $_POST['fk_clave_equipo'];
    $asunto = $_POST['asunto'];
    $estatus = $_POST['fk_estatus'];
    $descripcion = $_POST['descripcion'];
    $departamento = $_POST['fk_departamento'];

    // Obtener los datos del archivo
    $documento = $_FILES['documento'];

    // Verificar si se seleccionó un archivo
    if ($documento['size'] > 0) {
        // Obtener información del archivo
        $nombreArchivo = $documento['name'];
        $tipoArchivo = $documento['type'];
        $rutaTemporal = $documento['tmp_name'];
        $tamañoArchivo = $documento['size'];

        // Leer los datos del archivo en forma binaria
        $datosArchivo = file_get_contents($rutaTemporal);

        // Generar código alfanumérico aleatorio
        $codigo = strtoupper(bin2hex(random_bytes(4)));

        // Insertar los datos en la base de datos, incluyendo los datos binarios del archivo
        $insertarTicket = "INSERT INTO tickets (clave_ticket, fecha_reporte, fk_clave_usuario, fk_clave_equipo, asunto, fk_estatus, documento, descripcion, fk_departamento)
            VALUES ('$codigo', '$fecha', '$usuario', '$equipo', '$asunto', '$estatus', ?, '$descripcion', '$departamento')";

        // Preparar la consulta
        $stmt = mysqli_prepare($conexion, $insertarTicket);

        // Asociar los datos binarios del archivo al parámetro de la consulta
        mysqli_stmt_bind_param($stmt, 's', $datosArchivo);

        // Ejecutar la consulta
        $resultado = mysqli_stmt_execute($stmt);

        if (!$resultado) {
            echo '<script>alert("Los datos no se insertaron en la tabla tickets.");</script>';
        } else {
            // Obtener la clave del ticket recién insertado
// Obtener el último ID ocupado
        $query = "SELECT MAX(id) AS ultimo_id FROM expediente";
        $resultado2 = mysqli_query($conexion, $query);
        $fila2 = mysqli_fetch_assoc($resultado2);
        $ultimoId = $fila2['ultimo_id'];

        // Calcular el siguiente ID
        $siguienteId = $ultimoId + 1;
            // Insertar en la tabla "expediente"
            $insertarExpediente = "INSERT INTO expediente (id ,fk_clave_ticket, fk_clave_equipo, fk_clave_usuario)
                VALUES ('$siguienteId' ,'$codigo', '$equipo', '$usuario')";

            $resultadoExpediente = mysqli_query($conexion, $insertarExpediente);

            if (!$resultadoExpediente) {
                echo '<script>alert("Los datos no se insertaron en la tabla expediente.");</script>';
            } else {
                echo '<script>
                        alert("Los datos se insertaron correctamente.");
                    </script>';
            }
        }
    } else {
        // Si no se seleccionó ningún archivo, realizar la inserción sin el campo de archivo adjunto
        $codigo = strtoupper(bin2hex(random_bytes(4)));

        $insertarTicket = "INSERT INTO tickets (clave_ticket, fecha_reporte, fk_clave_usuario, fk_clave_equipo, asunto, fk_estatus, descripcion, fk_departamento)
            VALUES ('$codigo', '$fecha', '$usuario', '$equipo', '$asunto', '$estatus', '$descripcion', '$departamento')";

        $resultado = mysqli_query($conexion, $insertarTicket);

        if (!$resultado) {
            echo '<script>alert("Los datos no se insertaron en la tabla tickets.");</script>';
        } else {
            // Obtener la clave del ticket recién insertado
            $query = "SELECT MAX(id) AS ultimo_id FROM expediente";
        $resultado2 = mysqli_query($conexion, $query);
        $fila2 = mysqli_fetch_assoc($resultado2);
        $ultimoId = $fila2['ultimo_id'];

        // Calcular el siguiente ID
        $siguienteId = $ultimoId + 1;
            // Insertar en la tabla "expediente"
            $insertarExpediente = "INSERT INTO expediente (id,fk_clave_ticket, fk_clave_equipo, fk_clave_usuario)
                VALUES ('$siguienteId','$codigo', '$equipo', '$usuario')";

            $resultadoExpediente = mysqli_query($conexion, $insertarExpediente);

            if (!$resultadoExpediente) {
                echo '<script>alert("Los datos no se insertaron en la tabla expediente.");</script>';
            } else {
                echo '<script>
                        alert("Los datos se insertaron correctamente.");
                    </script>';
            }
        }
    }
}

header("Location: ../Admin/ticket.php");
?>

