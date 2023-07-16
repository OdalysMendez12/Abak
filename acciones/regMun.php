<?php
include ('../conec.php');

// Obtener el último ID ocupado
$query = "SELECT MAX(id) AS ultimo_id FROM municipio";
$resultado2 = mysqli_query($conexion, $query);
$fila2 = mysqli_fetch_assoc($resultado2);
$ultimoId = $fila2['ultimo_id'];

// Calcular el siguiente ID
$siguienteId = $ultimoId + 1;

// Obtener los datos del formulario
if (isset($_POST['Enviar'])) {
    $nombreMunicipio = $_POST['nombre'];
    $estado = $_POST['fk_estado'];


    // Insertar el paquete con el siguiente ID
    $insertarMun = "INSERT INTO municipio (id, nombre, fk_estado) VALUES ('$siguienteId', '$nombreMunicipio', '$estado')";
    $resultado = mysqli_query($conexion, $insertarMun);

    if (!$resultado) {
        echo '<script>alert("Los datos no se insertaron.")</script>';
        header('Location: ../Admin/municipios.php');

    } else {
        echo '<script>alert("Los datos se insertaron.")</script>';
        header('Location: ../Admin/municipios.php');
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>