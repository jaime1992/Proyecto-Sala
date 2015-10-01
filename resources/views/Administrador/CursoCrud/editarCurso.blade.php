@extends('Layout.administrador')

@section('content')

        <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Editar Curso: </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                 
                    @if ($errors->any())
                    <div class="alert alert-success" role="alert">
                 
                    <ul>
                         @foreach($errors->all() as $error)
                         <li>{{ $error }} </li>
                          @endforeach
                      </ul>
                      @endif
                  </div>
                  <div class="highlight" data-example-id="condensed-table" style="width:650px">

                   {!! Form::model($cursos, ['route' => ['Administrador.cursos.update', $cursos],
                  'method' => 'PUT']) !!}

                    <form role="form">

                        <div class="form-group" style="width:900px">

                         {!! Form::label('nombre', 'Pertenece a Asignatura: ') !!}
                         {!! Form::select('asignatura_id', $asignaturas) !!}
                        
                        </div>
                         <div class="form-group" style="width:900px">

                         {!! Form::label('nombre', 'Pertenece a  Docente: ') !!}
                         {!! Form::select('docente_id', $docentes) !!}
                        
                        </div>
                      
                         <div class="form-group" style="width:900px">
                           {!! Form::label('semestre', 'Semestre') !!}
                            {!! Form::text('semestre', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese el semestre']) !!}
                        </div>
                        <div class="form-group" style="width:900px">
                           {!! Form::label('anio', 'Año') !!}
                            {!! Form::text('anio', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese el año']) !!}
                        </div>
                        <div class="form-group" style="width:900px">
                         {!! Form::label('seccion', 'Seccion') !!}
                            {!! Form::text('seccion', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese la seccion']) !!}
                        </div>
                           
                         <button type="submit" class="btn btn-success">Editar </button>

                          <a class="btn btn-primary" href="{{url('Administrador/cursos')}}" role="button">Cancelar</a>
                   
                        
                    </form>
                       
                      {!! Form::close() !!}  
                      </div> 

                  {!! Form::open(['route' => ['Administrador.cursos.destroy', $cursos], 'method' => 'DELETE']) !!}
                      
                    <button type="submit" onclick="return confirm('Seguro que desea eliminar el curso?')"
                   class="btn btn-danger">Eliminar </button>

                    {!! Form::close() !!}
            </div>  
                 
        </div>     
        


@stop