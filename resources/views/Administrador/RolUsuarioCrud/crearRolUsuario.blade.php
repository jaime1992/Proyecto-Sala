@extends('Layout.administrador')

@section('content')

        <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Asignar usuario a un Rol</h1>
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



             
          
<div class="highlight" data-example-id="condensed-table" style="width:650px">
  
                 {!! Form::open(['route' => 'Administrador.cambiarperfil.store', 'method' => 'POST']) !!}
                 
                    <form role="form">
                      
                       
                         <div class="form-group">

                         {!! Form::label('nombre', 'Pertenece a Rol: ') !!}
                         {!! Form::select('rol_id', $roles) !!}
                        
                        </div>

                           <div class="form-group">

                         {!! Form::label('rut', 'Pertenece a Rut: ') !!}
                         {!! Form::select('usuario_rut', $usuarios) !!}
                        
                        </div>
                           

                         <button type="submit" class="btn btn-info">Crear</button>
                      
                    </form>
                      {!! Form::close() !!}
                  </div>

                      <a class="btn btn-danger" href="{{url('Administrador/cambiarperfil')}}" role="button">Cancelar</a>
            </div>  
        </div>       <!-- /#page-wrapper -->


@stop