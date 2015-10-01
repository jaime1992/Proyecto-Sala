@extends('Layout.administrador')

@section('content')

        <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Crear Usuario</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                 
                    @if ($errors->any())
                    <div class="alert alert-info" role="alert">
                 
                    <ul>
                         @foreach($errors->all() as $error)
                         <li>{{ $error }} </li>
                          @endforeach
                      </ul>
                      @endif
                  </div>

                 {!! Form::open(['route' => 'usuarios.store', 'method' => 'POST']) !!}
                    <form role="form">
                      
                        <div class="form-group">
                           {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese el nombre']) !!}
                        </div>
                         <div class="form-group">
                         {!! Form::label('descripcion', 'Descripcion') !!}
                            {!! Form::text('descripcion', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese la descripcion']) !!}
                        </div>
                        <div class="form-group">
                         {!! Form::label('rut', 'Rut') !!}
                            {!! Form::text('rut', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese el rut']) !!}
                        </div>
                       
                         <button type="submit" class="btn btn-info">Crear</button>
                         <button type="submit" class="btn btn-danger"
                         a href="#">Salir </button>
                    </form>
                      {!! Form::close() !!}
            </div>  
        </div>       <!-- /#page-wrapper -->


@stop


         