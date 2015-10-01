@extends('Layout.administrador')

@section('content')

        <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Editar Campus: {{ $campus->nombre }}</h1>
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

                   {!! Form::model($campus, ['route' => ['Administrador.campus.update', $campus],
                  'method' => 'PUT']) !!}

                    <form role="form">
                      
                       <div class="form-group" style="width:900px">
                           {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese el nombre']) !!}
                        </div>
                         <div class="form-group" style="width:900px">
                         {!! Form::label('direccion', 'Direccion') !!}
                            {!! Form::text('direccion', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese direccion']) !!}
                        </div>
                       <div class="form-group" style="width:900px">
                         {!! Form::label('latitud', 'Latitud') !!}
                            {!! Form::text('latitud', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese latitud']) !!}
                        </div>
                        <div class="form-group" style="width:900px">
                           {!! Form::label('longitud', 'Longitud') !!}
                            {!! Form::text('longitud', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese longitud']) !!}
                        </div>
                         <div class="form-group" style="width:900px">
                         {!! Form::label('descripcion', 'Descripcion') !!}
                            {!! Form::textarea('descripcion', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese la descripcion']) !!}
                        </div>
                        <div class="form-group" style="width:900px">
                         {!! Form::label('rut_encargado', 'Rut_encargado') !!}
                            {!! Form::text('rut_encargado', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese el rut del encargado']) !!}
                        </div>
                         <button type="submit" class="btn btn-warning">Editar </button>
                         <a class="btn btn-primary" href="{{url('Administrador/campus')}}" role="button">Cancelar</a>
                   
                        
                    </form>
                       
                      {!! Form::close() !!}   
                  </div>

                  {!! Form::open(['route' => ['Administrador.campus.destroy', $campus], 'method' => 'DELETE']) !!}
                      
                    <button type="submit" onclick="return confirm('Seguro que desea eliminar el campus? ')"
                   class="btn btn-danger">Eliminar </button>

                    {!! Form::close() !!}
            </div>  
                 
        </div>     
        


@stop
