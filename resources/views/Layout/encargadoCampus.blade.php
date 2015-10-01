<!DOCTYPE html>
<html lang="en"><head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Encargado de Campus</title>



{!! HTML::style('css/bootstrap.min.css') !!}
{!!HTML::style('css/metisMenu.min.css') !!}
{!! HTML::style('css/sb-admin-2.css') !!}
{!! HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') !!}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Encargado de Campus UTEM</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">           
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Usuarios </a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{url('encargados')}}"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Ajustes Salas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                 <li>
                                    <a href="{{url('ajustes/salas')}}">Salas</a>
                                </li>
                                <li>
                                    <a href="{{url('asignar/salas')}}">Asignar Salas</a>
                                </li>
                                               
                        </li>
                            </ul> 

                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Ajustes Academicos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">

                                 <li>
                                    <a href="{{url('ajustes/cursos')}}">Cursos</a>
                                </li>
                                <li>
                                    <a href="{{url('ajusstes/asignaturas')}}">Asignaturas</a>
                                </li>
                                 <li>
                                    <a href="{{url('ajustes/estudiantes')}}">Estudiantes</a>
                                </li>
                                <li>
                                    <a href="{{url('ajustes/docentes')}}">Docentes</a>
                                </li>
                     </li>
                     </li>
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
          
        </nav>

@yield('content3')

   </div>
    <!-- /#wrapper -->

    <!-- jQuery -->



{!!HTML::script('js/jquery.min.js') !!}
{!! HTML::script('js/bootstrap.min.js') !!}
{!! HTML::script('js/metisMenu.min.js') !!}
{!!HTML::script('js/sb-admin-2.js') !!}





                      </body></html>   