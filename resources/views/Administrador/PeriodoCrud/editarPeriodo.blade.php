@extends('Layout.administrador')

@section('content')

        <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Editar Periodo: </h1>
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

                   {!! Form::model($periodos, ['route' => ['Administrador.periodos.update', $periodos],
                  'method' => 'PUT']) !!}

                    <form role="form">
                      
                    <div class="form-group" style="width:900px">
                           {!! Form::label('bloque', 'Bloque') !!}
                            {!! Form::text('bloque', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese un nuevo bloque']) !!}
                        </div>
                         <div class="form-group" style="width:900px">
                         {!! Form::label('inicio', 'Inicio') !!}
                            {!! Form::text('inicio', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese el inicio']) !!}
                        </div>
                        <div class="form-group" style="width:900px">
                         {!! Form::label('fin', 'Fin') !!}
                            {!! Form::text('fin', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese el fin']) !!}
                        </div>
                         <button type="submit" class="btn btn-success">Editar </button>
                         <a class="btn btn-primary" href="{{url('Administrador/periodos')}}" role="button">Cancelar</a>
                   
                        
                    </form>
                       
                      {!! Form::close() !!}  
                      </div> 

                  {!! Form::open(['route' => ['Administrador.periodos.destroy', $periodos], 'method' => 'DELETE']) !!}
                      
                    <button type="submit" onclick="return confirm('Seguro que desea eliminar el periodo? ')"
                   class="btn btn-danger">Eliminar</button>

                    {!! Form::close() !!}
            </div>  
                 
        </div>     
        


@stop
