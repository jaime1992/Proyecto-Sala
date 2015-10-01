@extends('Layout.encargado')

@section('content3')

        <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Modificar Sala:  {{ $salas->nombre }}</h1>
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

                   {!! Form::model($salas, ['route' => ['Encargado.modificarSalas.update', $salas],
                  'method' => 'PUT']) !!}

                    <form role="form">
                       <div class="form-group">

                       {!! Form::label('nombre', 'Pertenece a Campus: ') !!}
                         {!! Form::select('campus_id', $campus) !!}
                        
                        </div>
                           <div class="form-group">

                         {!! Form::label('nombre', 'Se clasifica en: ') !!}
                         {!! Form::select('tiposalas_id', $tipos) !!}
                        
                        </div>

                        
                       <div class="form-group">
                           {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese el nombre']) !!}
                        </div>
                        <div class="form-group">
                         {!! Form::label('descripcion', 'Descripcion') !!}
                            {!! Form::text('descripcion', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese la descripcion']) !!}
                        </div>
                      
                         <div class="form-group">
                         {!! Form::label('capacidad', 'Capacidad') !!}
                            {!! Form::text('capacidad', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese la capacidad']) !!}
                        </div>

                           
                         <button type="submit" class="btn btn-warning">Modificar Sala </button>
                   
                        
                    </form>
                       
                      {!! Form::close() !!}   

                 
            </div>  
                 
        </div>     
        


@stop