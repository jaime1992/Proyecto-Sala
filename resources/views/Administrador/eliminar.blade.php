@extends('Layout.administrador')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Eliminar Usuario: {{ $result->nombre }}</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
           
                 {!! Form::open(['route' => ['usuarios.destroy', $result], 
                 'method' => 'DELETE']) !!}

                <button type="submit" onclick="return confirm('Seguro que desea eliminar el usuario')"
                class="btn btn-danger">Eliminar</button>

             {!! Form::close() !!}
            </div>  
        </div>       <!-- /#page-wrapper -->

@stop