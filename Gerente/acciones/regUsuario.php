<?php
include('../../conec.php');

if(isset($_POST['Enviar'])){
    $nombreUser = $_POST['nombre'];
    $apellidoPaterno = $_POST['Apaterno'];
    $apellidoMaterno = $_POST['Amaterno'];  
    $telefono = $_POST['telefono'];
    $correoElec = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $departamento = $_POST['fk_departamento'];
    $rol = $_POST['fk_rol'];
    $puesto = $_POST['fk_puesto'];
    $sexo = $_POST['sexo'];
    $sucursal = $_POST['fk_sucursal'];

    // Generar código alfanumérico aleatorio
    $codigo = strtoupper(bin2hex(random_bytes(4)));

    $insertarUsuario = "INSERT INTO usuario (clave_usuario, nombre, Apaterno, Amaterno, telefono, correo, contrasena, fk_departamento, fk_rol, fk_puesto, sexo, fk_sucursal) VALUES ('$codigo', '$nombreUser', '$apellidoPaterno', '$apellidoMaterno', '$telefono', '$correoElec', '$contrasena', $departamento, $rol, $puesto, '$sexo', $sucursal)";

    $resultado = mysqli_query($conexion, $insertarUsuario);

    if(!$resultado){
        echo '<script>alert("Los datos no se insertaron.");</script>';
    }else{
        // Asignar el código generado al campo "codigo"
        echo '<script>
                document.getElementById("codigo").value = "' . $codigo . '";
                alert("Los datos se insertaron.");
            </script>';
    }
}

header('Location: ../usuarios.php');


?>