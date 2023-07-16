<?php
include('../conec.php');

// Obtener el último ID ocupado
$query = "SELECT MAX(id) AS ultimo_id FROM equipo";
$resultado2 = mysqli_query($conexion, $query);
$fila2 = mysqli_fetch_assoc($resultado2);
$ultimoId = $fila2['ultimo_id'];

// Calcular el siguiente ID
$siguienteId = $ultimoId + 1;

// Obtener los datos del formulario
if (isset($_POST['Enviar'])) {
    $Equipo = $_POST['fk_clave_equipo'];
    $Marca = $_POST['fk_marca'];
    $Componentes = isset($_POST['fk_componentes']) ? implode(",", $_POST['fk_componentes']) : null;
    $EstadoEqui = $_POST['fk_estado_equipo'];
    $SO = $_POST['fk_SO'];
    $Paqueteria = isset($_POST['fk_paqueteria']) ? implode(",", $_POST['fk_paqueteria']) : null;
    $Mac = $_POST['MacAddress'];
    $Stock = $_POST['stock'];
    $sucursal = $_POST['fk_sucursal'];

    // Validar los valores seleccionados de paqueterías
    if ($Paqueteria !== null) {
        $paqueteriasSeleccionadas = $Paqueteria;

        // Consultar la tabla de paqueterías para obtener los IDs válidos
        $consultaPaqueterias = "SELECT id FROM paqueteria";
        $resultadoPaqueterias = mysqli_query($conexion, $consultaPaqueterias);
        $idsPaqueteriasValidos = array();

        while ($filaPaqueteria = mysqli_fetch_assoc($resultadoPaqueterias)) {
            $idsPaqueteriasValidos[] = $filaPaqueteria['id'];
        }

    }

    $documento = $_FILES['factura'];

    // Verificar si se seleccionó un archivo
    if ($documento['size'] > 0) {
        // Obtener información del archivo
        $nombreArchivo = $documento['name'];
        $tipoArchivo = $documento['type'];
        $rutaTemporal = $documento['tmp_name'];
        $tamañoArchivo = $documento['size'];

        // Leer los datos del archivo en forma binaria
        $datosArchivo = file_get_contents($rutaTemporal);

        // Insertar los datos en la base de datos, incluyendo los datos binarios del archivo
        $insertarEqui = "INSERT INTO equipo (id, fk_clave_equipo, fk_marca, fk_componentes, fk_estado_equipo, fk_SO, fk_paqueteria, MacAddress, stock, factura, fk_sucursal) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Preparar la consulta
        $stmt = mysqli_prepare($conexion, $insertarEqui);

        // Asociar los valores y tipos de datos a los parámetros de la consulta
        mysqli_stmt_bind_param($stmt, 'sssssssssss', $siguienteId, $Equipo, $Marca, $Componentes, $EstadoEqui, $SO, $Paqueteria, $Mac, $Stock, $datosArchivo, $sucursal);

        // Ejecutar la consulta
        $resultado = mysqli_stmt_execute($stmt);

        if (!$resultado) {
            echo '<script>alert("Los datos no se insertaron.");</script>';
        } else {
            echo '<script>alert("Los datos se insertaron.");</script>';
            header('Location: ../Admin/inventario.php');
        }
    } else {
        // Si no se seleccionó ningún archivo, realizar la inserción sin el campo de archivo adjunto
        $insertarEqui = "INSERT INTO equipo (id, fk_clave_equipo, fk_marca, fk_componentes, fk_estado_equipo, fk_SO, fk_paqueteria, MacAddress, stock, fk_sucursal) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conexion, $insertarEqui);
        mysqli_stmt_bind_param($stmt, 'ssssssssss', $siguienteId, $Equipo, $Marca, $Componentes, $EstadoEqui, $SO, $Paqueteria, $Mac, $Stock, $sucursal);
        $resultado = mysqli_stmt_execute($stmt);

        if (!$resultado) {
            echo '<script>alert("Los datos no se insertaron.");</script>';
        } else {
            header('Location: ../Admin/inventario_sucursal.php');
        }
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>
