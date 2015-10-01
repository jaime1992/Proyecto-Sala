@extends('Layout.administrador')

@section('content')

        <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Editar Sala: </h1>
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
                  <div class="highlight" data-example-id="condensed-table" style="width:650px">

                   {!! Form::model($salas, ['route' => ['Administrador.salas.update', $salas],
                  'method' => 'PUT']) !!}

                    <form role="form">
                       <div class="form-group" style="width:900px">

                       {!! Form::label('nombre', 'Pertenece a Campus: ') !!}
                         {!! Form::select('campus_id', $campus) !!}
                        
                        </div>
                           <div class="form-group" style="width:900px">

                         {!! Form::label('nombre', 'Se clasifica en: ') !!}
                         {!! Form::select('tiposalas_id', $tipos) !!}
                        
                        </div>

                        
                      <div class="form-group" style="width:900px">
                           {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese el nombre']) !!}
                        </div>
                       <div class="form-group" style="width:900px">
                           {!! Form::label('descripcion', 'Descripcion') !!}
                            {!! Form::textarea('descripcion', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese una descripcion']) !!}
                        </div>
                        <div class="form-group" style="width:900px">
                         {!! Form::label('capacidad', 'Capacidad') !!}
                            {!! Form::text('capacidad', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese la capacidad']) !!}
                        </div>

                           
                         <button type="submit" class="btn btn-warning">Editar </button>
                         <a class="btn btn-primary" href="{{url('Administrador/salas')}}" role="button">Cancelar</a>
                   
                        
                    </form>
                       
                      {!! Form::close() !!}   
                      </div>

                  {!! Form::open(['route' => ['Administrador.salas.destroy', $salas], 'method' => 'DELETE']) !!}
                      
                    <button type="submit" onclick="return confirm('Seguro que desea eliminar la sala?')"
                   class="btn btn-danger">Eliminar </button>

                    {!! Form::close() !!}
            </div>  
                 
        </div>     
        


@stop