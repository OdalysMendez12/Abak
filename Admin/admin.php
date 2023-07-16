<?php include('../conec.php'); ?>
<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['correo'])) {
    header('Location: ../i_sesion.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ABAK SOLUCIONES</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <!--datatables boostrap-->
    <link rel="stylesheet" href="../template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <!--datatables bootstrap responsive-->
    <link rel="stylesheet" href="../template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../template/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../template/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../template/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../template/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../template/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php
        include "menu.php";
        ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="table-responsive">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Usuarios</h1>
                        </div>
                        <div class="box">
                        <div class="box-header">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#CrearUser">Crear nuevo</button>
                        </div>
                            <br>
                            <table class="table table-bordered table-hover table-striped table-condensed" id="miTabla">
                                <thead>
                                    <tr>
                                        <th>Clave usuario</th>
                                        <th>Nombre</th>
                                        <th>Apellido paterno</th>
                                        <th>Apellido materno</th>
                                        <th>Telefono</th>
                                        <th>Email</th>
                                        <th>Departamento</th>
                                        <th>Rol</th>
                                        <th>Puesto</th>
                                        <th>Sexo</th>
                                        <th>Sucursal</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include('../conec.php');/*Conexión a la Base de Datos*/
                                    $Consulta = "SELECT usuario.clave_usuario, usuario.nombre,usuario.Apaterno,usuario.Amaterno, usuario.telefono, usuario.correo, departamento.nombre_dep AS fk_departamento, 
                                    roles.rol AS fk_rol, puesto.nombre_puesto AS fk_puesto, sucursal.nombre_suc AS fk_sucursal, usuario.sexo  
                                    FROM usuario INNER JOIN sucursal ON usuario.fk_sucursal = sucursal.id INNER JOIN puesto ON usuario.fk_puesto = puesto.id
                                    INNER JOIN departamento ON usuario.fk_departamento = departamento.id 
                                    INNER JOIN roles ON usuario.fk_rol = roles.id";

                                    $resultado = mysqli_query($conexion, $Consulta);
                                    $contador = 1;
                                    while ($fila = mysqli_fetch_array($resultado)) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $fila["clave_usuario"] ?></th>
                                            <td><?php echo $fila["nombre"] ?></td>
                                            <td><?php echo $fila["Apaterno"] ?></td>
                                            <td><?php echo $fila["Amaterno"] ?></td>
                                            <td><?php echo $fila["telefono"] ?></td>
                                            <td><?php echo $fila["correo"] ?></td>
                                            <td><?php echo $fila["fk_departamento"] ?></td>
                                            <td><?php echo $fila["fk_rol"] ?></td>
                                            <td><?php echo $fila["fk_puesto"] ?></td>
                                            <td><?php echo $fila["sexo"] ?></td>
                                            <td><?php echo $fila["fk_sucursal"] ?></td>
                                            <!--Boton Eliminar Usuarios-->
                                            <td>
                                                <!-- Boton Eliminar Usuarios -->
                                                <div class="d-flex">
                                            <button class="btn btn-success mr-2">
                                                <i class="fas fa-pencil-alt" data-toggle="modal" data-target="#EditarUser<?php echo $contador ?>"></i>
                                            </button> 
                                            <button class="btn btn-danger">
                                                <a onclick="eliminarUsuario('<?php echo $fila['clave_usuario'] ?>')">
                                                    <i class="fas fa-trash text-white"></i>
                                                </a>
                                            </button>                                           </td>
                                        </tr>
                                        <div class="modal fade" id="EditarUser<?php echo $contador ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="../acciones/editarusuario.php" method="POST">
                                            <div class="modal-body">
                                                <h2>Editar Usuario</h2>
                                                <div class="box-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Clave Usuario:</label>
                                                    <input type="text" class="form-control" name="clave_usuario" value="<?php echo $fila['clave_usuario'] ?>" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Edita el nombre:</label>
                                                    <input type="text" class="form-control" name="nombre"/>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Edita el apellido paterno:</label>
                                                    <input type="text" class="form-control" name="Apaterno" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Edita el apellido materno:</label>
                                                    <input type="text" class="form-control" name="Amaterno" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Edita el número de teléfono:</label>
                                                    <input type="number" class="form-control" name="telefono" required />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Edita el correo electrónico:</label>
                                                    <input type="email" class="form-control" name="correo" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Edita la contraseña:</label>
                                                    <input type="password" class="form-control" name="contrasena" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Edita el departamento:</label>
                                                    <select class="form-control" aria-label="Default select example" name="fk_departamento">
                                                        <?php
                                                        include('conec.php');
                                                        $consulta2 = "SELECT * FROM departamento";
                                                        $resultado2 = mysqli_query($conexion, $consulta2);
                                                        while ($fila2 = mysqli_fetch_array($resultado2)) {
                                                            ?>
                                                            <option value="<?php echo $fila2["id"] ?>"><?php echo $fila2["nombre_dep"] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Edita el rol:</label>
                                                    <select class="form-control" aria-label="Default select example" name="fk_rol">
                                                        <?php
                                                        include('conec.php');
                                                        $consulta_rol = "SELECT * FROM roles";
                                                        $resultado_rol = mysqli_query($conexion, $consulta_rol);
                                                        while ($fila_rol = mysqli_fetch_array($resultado_rol)) {
                                                            ?>
                                                            <option value="<?php echo $fila_rol["id"] ?>"><?php echo $fila_rol["rol"] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Edita el puesto:</label>
                                                    <select class="form-control" aria-label="Default select example" name="fk_puesto">
                                                        <?php
                                                        include('conec.php');
                                                        $consulta3 = "SELECT * FROM puesto";
                                                        $resultado3 = mysqli_query($conexion, $consulta3);
                                                        while ($fila3 = mysqli_fetch_array($resultado3)) {
                                                            ?>
                                                            <option value="<?php echo $fila3["id"] ?>"><?php echo $fila3["nombre_puesto"] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Edita el sexo del usuario:</label>
                                                    <select class="form-control" aria-label="Default select example" name="sexo">
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Femenino">Femenino</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Edita la sucursal a la que pertenece el usuario:</label>
                                                    <select class="form-control" aria-label="Default select example" name="fk_sucursal">
                                                        <?php
                                                        include('conec.php');
                                                        $consulta4 = "SELECT * FROM sucursal";
                                                        $resultado4 = mysqli_query($conexion, $consulta4);
                                                        while ($fila4 = mysqli_fetch_array($resultado4)) {
                                                            ?>
                                                            <option value="<?php echo $fila4["id"] ?>"><?php echo $fila4["nombre_suc"] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <input type="submit" name="Enviar" value="Editar ticket" class="btn btn-primary" />
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                    <?php 
                                    $contador++;
                                } 
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="CrearUser">
    <div class="modal-dialog">
        <div class="modal-content">
        <h2 class="titulito" style="text-align: center;">Crear Usuario</h2>
            <form action="../acciones/regUsuario.php" method="POST">
                <div class="modal-body">
                    <div class="box-body">
                    <div class="mb-3">
                                <label class="form-label">Ingresa la clave del usuario:</label>
                                <input type="text" class="form-control" id="codigo" name="clave_usuario" placeholder="No es necesario agregar un codigo" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ingresa el nombre:</label>
                                <input type="text" class="form-control" name="nombre" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ingresa el apellido paterno:</label>
                                <input type="text" class="form-control" name="Apaterno" required />
                                <div class="mb-3">
                                    <label class="form-label">Ingresa el apellido materno:</label>
                                    <input type="text" class="form-control" name="Amaterno" required />
                                    <div class="mb-3">
                                        <label class="form-label">Ingresa el número de teléfono:</label>
                                        <input type="number" class="form-control" name="telefono" required />
                                        <div class="mb-3">
                                            <label class="form-label">Ingresa el correo electrónico:</label>
                                            <input type="email" class="form-control" name="correo" required />
                                            <div class="mb-3">
                                                <label class="form-label">Ingresa la contraseña:</label>
                                                <input type="password" class="form-control" name="contrasena" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Ingresa el departamento:</label>
                                                <select class="form-control" aria-label="Default select example" name="fk_departamento">
                                                <?php
                                                    include('conec.php');
                                                    $consulta2 = "SELECT * FROM departamento";
                                                    $resultado2 = mysqli_query($conexion, $consulta2);
                                                    while ($fila2 = mysqli_fetch_array($resultado2)) {
                                                    ?>
                                                    <option value="<?php echo $fila2["id"] ?>"><?php echo $fila2["nombre_dep"] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Ingresa el rol:</label>
                                                <select class="form-control" aria-label="Default select example" name="fk_rol">
                                                <?php
                                                    include('conec.php');
                                                    $consulta = "SELECT * FROM roles";
                                                    $resultado = mysqli_query($conexion, $consulta);
                                                    while ($fila = mysqli_fetch_array($resultado)) {
                                                    ?>
                                                    <option value="<?php echo $fila["id"] ?>"><?php echo $fila["rol"] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Ingresa el puesto:</label>
                                                <select class="form-control" aria-label="Default select example" name="fk_puesto">
                                                <?php
                                                    include('conec.php');
                                                    $consulta3 = "SELECT * FROM puesto";
                                                    $resultado3 = mysqli_query($conexion, $consulta3);
                                                    while ($fila3 = mysqli_fetch_array($resultado3)) {
                                                    ?>
                                                    <option value="<?php echo $fila3["id"] ?>"><?php echo $fila3["nombre_puesto"] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Ingresa el sexo del usuario:</label>
                                                <select class="form-control" aria-label="Default select example" name="sexo">
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Ingresa la sucursal a la que pertenece el usuario:</label>
                                                <select class="form-control" aria-label="Default select example" name="fk_sucursal">
                                                <?php
                                                    include('conec.php');
                                                    $consulta4 = "SELECT * FROM sucursal";
                                                    $resultado4 = mysqli_query($conexion, $consulta4);
                                                    while ($fila4 = mysqli_fetch_array($resultado4)) {
                                                    ?>
                                                    <option value="<?php echo $fila4["id"] ?>"><?php echo $fila4["nombre_suc"] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                <input type="submit" name="Enviar" value="Insertar Usuario" class="btn btn-primary" />
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <script>
        function eliminarUsuario(claveUsuario) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción eliminará el usuario seleccionado.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redireccionar a la página de eliminación del usuario
                    window.location.href = '../acciones/eliminarusuario.php?clave_usuario=' + claveUsuario;
                }
            });
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!--Script para el lenguaje en español e inicializacion de datatables-->
    <script src="tablas.js"></script>
    <!-- Resolve template/conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstratemplate/p 4 -->
    <script src="../template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../template/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparklin -->
    <script src="../template/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../template/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../template/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../template/plugins/moment/moment.min.js"></script>
    <script src="../template/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../template/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <head>
        <!-- Otros elementos del encabezado -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- AdminLTE App -->
        <script src="../template/dist/js/adminlte.js"></script>
</body>

</html>