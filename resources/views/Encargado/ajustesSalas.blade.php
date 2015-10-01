 @extends('Layout.encargado')

@section('content3')

  <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Ajuste de salas</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                     <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle"
                            data-toggle="dropdown">
                            Campus: <span class="caret"></span>
                            </button>
 
                            <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Macul</a></li>
                            <li><a href="#">FAE</a></li>
                            <li><a href="#">Casa Central</a></li>
                            </ul>
                        </div>
                        
                        <div class="form-group">
                            <label >Seleccione Capacidad de la sala: </label>
                            <input class="form-control"  
                             placeholder="[ 30-45 ]">
                        </div>

                         <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle"
                            data-toggle="dropdown">
                            Nombre de la Sala <span class="caret"></span>
                            </button>
 
                            <ul class="dropdown-menu" role="menu">
                            <li><a href="#">ddgl</a></li>
                            <li><a href="#">fdfd</a></li>
                            <li><a href="#">dgfgfd </a></li>
                            </ul>
                        </div>
                        
                         <button type="submit" class="btn btn-default">Actualizar</button>
                
            </div>     <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
@stop