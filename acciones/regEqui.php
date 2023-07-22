<?php
include('../conec.php');

if (isset($_POST['Enviar'])) {
    $clave = $_POST['clave_equipo'];
    $nombre = $_POST['nombre'];

    // Consultar la base de datos para verificar si el código del equipo ya existe
    $consultaExiste = "SELECT COUNT(*) as count FROM catalogo_equipo WHERE clave_equipo LIKE '$clave%'";
    $resultadoExiste = mysqli_query($conexion, $consultaExiste);
    $fila = mysqli_fetch_assoc($resultadoExiste);
    $count = $fila['count'];

    if ($count > 0) {
        // Si el código del equipo ya existe, obtener el número consecutivo más alto
        $consultaMaxConsecutivo = "SELECT MAX(SUBSTRING(clave_equipo, LENGTH('$clave') + 1)) as max_consecutivo FROM catalogo_equipo WHERE clave_equipo LIKE '$clave%'";
        $resultadoMaxConsecutivo = mysqli_query($conexion, $consultaMaxConsecutivo);
        $filaConsecutivo = mysqli_fetch_assoc($resultadoMaxConsecutivo);
        $maxConsecutivo = $filaConsecutivo['max_consecutivo'];
        $numeroConsecutivo = intval($maxConsecutivo) + 1;
    } else {
        // Si el código del equipo no existe, comenzar desde 1
        $numeroConsecutivo = 1;
    }

    // Formatear el número consecutivo con ceros a la izquierda (por ejemplo, 001)
    $numeroConsecutivoFormateado = str_pad($numeroConsecutivo, 3, '0', STR_PAD_LEFT);

    // Generar el nuevo código del equipo con el número consecutivo
    $nuevoCodigoEquipo = $clave . $numeroConsecutivoFormateado;

    // Insertar el nuevo código del equipo en la base de datos
    $insertarEqui = "INSERT INTO catalogo_equipo (clave_equipo, nombre) VALUES ('$nuevoCodigoEquipo', '$nombre')";
    $resultado = mysqli_query($conexion, $insertarEqui);

    if (!$resultado) {
        echo '<script>alert("Los datos no se insertaron.");</script>';
    }
}

header('Location: ../Admin/catalogoEqui.php');
?>
