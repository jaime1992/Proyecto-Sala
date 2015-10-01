@extends('Layout.encargado')

@section('content3')

        <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Editar Estudiante: {{ $estudiantes->nombres }}</h1>
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

                   {!! Form::model($estudiantes, ['route' => ['Encargado.estudiantes.update', $estudiantes],
                  'method' => 'PUT']) !!}

                    <form role="form">
                            <div class="form-group">
                         {!! Form::label('rut', 'Rut') !!}
                            {!! Form::text('rut', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese el rut']) !!}
                        </div>
                      
                        <div class="form-group">
                           {!! Form::label('nombres', 'Nombres') !!}
                            {!! Form::text('nombres', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese los nombres']) !!}
                        </div>
                         <div class="form-group">
                         {!! Form::label('apellidos', 'Apellidos') !!}
                            {!! Form::text('apellidos', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese los apellidos']) !!}
                        </div>

                         <div class="form-group">
                         {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese el correo']) !!}
                        </div>

                         <div class="form-group">

                         {!! Form::label('nombre', 'Pertenece a  Carrera: ') !!}
                         {!! Form::select('carrera_id', $carreras) !!}
                        
                        </div>
                           
                         <button type="submit" class="btn btn-info">Editar </button>
                          <a class="btn btn-primary" href="{{url('Encargado/estudiantes')}}" role="button">Cancelar</a>
                   
                        
                    </form>
                       
                      {!! Form::close() !!}   

                  {!! Form::open(['route' => ['Encargado.estudiantes.destroy', $estudiantes], 'method' => 'DELETE']) !!}
                      
                    <button type="submit" onclick="return confirm('Seguro que desea eliminar al estudiante ?')"
                   class="btn btn-danger">Eliminar </button>

                    {!! Form::close() !!}
            </div>  
                 
        </div>     
        


@stop