@extends('Layout.administrador')

@section('content')

        <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Cambiar Perfil </h1>
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

                   {!! Form::model($perfil, ['route' => ['Administrador.cambiarperfil.update', $perfil],
                  'method' => 'PUT']) !!}

                    <form role="form">
                      
                     
                       
                         <div class="form-group">
                          {!! Form::label('nombre', 'Cambiar Perfil del usuario:') !!}
                          {!! Form::select('rol_id', $rol) !!}
                   
                        </div>
                           
                         <button type="submit" class="btn btn-info">Cambiar Perfil</button>
                   
                        
                    </form>
                       
                     
            </div>  
                 
        </div>     
        


@stop