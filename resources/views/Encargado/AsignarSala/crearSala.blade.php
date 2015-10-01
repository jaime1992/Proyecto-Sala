@extends('Layout.encargado')

@section('content3')


<!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Crear Sala</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                 @if ($errors->any())
                    <div class="alert alert-warning" role="alert">
                 
                    <ul>
                         @foreach($errors->all() as $error)
                         <li>{{ $error }} </li>
                          @endforeach
                      </ul>
                      @endif
                  </div>


                   <div style="float: right;width:450px;">
                    <div class="highlight" data-example-id="condensed-table" style="  width: 500px;background-color: rgb(225, 232, 236);">

                      {!! Form::open(['route' => 'Encargado.subirSalas.index',
     'method' =>'POST','enctype' =>'multipart/form-data']) !!}
         <div class="form-group">
            <div class="panel-body">
          
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <div class="form-group">
              <label class="col-md-4 control-label">Seleccione el archivo: </label>
                    <input type="file" style="width:80%" class="form-control" name="file" >
                    {!!Form::button('Enviar',['class' => 'btn btn-primary','type' => 'submit','style' => 'margin-top:20px;float:right;margin-top:-30px;margin-left:20px'])!!}
                 </div>
               </div>
             </div>
          </div>  

            {!! Form::close() !!} 

</div>

<div class="highlight" data-example-id="condensed-table" style="width:650px">




                 {!! Form::open(['route' => 'Encargado.salas.store', 'method' => 'POST']) !!}
                    <form role="form">
                        
                        
                       <div class="form-group">
                           {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese el nombre']) !!}
                        </div>
                        <div class="form-group">
                           {!! Form::label('descripcion', 'Descripcion') !!}
                            {!! Form::textarea('descripcion', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese una descripcion']) !!}
                        </div>
                         <div class="form-group">
                         {!! Form::label('capacidad', 'Capacidad') !!}
                            {!! Form::text('capacidad', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese la capacidad']) !!}
                        </div>

                        <div class="form-group">


                         {!! Form::label('nombre', 'Pertenece a: ') !!}

                         {!! Form::label('nombre', $campus->nombre ) !!}
                         
                        
                        </div>
                           <div class="form-group">

                         {!! Form::label('nombre', 'Se clasifica en: ') !!}
                         {!! Form::select('tipo_sala_id', $tipos) !!}
                        
                        </div>

                           

                         <button type="submit" class="btn btn-warning">Crear</button>
                         <a class="btn btn-default" href="{{url('Encargado/salas')}}" role="button">Cancelar</a>
                        
                    </form>
                      {!! Form::close() !!}
                      </div>


            </div>  
        </div>       <!-- /#page-wrapper -->

@stop        
