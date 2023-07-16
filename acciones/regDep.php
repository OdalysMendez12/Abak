<?php
include ('../conec.php');

// Obtener el último ID ocupado
$query = "SELECT MAX(id) AS ultimo_id FROM departamento";
$resultado2 = mysqli_query($conexion, $query);
$fila2 = mysqli_fetch_assoc($resultado2);
$ultimoId = $fila2['ultimo_id'];

// Calcular el siguiente ID
$siguienteId = $ultimoId + 1;

// Obtener los datos del formulario
if (isset($_POST['Enviar'])) {
    $nombreDep = $_POST['nombre_dep'];
    // Insertar el paquete con el siguiente ID
    $insertarDepartamento = "INSERT INTO departamento (id, nombre_dep) VALUES ('$siguienteId', '$nombreDep')";
    $resultado = mysqli_query($conexion, $insertarDepartamento);

    if (!$resultado) {
        echo '<script>alert("Los datos no se insertaron.")</script>';
        header ('Location: ../Admin/departamentos.php');

    } else {
        echo '<script>alert("Los datos se insertaron.")</script>';
        header ('Location: ../Admin/departamentos.php');
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>