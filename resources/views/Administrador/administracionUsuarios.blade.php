@extends('Layout.administrador')

@section('content')
        <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Usuario</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div> 
           <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"><div id="dataTables-example_filter" class="dataTables_filter"><label>Buscar Usuario:<input type="search" class="form-control input-sm" placeholder="" aria-controls="dataTables-example"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                                    <thead>
                                        <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 144px;">Tipo de Usuario</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 176px;">Rut</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 160px;">Acción</th>
                                    </thead>
                                    <tbody>
                                        <tr class="gradeA odd" role="row">
                                            <td class="sorting_1"></td>
                                            <td></td>
                                            <td>
                                               <a class="pure-button" href="#">Editar</a>
                                               <a class="pure-button" href="#">Eliminar</a>
                                            </td>
                                        </tr>
                                         
                                    </tbody>
                                                   
                                </div>                     
                        </div> 

            </div>      <!-- /#page-wrapper -->

    </div>

    <!-- /#wrapper -->
@stop