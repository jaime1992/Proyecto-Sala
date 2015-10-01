@extends('Layout.encargado')

@section('content3')



<div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Encargado de Campus UTEM</h1>
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
      <img src="../../images/chile.jpg"  height="450px"alt="...">
      <div class="carousel-caption">
        
      </div>
    </div>
    <div class="item">
      <img src="../../images/cinara.JPG" alt="...">
      <div class="carousel-caption">
        
      </div>
    </div>
    <div class="item">
      <img src="../../images/paulo.jpg" alt="...">
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
<br><br>
    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="../../images/p1.jpg" alt="...">
                                    <div class="caption">
                                        <h3>Más Información</h3>
                                            
                                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">Ver mas</button>
                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                     <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                         <h4 class="modal-title" id="myModalLabel">Nuestro Sistema</h4>
                                                     </div>
                                                    <div class="modal-body">
                                                        <p>Ésta plataforma fue diseñada por y para nosotros, alumnos y 
                        funcionarios UTEM, está basado en la administración, consultoria 
                        de salas y horarios, con el fin de encontrar una mejor organización
                         y orientación a la hora de nuestras clases.</p>
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
                            <div class="thumbnail">
                                <img src="../../images/p2.jpg" alt="...">
                                    <div class="caption">
                                        <h3>Actualidad</h3>
                                       <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal2">Ver mas</button>
                                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                     <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                         <h4 class="modal-title" id="myModalLabel">UTEM al día</h4>
                                                     </div>
                                                    <div class="modal-body">
                                         
                                                    
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
                            <div class="thumbnail">
                                <img src="../../images/p3.jpg" alt="...">
                                    <div class="caption">
                                        <h3>UTEM al Día</h3>
                                            
                                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal3">Ver mas</button>
                                        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                     <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                         <h4 class="modal-title" id="myModalLabel">Utem al día</h4>
                                                     </div>
                                                    <div class="modal-body">
                                                        
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

            <!-- /#page-wrapper -->

  @stop