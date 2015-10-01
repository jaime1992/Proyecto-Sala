<!DOCTYPE html>
<html lang="en"><head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Encargado</title>



{!! HTML::style('css/bootstrap.min.css') !!}
{!!HTML::style('css/metisMenu.min.css') !!}
{!!HTML::style('css/docs.min.css') !!}
{!! HTML::style('css/font-awesome.min.css') !!}
   {!! HTML::style('css/font-awesome.css') !!}
{!! HTML::style('css/sb-admin-2.css') !!}
{!! HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') !!}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('css_plugins')

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
                            Encargado de Campus UTEM 
                        </small>
                    </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">    
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                            role="button" aria-expanded="false">{{ Auth::user()->nombres }}  <span class="caret"></span></a>       
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
                            <a href="{{url('Encargado/bienvenido')}}"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                        </li>

                       
        

                        <li>
                            <a href="{{url('Encargado/consultas')}}"><i class="fa fa-dashboard fa-fw"></i> Consulta Especifica</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-laptop fa-fw"></i> Configuracion de Salas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">

                                <li>
                                    <a href="{{url('Encargado/asignarSalas')}}"> Asignar Sala</a>
                                </li>
                                 <li>
                                    <a href="{{url('Encargado/salas')}}"> Ajustes Salas</a>
                                </li>

                                 
                            </ul>   

                                               
                        </li>
                             

                        <li>
                            <a href="#"><i class="fa fa-photo fa-fw"></i> Ingresar Datos Academicos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">

                            
                                
                                <li>
                                    <a href="{{url('Encargado/asignaturas')}}">Asignaturas</a>
                                </li>
                                  <li>
                                    <a href="{{url('Encargado/asignaturasCursadas')}}">Asignaturas Cursadas</a>
                                </li>
                                <li>
                                    <a href="{{url('Encargado/cursos')}}">Cursos</a>
                                </li>
                                 <li>
                                    <a href="{{url('Encargado/docentes')}}">Docentes</a>
                                </li>
                                 <li>
                                    <a href="{{url('Encargado/estudiantes')}}">Estudiantes</a>
                                </li>
                               
                            
                            </ul>


                        </li>
                     
                       
                    


                        <li>
                            <a href="#"><i class="fa fa-send-o fa-fw"></i> Accesos Directos<span class="fa arrow"></span></a>
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
                            
                            </ul>
                            </li>
                    
                               
                            
                            </ul>
                            </li>
                           
                    </ul> 

                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle glyphicon glyphicon-share-alt" data-toggle="dropdown">
                                Cambio de Panel <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                {{--dd(Auth::user()->roles)--}}
                                @foreach(Auth::user()->roles as $perfiles)
                                    @if($perfiles->nombre == 'Encargado')
                                        <li>{!!Html::linkRoute('Administrador.bienvenido.index','Administrador ')!!}</li>
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
    </div>
@yield('content3')

   </div>
    <!-- /#wrapper -->

    <!-- jQuery -->




{!!HTML::script('js/jquery.min.js') !!}
{!! HTML::script('js/bootstrap.min.js') !!}
{!! HTML::script('js/metisMenu.min.js') !!}
{!!HTML::script('js/sb-admin-2.js') !!}


@yield('js_bottom')

                      </body></html>   