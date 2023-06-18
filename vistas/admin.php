<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>A´BAK SOLUCIONES</title>
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <!--datatables boostrap-->
    <link rel="stylesheet" href="../template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <!--datatables bootstrap responsive-->
    <link rel="stylesheet" href="../template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../template/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <span class="brand-text font-weight-light">A´BAK SOLUCIONES</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="../vistas/admin.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Usuarios
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Help Desk
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                    <i class="nav-icon fas fa-ticket-alt"></i>
                                        <p>Nuevo ticket</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                        <p>Detalles tickets</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-laptop"></i>
                                <p>
                                    Equipos
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <p>Extras</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <p>Expediente</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <p>Asignaciones</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">Empresas</li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon far fa-building"></i>
                                <p>
                                    Empresas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-warehouse"></i>
                                <p>
                                    Sucursales
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Usuarios</h1>
                        </div>
                        <div class="box">
            <div class="box-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#CrearUsuario">Crear nuevo</button>
            </div>
            <br>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped dtUsers">
                    <thead>
                        <tr>
                            <th>Clave usuario</th>
                            <th>Nombre</th>
                            <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Contraseña</th>
                            <th>Departamento</th>
                            <th>Rol</th>
                            <th>Puesto</th>
                            <th>Sexo</th>
                            <th>Sucursal</th>
                            <th>Fecha alta</th>
                            <th>Fecha baja</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--@foreach($usuarios as $user)-->
                        <tr>
                            <!--<td>{{$user -> name }}</td>
                            @if($user->documento == "")
                            <td>No registrado</td>
                            @else
                            <td>{{$user->documento}}</td>
                            @endif
                            @if($user->foto=="")
                                <td><img src="{{ url ('storage/uSER.png') }}" width="50px"></td>
                            @else
                                <td><img src="{{ url ('storage/'.$user->foto) }}" width="50px"></td>
                            @endif
                            <td>{{ $user->email }}</td>
                            <td>{{ $user -> rol }}</td>-->
                            <td>
                                <!--<a href="{{ url('Editar-Usuario/'.$user->id) }}">
                                    <button class="btn btn-success">
                                        <i class="fas fa-pencil-alt" data-toggle="modal" data-target="#EditarUsuario">
                                        </i>
                                    </button>
                                </a>
                                <button class="btn btn-danger EliminarUsuario" Uid="{{$user->id}}" Usuario="{{$user->name}}"><i class="fas fa-trash"></i></button>-->
                            </td>
                        </tr>
                        <!--@endforeach-->
                    </tbody>
                </table>
            </div>
            <!-- MODAL CREAR USUARIO-->
            <div class="modal fade" id="CrearUsuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                @csrf
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Tipo de usuario</h2>
                            <select class="form-control input-lg" name="rol" required="">
                                <option value="">Seleccionar</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Vendedor">Vendedor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h2>Nombre:</h2>
                            <input type="text" class="form-control input-lg" name="name" required="">
                        </div>
                        <div class="form-group">
                            <h2>Email:</h2>
                            <input type="text" class="form-control input-lg" name="email" required="">
                        </div>
                        <div class="form-group">
                            <h2>Contrasena:</h2>
                            <input type="text" class="form-control input-lg" name="password" required="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Crear</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
        </div>
        </div>

        <script type="text/javascript">
            $(".dtUsers").DataTable({
                "language": {
                "sSearch": "Buscar",
                "sEmptyTable": "No hay datos en la tabla",
                "sZeroRecords": "No se encontraron resultados",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
                "SInfoEmpty": "Mostrando registros del 0 al 10 de un total de 0",
                "sInfoFiltered":"(filtrandro de un total de _MAX_ registros",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Ultimo",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "sLoadingRecords":"Cargando...",
                "sLengthMenu": "Mostrar _MENU_ registros"
                }
            });
        </script>
        <script src="../template/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!--datatables responsive-->
        <script src="../template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="../template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <!-- jQuery -->
        <script src="../template/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery Utemplate/I 1.11.4 -->
        <script src="../template/plugins/jquery-ui/jquery-ui.min.js"></script>
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
        <!-- AdminLTE App -->
        <script src="../template/dist/js/adminlte.js"></script>
</body>

</html>