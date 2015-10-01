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
                        <h1 class="page-header">Estudiantes</h1>
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
                                <a class="btn btn-primary" href="{{route('Encargado.estudiantes.create')}}" role="button">
                                    Ingresar Estudiante</a>
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
                                            <th>apellidos</th>
                                            <th>Email</th>
                                            <th>Pertenece a carrera</th>
                                            <th>Accion</th>
                                            <th>Descargar</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                           @foreach($estudiantes as $est)
                                         
                                           <tr>
                                            
                                            <td>{{ $est->id}}</td>
                                            <td>{{ $est->rut}}
                                            <td>{{ $est->nombres}}</td>
                                            <td>{{ $est->apellidos}}</td>  
                                            <td>{{ $est->email}}</td>
                                            <td>{{ $est->carreras->nombre}}</td>
                                            <td>
                                             <a class="btn btn-info btn-sm"
                                              href="{{ route('Encargado.estudiantes.edit', $est) }}">Ajustes</a>
                                            
                                             </td>
                                             <td> 
                                        <a class="btn btn-default btn-sm"
                                         href="{{ route('Encargado.descargarEstudiantes.show', $est->id) }}">Descargar</a>
                                            </td>
                                             
                                        </tr>
                                     
                                      @endforeach
                                    </tbody>
                                  
                                    
                               </table>
                               <a class="btn btn-default"
                            href="{{ route('Encargado.descargarEstudiantes.index') }}">Descargar Listado</a>
                                      
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