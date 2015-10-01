@extends('Layout.administrador')

@section('content')

        <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Crear Asignatura Cursada</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                   @if(Session::has('message'))

        
          <div class="alert alert-dismissible alert-info">
           <strong>{{ Session::get('message') }}</strong>
          </div>

      @endif


                 @if ($errors->any())
                    <div class="alert alert-info" role="alert">
                 
                    <ul>
                         @foreach($errors->all() as $error)
                         <li>{{ $error }} </li>
                          @endforeach
                      </ul>
                      @endif
                  </div>

                 {!! Form::open(['route' => 'Administrador.asignaturascursadas.store', 'method' => 'POST']) !!}
                    <form role="form">
                        
                           <div class="form-group">

                         {!! Form::label('id', 'Pertenece a Curso: ') !!}
                         {!! Form::select('curso_id', $cursos) !!}
                        
                        </div>
                          <div class="form-group">

                         {!! Form::label('nombres', 'Pertenece a Estudiante: ') !!}
                         {!! Form::select('estudiante_id', $estudiantes) !!}
                        
                         <button type="submit" class="btn btn-info">Crear</button>
                         <button type="submit" class="btn btn-danger"
                         a href="{{url('usuarios')}}">Salir </button>
                    </form>
                      {!! Form::close() !!}
                      <a class="btn btn-danger" href="{{url('Administrador/asignaturasCursadas')}}" role="button">Cancelar</a>
            </div>  
        </div>       <!-- /#page-wrapper -->


@stop