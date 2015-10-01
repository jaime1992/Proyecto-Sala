<!DOCTYPE html>
<html lang="en"><head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador</title>

{!! HTML::style('css/bootstrap.min.css') !!}
{!!HTML::style('css/metisMenu.min.css') !!}
{!!HTML::style('css/font-awesome.min.css') !!}
{!! HTML::style('css/sb-admin-2.css') !!}
{!! HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') !!}
{!!HTML::style('css/docs.min.css') !!}



@yield('css_plugins')

    
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
                 <a href="/inicio" class="navbar-brand">
                        <small>
                            <img src="/images/UTEM.png" height="32px">
                            Panel de Administración UTEM 
                        </small>
                    </a>
            </div>
            <!-- /.navbar-header -->


            <ul class="nav navbar-top-links navbar-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                            role="button" aria-expanded="false">{{ Auth::user()->nombres }}  {{ Auth::user()->apellidos }} <span class="caret"></span></a>
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                    
                        <li class="divider"></li>
                        <li><a href="{{route('auth.logout')}}"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
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
                            <a href="{{url('Administrador/bienvenido')}}"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                        </li>

                        <li>
                            <a href="{{url('Administrador/cambiarperfil')}}"><i class="fa fa-apple fa-fw"></i>Cambiar Perfil</a>
                        </li>



                        <li>
                            <a href="#"><i class="fa fa-delicious fa-fw"></i> Configuraciones<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                
                                  <li>
                             <a href="#"><i class="fa fa-child fa-fw"></i> Configuraciones de usuarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                              <li>
                                    <a href="{{url('Administrador/docente')}}">Docentes</a>
                                </li>

                                  <li>
                                    <a href="{{url('Administrador/estudiante')}}">Estudiantes</a>
                                </li>
                                 
                                 <li>
                                    <a href="{{url('Administrador/funcionarios')}}">Funcionarios</a>
                                </li>
                                 <li>
                                    <a href="{{url('Administrador/roles')}}">Roles</a>
                                </li>

                                 
                                <li>
                                    <a href="{{url('Administrador/usuarios')}}">Usuarios</a>
                                </li>

                              </li>
                            </ul>


                                <li>
                                    <a href="#"><i class="fa fa-group fa-fw"></i> Configuraciones academicas<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                              
                                  <li>
                                 <a href="{{url('Administrador/asignaturas')}}">Asignaturas</a>
                                 </li>
                               
                                 <li>
                                 <a href="{{url('Administrador/carreras')}}">Carreras</a>
                                 </li>
                                 <li> 
                                 <a href="{{url('Administrador/cursos')}}">Cursos</a>
                                 </li>
                                
                                  <li> 
                                 <a href="{{url('Administrador/periodos')}}">Periodos</a>
                                 </li>         
                            
                        </li>
                    </ul>

                           <li>
                           <a href="#"><i class="fa fa-life-bouy fa-fw"></i> Configuraciones de sedes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">

                                <li>
                                <a href="{{url('Administrador/campus')}}">Campus</a>
                                 </li>
                                  <li> 
                                 <a href="{{url('Administrador/facultades')}}">Facultades</a>
                                 </li>
                                 <li> 
                                 <a href="{{url('Administrador/departamentos')}}">Departamentos</a>
                                 </li>
                                 <li> 
                                 <a href="{{url('Administrador/escuelas')}}">Escuelas</a>
                                 </li>
                                 <li> 
                                 <a href="{{url('Administrador/salas')}}">Salas</a>
                                 </li>
                                 <li> 
                                 <a href="{{url('Administrador/tiposSalas')}}">Tipos de Salas</a>
                                 </li>
                        
                                </li>

                       
                    </ul>

</ul>

                        <li>
                            <a href="#"><i class="fa fa-motorcycle fa-fw"></i> Accesos Directos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                 <li>
                                    <a href="http://bienestarestudiantil.blogutem.cl/" target="_blank">Bienestar Estudiantil</a>
                                </li>
                                 <li>
                                    <a href="http://biblioteca.utem.cl/" target="_blank">Catálogo Biblioteca</a>
                                </li>
                               
                                   <li>
                                    <a href="http://postulacion.utem.cl/" target="_blank">Dirdoc</a>
                                </li>
                               
                                 <li>
                                    <a href="http://fscu.helen.cl/webpay_utem/" target="_blank">Fondo Solidario</a>
                                </li>
                               
                                 <li>
                                    <a href="http://intranet.utem.cl/394e29ebea3676d9008345533116b685/intranet/" target="_blank">Intranet</a>
                                </li>
                                <li>
                                    <a href="http://www.utem.cl/" target="_blank">Página UTEM</a>
                                </li>
                                <li>
                                    <a href="http://reko.utem.cl/portal/" target="_blank">Reko</a>
                                </li>
                            </li>
                        </ul>

                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle glyphicon glyphicon-share-alt" data-toggle="dropdown">
                                Cambio de Panel <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                {{--dd(Auth::user()->roles)--}}
                                @foreach(Auth::user()->roles as $perfiles)
                                    @if($perfiles->nombre == 'Administrador')
                                        <li>{!!Html::linkRoute('Encargado.bienvenido.index','Encargado ')!!}</li>
                                    @elseif($perfiles->nombre == 'Docente')
                                        <li>{!!Html::linkRoute('Docente.bienvenido.index','Docente ')!!}</li>
                                    @elseif($perfiles->nombre == 'Estudiante')
                                        <li>{!!Html::linkRoute('Estudiante.bienvenido.index','Estudiante ')!!}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>


                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

  @yield('content')

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->


{!!HTML::script('js/jquery.min.js') !!}
{!! HTML::script('js/bootstrap.min.js') !!}
{!! HTML::script('js/metisMenu.min.js') !!}
{!!HTML::script('js/sb-admin-2.js') !!}






@yield('js_bottom')


 </body></html>