@extends('Layout.estudiantes')

@section('content4')
<!-- Page Content -->
         <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bienvenido al nuevo sistema de control de salas</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="../../images/biblio.jpg"  height="450px"alt="...">
      <div class="carousel-caption">
        
      </div>
    </div>
    <div class="item">
      <img src="../../images/paulo.jpg" alt="...">
      <div class="carousel-caption">
        
      </div>
    </div>
    <div class="item">
      <img src="../../images/2.jpg" alt="...">
      <div class="carousel-caption">
        
      </div>
    </div>
    
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<div class="row"></div>
                
                
                <!-- /.row -->
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="../../images/ls.jpg" alt="...">
                                    <div class="caption">
                                        <h3>UTEM, Sede Macul</h3>
                                            <p>Facultad de ingeniería, José Pedro Alessandri 1242</p>
                                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">Ver mas</button>
                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                     <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                         <h4 class="modal-title" id="myModalLabel">Mapa del Sitio</h4>
                                                     </div>
                                                    <div class="modal-body">
                                                        <img src="../../images/pantalla2.png" alt="...">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail" style="height: 382px;">
                                <img src="../../images/centro2.jpg" style="  height: 214px;">
                                    <div class="caption">
                                        <h3>UTEM, Sede Dieciocho</h3>
                                            <p>Facultad de Ciencias de la Construcción y Ordenamiento Territorial, Dieciocho 161</p>
                                       <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal2">Ver mas</button>
                                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                     <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                         <h4 class="modal-title" id="myModalLabel">Mapa del Sitio</h4>
                                                     </div>
                                                    <div class="modal-body">
                                                        <img src="../../images/pantalla.png">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail" style="height: 382px">
                                <img src="../../images/fae.jpg" style="  height: 214px;">
                                    <div class="caption">
                                        <h3>UTEM, Sede FAE</h3>
                                            <p>Facultad de Administración y Economía, Dr. Hernán Alessandri 644</p>
                                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal3">Ver mas</button>
                                        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                     <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                         <h4 class="modal-title" id="myModalLabel">Mapa del Sitio</h4>
                                                     </div>
                                                    <div class="modal-body">
                                                        <img src="../../images/pantalla3.png">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>


                      
            </div> 
        </div>
    <!-- /#wrapper -->
@stop