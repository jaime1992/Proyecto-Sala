@extends('Layout.administrador')


@section('content')

        <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Usuario</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                    <form role="form">
                        <div class="form-group">
                            <label >Rut</label>
                            <input type="rut" class="form-control" 
                            placeholder="Introduce el Rut">
                        </div>
                        <div class="form-group">
                            <label for="ejemplo_password_1">Asignar Contraseña</label>
                            <input type="password" class="form-control" id="ejemplo_password_1" 
                             placeholder="Contraseña">
                        </div>
                         <div class="form-group">
                            <label for="ejemplo_email_1">Email</label>
                            <input type="email" class="form-control" id="ejemplo_email_1"
                            placeholder="Introduce el Mail">
                        </div>
                        
                            <button type="submit" class="btn btn-default">Enviar</button>
                    </form>
            </div>  
        </div>       <!-- /#page-wrapper -->


@stop


         