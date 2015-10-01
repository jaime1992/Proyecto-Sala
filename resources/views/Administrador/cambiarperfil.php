@extends('Layout.administrador')

@section('content')

        <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Cambiar Perfil</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <div class="form-group">
                            <label >Ingrese Rut a asignar: </label>
                            <input type="rut" class="form-control" 
                            placeholder="Introduce el Rut">
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle"
                    data-toggle="dropdown">
                    Perfiles <span class="caret"></span>
                    </button>
 
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Administrador</a></li>
                        <li><a href="#">Docente</a></li>
                        <li><a href="#">Estudiante</a></li>
                        <li><a href="#">Encargado Campus</a></li>
                        </ul>
            </div>
                    <button type="submit" class="btn btn-default">Asignar</button>

     <!-- /#page-wrapper -->

    </div>
    @stop
  