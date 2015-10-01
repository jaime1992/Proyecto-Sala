@extends('Layout.administrador')

@section('content')
   <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Editar Usuario: {{ $result->nombre }}</h1>
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
                 {!! Form::model($result, ['route' => ['usuarios.update', $result],
                  'method' => 'PUT']) !!}

                  
                    <form role="form">
                        <div class="form-group">
                           {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', null,['class' => 'form-control']) !!}
                        </div>
                         <div class="form-group">
                         {!! Form::label('descripcion', 'Descripcion') !!}
                            {!! Form::text('descripcion', null,['class' => 'form-control']) !!}
                        </div>

                         <div class="form-group">
                         {!! Form::label('rut', 'Rut') !!}
                            {!! Form::text('rut', null ,['class' => 'form-control']) !!}
                        </div>
                          <button type="submit" class="btn btn-info">Editar</button>

                   

                           
                    </form>
                      {!! Form::close() !!}


                  {!! Form::open(['route' => ['usuarios.destroy', $result], 'method' => 'DELETE']) !!}
                 

                    <button type="submit" onclick="return confirm('Seguro que desea eliminar el usuario')"
                   class="btn btn-danger">Eliminar</button>

                    {!! Form::close() !!}
            </div>  
        </div>       <!-- /#page-wrapper -->




    <!-- /#wrapper -->
@stop
