<?php
include ('../conec.php');

if(isset($_POST['Enviar'])){
    $clave = $_POST['clave_equipo'];
    $nombre = $_POST['nombre'];

    $insertarEqui = "INSERT INTO catalogo_equipo (clave_equipo, nombre) VALUES ('$clave', '$nombre')";

    $resultado = mysqli_query($conexion, $insertarEqui);

    if(!$resultado){
        echo '<script>alert("Los datos no se insertaron.");</script>';
    }
}

header('Location: ../Admin/catalogoEqui.php');


?>