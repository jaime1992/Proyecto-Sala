@extends('Layout.encargado')

@section('content3')

        <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Asignar Sala</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                 @if ($errors->any())
                    <div class="alert alert-warning" role="alert">
                 
                    <ul>
                         @foreach($errors->all() as $error)
                         <li>{{ $error }} </li>
                          @endforeach
                      </ul>
                      @endif
                  </div>

                 {!! Form::open(['route' => 'Encargado.asignarSalas.show', 'method' => 'POST']) !!}
                    <form role="form">
                        
                        
                       <div class="form-group">
                           {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese el nombre']) !!}
                        </div>
                       
                           <div class="form-group">

                         {!! Form::label('nombre', 'Se clasifica en: ') !!}
                         {!! Form::select('tipo_sala_id', $tipos) !!}
                        
                        </div>

                           

                         <button type="submit" class="btn btn-warning">Crear</button>
                         <button type="submit" class="btn btn-danger"
                         a href="{{url('usuarios')}}">Salir </button>
                    </form>
                      {!! Form::close() !!}

   
            </div>  
        </div>       <!-- /#page-wrapper -->


@stop