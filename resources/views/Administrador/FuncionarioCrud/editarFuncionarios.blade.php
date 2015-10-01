@extends('Layout.administrador')

@section('content')

        <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Editar Funcionario: {{ $funcionarios->nombres }}</h1>
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
                  <div class="highlight" data-example-id="condensed-table" style="width:650px">

                   {!! Form::model($funcionarios, ['route' => ['Administrador.funcionarios.update', $funcionarios],
                  'method' => 'PUT']) !!}

                    <form role="form">
                            <div class="form-group" style="width:900px">
                         {!! Form::label('rut', 'Rut') !!}
                            {!! Form::text('rut', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese el rut']) !!}
                        </div>
                      
                        <div class="form-group" style="width:900px">
                           {!! Form::label('nombres', 'Nombres') !!}
                            {!! Form::text('nombres', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese los nombres']) !!}
                        </div>
                        <div class="form-group" style="width:900px">
                         {!! Form::label('apellidos', 'Apellidos') !!}
                            {!! Form::text('apellidos', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese los apellidos']) !!}
                        </div>
                        <div class="form-group" style="width:900px">
                         {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese el email']) !!}
                        </div>

                        <div class="form-group" style="width:900px">

                         {!! Form::label('nombre', 'Pertenece a  Departamento: ') !!}
                         {!! Form::select('departamento_id', $departamentos) !!}
                        
                        </div>

                        
                           
                         <button type="submit" class="btn btn-info">Editar </button>
                         <a class="btn btn-primary" href="{{url('Administrador/funcionarios')}}" role="button">Cancelar</a>
                         

                        
                    </form>
                       
                      {!! Form::close() !!}   
                      </div>

                  {!! Form::open(['route' => ['Administrador.funcionarios.destroy', $funcionarios], 'method' => 'DELETE']) !!}
                      
                    <button type="submit" onclick="return confirm('Seguro que desea eliminar el funcionario ?')"
                   class="btn btn-danger">Eliminar </button>

                    {!! Form::close() !!}
            </div>  
                 
        </div>     
        


@stop