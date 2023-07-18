<?php
include('../../conec.php');

// Obtener el último ID ocupado
$query = "SELECT MAX(id) AS ultimo_id FROM componentes";
$resultado2 = mysqli_query($conexion, $query);
$fila2 = mysqli_fetch_assoc($resultado2);
$ultimoId = $fila2['ultimo_id'];

// Calcular el siguiente ID
$siguienteId = $ultimoId + 1;

// Obtener los datos del formulario
if (isset($_POST['Enviar'])) {
    $nombreComponente = $_POST['nombre_componente'];
    $modelo = $_POST['modelo'];
    $serie = $_POST['serie'];
    // Insertar el paquete con el siguiente ID
    $insertarComponente = "INSERT INTO componentes (id, nombre_componente, modelo, serie) VALUES ('$siguienteId', '$nombreComponente','$modelo','$serie')";
    $resultado = mysqli_query($conexion, $insertarComponente);

    if (!$resultado) {
        echo '<script>alert("Los datos no se insertaron.")</script>';
        header('Location: ../componentes.php');

    } else {
        echo '<script>alert("Los datos se insertaron.")</script>';
        header('Location: ../componentes.php');
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>
