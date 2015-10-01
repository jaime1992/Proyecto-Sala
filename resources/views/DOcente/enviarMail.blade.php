@extends('Layout.docentes')

@section('content2')
<div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <br><br>
        <div class="page-content">
            <div class="row">
            <div class="col-xs-12">
                <form class="form-horizontal enviar_mensaje" method="post" action="/contacto/enviar_mensaje">
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tu Email </label>
                        <div class="col-sm-9" style="width: 50%;">
                            <div class="space-4"></div>
                            <p>
                                <input type="text">
                                
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mensaje <br><small class="text-success"><div id="contador">(500 caracteres)</div></small></label>
                        <div class="col-sm-9" style="width: 50%;">
                            <textarea name="mensaje" class="form-control mensaje" rows="5" maxlength="500" required="true" style="width: 500px;500px"></textarea>
                        </div>
                    </div>
                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-purple" type="submit">
                                <i class="ace-icon fa fa-envelope bigger-110"></i>
                                Enviar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      
        <div id="mensaje">
            
                            <div class="space-7"></div>
                <div class="content">
                    <div class="col-sm-10 col-sm-offset-1">
                        <br><br>
                        <div class="row">
                            <div class="alert alert-info">
                                <i class="ace-icon fa fa-info-circle"></i>
                                <strong>Atención!</strong> Para contactarnos contigo, verifica que tu email este actualizado.
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
        
    </div>
    </div>
</div>

@stop