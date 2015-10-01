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
                        <h1 class="page-header">Horarios</h1>
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
                                <a class="btn btn-success" href="{{route('Administrador.horarios.create')}}"
                                 role="button"> Agregar Horario</a>
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
                                            <th>Fecha</th>
                                            <th>Sala</th>
                                            <th>Bloque</th>
                                            <th>Curso (Seccion)</th>
                                        
                                            <th>Accion</th>
                                            <th>Descargar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($horarios as $hor)
                                          <tr>
                                           
                                            <td>{{ $hor->id}}</td>
                                            <td>{{ $hor->fecha}}</td>
                                            <td>{{ $hor->salas->nombre}}</td>
                                            <td>{{ $hor->periodos->bloque}}</td>
                                            <td>{{ $hor->cursos->seccion}}</td> 
                                                                 
                                            <td>
                                             <a class="btn btn-danger btn-sm" 
                                             href="{{ route('Administrador.horarios.edit', $hor) }}">Ajustes</a>
                                            </td>
                                            <td> 
                                            <a class="btn btn-primary btn-sm"
                                             href="{{ route('Administrador.descargarHorarios.show', $hor->id) }}">Descargar</a>
                                            </td>
                                        </tr>


                                     
                                        @endforeach
                                    </tbody>
                                    
                               </table>
                           
                                       
                                    
                                    <a class="btn btn-primary"
                                     href="{{ route('Administrador.descargarHorarios.index') }}">Descargar Listado</a>

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