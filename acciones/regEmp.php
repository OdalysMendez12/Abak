
<?php
include ('../conec.php');

// Obtener el último ID ocupado
$query = "SELECT MAX(id) AS ultimo_id FROM empresa";
$resultado2 = mysqli_query($conexion, $query);
$fila2 = mysqli_fetch_assoc($resultado2);
$ultimoId = $fila2['ultimo_id'];

// Calcular el siguiente ID
$siguienteId = $ultimoId + 1;

// Obtener los datos del formulario
if (isset($_POST['Enviar'])) {
    $nombreSuc = $_POST['nombre'];
    $correo = $_POST['correo'];
    $estado = $_POST['fk_estado'];
    $municipio = $_POST['fk_municipio'];
    $ciudad = $_POST['fk_ciudad'];
    $pais = $_POST['fk_pais'];
    $direccion = $_POST['direccion'];
    $RFC = $_POST['RFC'];

    // Insertar el paquete con el siguiente ID
    $insertarsuc = "INSERT INTO empresa (id, nombre, correo, fk_estado, fk_municipio, fk_ciudad, fk_pais, direccion, RFC) 
    VALUES ('$siguienteId', '$nombreSuc','$correo', '$estado', '$municipio', '$ciudad', '$pais', '$direccion', '$RFC')";
    $resultado = mysqli_query($conexion, $insertarsuc);

    if (!$resultado) {
        echo '<script>alert("Los datos no se insertaron.")</script>';
        header('Location: ../Admin/empresas.php');

    } else {
        echo '<script>alert("Los datos se insertaron.")</script>';
        header('Location: ../Admin/empresas.php');
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>