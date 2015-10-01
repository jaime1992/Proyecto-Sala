@extends('Layout.administrador')

@section('content')

        <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Editar Horario: </h1>
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
                  <div class="highlight" data-example-id="condensed-table" style="width:650px"

                    {!! Form::model($horarios, ['route' => ['Administrador.horarios.update', $horarios],
                  'method' => 'PUT']) !!}

                    <form role="form">

                          <div class="form-group" style="width:900px">
                           {!! Form::label('fecha', 'Fecha') !!}
                            {!! Form::text('fecha', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese la fecha']) !!}
                        </div>
                        
                           
                        <div class="form-group" style="width:900px">

                         {!! Form::label('salas', 'Pertenece a Sala: ') !!}
                         {!! Form::select('sala_id', $salas) !!}
                        
                        </div>
                         <div class="form-group" style="width:900px">

                         {!! Form::label('bloque', 'Pertenece a Periodo: ') !!}
                         {!! Form::select('periodo_id', $periodos) !!}
                        
                        </div>

                          <div class="form-group" style="width:900px">

                         {!! Form::label('seccion', 'Pertenece a la seccion: ') !!}
                         {!! Form::select('curso_id', $cursos) !!}
                        
                        </div>
                         <button type="submit" class="btn btn-success">Editar </button>
                   
                        
                    </form>
                       
                      {!! Form::close() !!}   
                      </div>

                  {!! Form::open(['route' => ['Administrador.horarios.destroy', $horarios], 'method' => 'DELETE']) !!}
                      
                    <button type="submit" onclick="return confirm('Seguro que desea eliminar el horario?')"
                   class="btn btn-danger">Eliminar </button>

                    {!! Form::close() !!}
            </div>  
                 
        </div>     
        


@stop