<?php
session_start();
include ('conec.php');
    $email = $_POST['correo'];
    $pass = $_POST['contrasena'];  
    $consultaEmail = "SELECT COUNT(*) as contador FROM abak.usuario WHERE correo = '$email'AND contrasena = '$pass'";
    $validacion = mysqli_query($conexion, $consultaEmail);
    $validacionEmail = mysqli_fetch_array($validacion);

    $consulta = "SELECT * FROM usuario WHERE correo LIKE '$email'";
    /* Colsulta para guardar el registro en una tabla */
    $resultado = mysqli_query($conexion, $consulta);
    $fila= mysqli_fetch_array($resultado);
    
    
    //Confirma que se hizo algo nadamas
    $respuesta = '';
    
    
    if($validacionEmail['contador'] != 0){
        //password_hash sirve para verificar la contraseña
        $rolUsuario = $fila["fk_rol"];
        $nombre_usuario = $fila["nombre"];
        $clave_usuario = $fila["clave_usuario"];
        $Amaterno = $fila["Amaterno"];
        $Apaterno = $fila["Apaterno"];
    
        $_SESSION['correo'] = $email;
        $_SESSION['fk_rol'] = $rolUsuario;
        $_SESSION['nombre'] = $nombre_usuario;
        $_SESSION['Amaterno'] = $Amaterno;
        $_SESSION['Apaterno'] = $Apaterno;
        $_SESSION['contrasena'] = $pass;
        $_SESSION['clave_usuario'] = $clave_usuario;
        $respuesta = 1;
        echo $respuesta;
    }else{
        $respuesta = "Verifica los datos ingresados";
        echo "<script>alert('$respuesta');
        window.location.href = 'login.php';</script>";
    }
        if($respuesta==1 && $rolUsuario == 1){
            header('Location:  Admin/admin.php');

        }else if ($respuesta==1 && $rolUsuario == 2){
            header('Location: Usuario/usuario.php');
            
        }else if ($respuesta==1 && $rolUsuario == 3){
            header('Location: Empleado/ticket.php');

        }else if ($respuesta==1 && $rolUsuario == 4){
            header('Location: Gerente/usuarios.php');
            
            
        }else{
            /* header('Location: ../Paginas/LogIn.php'); */
            echo "<script>window.location.href = 'login.php';</script>";
        }
?>
