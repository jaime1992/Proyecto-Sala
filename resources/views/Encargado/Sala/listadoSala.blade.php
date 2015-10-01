@extends('Layout.encargado')


@section('css_plugins')

{!!HTML::style('css/jquery.dataTables.css') !!}
@stop

@section('content3')



   <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Modificar Salas</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>

             @if(Session::has('message'))
             <p class="alert alert-warning">{{ Session::get('message')}} </p>
             @endif


           <div class="panel-body">
            
                                <p>
                               

                               
                           
                                <div id="dataTables-example_wrapper" 
                                class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                         
                                <div class="row">
                                <div class="col-sm-12">

                         <div style=" margin-top: 30px;">           
                                
                            <table id="table_id" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Nombre</th>
                                            <th>Capacidad</th>
                                            <th>Campus</th>
                                            <th>Tipo de sala</th>
                                            <th>Accion</th>
                                           

                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($salas as $sal)
                                          <tr>
                                            
                                            <td>{{ $sal->id}}</td>
                                        
                                            <td>{{ $sal->nombre}}</td>
                                            <td>{{ $sal->capacidad}}</td>
                                            <td>{{ $sal->campus->nombre}}</td>
                                            <td>{{ $sal->tipos->nombre}}</td>
                                            <td>
                                             <a class="btn btn-info" 
                                             href="{{ route('Encargado.modificarSalas.edit', $sal) }}">Modificar Sala</a>
                                            </td>
                                            
                                        </tr>


                                     
                                        @endforeach
                                    </tbody>
                                    
                               </table>
                               
                                    
                                    
                                                      
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
            "infoFiltered": "(Los _MAX_ datos no pertenecen a los que desea encontrar)",
             "sSearch": "Buscar:"
        }
    });

    
} );

</script>

@stop