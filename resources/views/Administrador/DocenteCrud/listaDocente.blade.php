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
                        <h1 class="page-header">Docentes</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>

             @if(Session::has('message'))
             <p class="alert alert-info">{{ Session::get('message')}} </p>
             @endif


           <div class="panel-body">
            
                            <p>
                                <a class="btn btn-info" href="{{route('Administrador.docente.create')}}" role="button">
                                    Agregar Docentes</a>
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
                                            <th>Rut</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Email</th>
                                            <th>Pertenece a departamento</th>
                                            <th>Accion</th>
                                            <th>Descargar</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($docentes as $doc)
                                         
                                           <tr>
                                            
                                            <td>{{ $doc->id}}</td>
                                            <td>{{ $doc->rut}}</td>
                                            <td>{{ $doc->nombres}}</td>
                                            <td>{{ $doc->apellidos}}</td> 
                                            <td>{{ $doc->email }}</td>
                                            <td>{{ $doc->departamentos->nombre}}</td>
                                            <td>
                                             <a class="btn btn-danger btn-sm" 
                                             href="{{ route('Administrador.docente.edit', $doc) }}"
                                             >Ajustes</a>
                                            </td>
                                            <td> 
                                            <a class="btn btn-primary btn-sm"
                                             href="{{ route('Administrador.descargarDocentes.show', $doc->id) }}">Descargar</a>
                                            </td>
                                             
                                        </tr>
                                      @endforeach
                                    </tbody>
                               </table>
                                   

                                    <a class="btn btn-primary"
                                     href="{{ route('Administrador.descargarDocentes.index') }}">Descargar Listado</a>
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
            "infoFiltered": "(Los _MAX_ datos no pertenecen a los que desea encontrar)",
             "sSearch": "Buscar:"
        }
    });

    
} );

</script>

@stop