@extends('Layout.administrador')


@section('css_plugins')

{!!HTML::style('css/jquery.dataTables.css') !!}
@stop

@section('content')



   <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Listado de Usuarios</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>

             @if(Session::has('message'))
             <p class="alert alert-success">{{ Session::get('message')}} </p>
             @endif


           <div class="panel-body">
            
                            <p>
                                <a class="btn btn-info" href="{{route('usuarios.create')}}" role="button">
                                    Agregar usuario</a>
                                </p>
                           
                                <div id="dataTables-example_wrapper" 
                                class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                         
                                <div class="row">
                                <div class="col-sm-12">

                         <div style=" margin-top: 30px;">           
                                
                            <table id="table_id" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>nombre</th>
                                            <th>descripcion</th>
                                            <th>rut</th>
                                            <th>accion</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($rols as $rol)

                                         @foreach($rol->rolesusuarios as $rolesuser)
                                        <tr>
                                            <td>{{ $rol->id}}</td>
                                            <td>{{ $rol->nombre}}</td>
                                            <td>{{ $rol->descripcion}}</td>
                                            <td>{{ $rolesuser-> rut}}</td>
                                            <td>
                                             <a class="pure-button" href="{{ route('usuarios.edit', $rol) }}">Editar</a>
                                             <a class="#">Eliminar</a>
                                               </td>
                                        </tr>
                                         @endforeach
                                        @endforeach
                                    </tbody>
                               </table>
          
                                </div>  
                                </div>  
                                                      
                        </div> 

            </div>      <!-- /#page-wrapper -->



    </div>

    <!-- /#wrapper -->

@stop

@section('js_bottom')

{!!HTML::script('js/jquery.dataTables.js') !!}

<script>    
$(document).ready(function() {
    $('#table_id').dataTable( {
        "language": {
            "lengthMenu": "Mostrando _MENU_ por pagina",
            "zeroRecords": "No se encontraron registros",
            "info": "Mostrando _PAGE_ de _PAGES_ paginas",
            "infoEmpty": "No se encontraron registros",
            //"infoFiltered": "(L_MAX_ )",
             "sSearch": "Buscar:"
        }
    });

    
} );

</script>

@stop