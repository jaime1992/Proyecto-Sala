@extends('Layout.encargado')

@section('content3')

        <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Ingresar Docente</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                 @if ($errors->any())
                    <div class="alert alert-info" role="alert">
                 
                    <ul>
                         @foreach($errors->all() as $error)
                         <li>{{ $error }} </li>
                          @endforeach
                      </ul>
                      @endif
                  </div>



                <div style="float: right;width: 450px;">

                    <div class="highlight" data-example-id="condensed-table" style="  width: 500px;background-color: rgb(225, 232, 236);">
                  {!! Form::open(['route' => 'Encargado.subirDocentes.index',
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

                 {!! Form::open(['route' => 'Encargado.docentes.store', 'method' => 'POST']) !!}
                    <form role="form">

                         <div class="form-group" style="width:900px">
                         {!! Form::label('rut', 'Rut') !!}
                            {!! Form::text('rut', '',['class' => 'form-control',
                             'placeholder' => 'Ej: 18116826 (Sin digito verificador, ni puntos)']) !!}
                        </div>
                      
                        <div class="form-group" style="width:900px">
                           {!! Form::label('nombres', 'Nombres') !!}
                            {!! Form::text('nombres', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese los nombres']) !!}
                        </div>
                         
                         <div class="form-group" style="width:900px">
                         {!! Form::label('apellidos', 'Apellidos') !!}
                            {!! Form::text('apellidos', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese los apellidos']) !!}
                        </div>
                      
                      <div class="form-group" style="width:900px">
                         {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese el email']) !!}
                        </div>


                      <div class="form-group" style="width:900px">

                         {!! Form::label('nombre', 'Pertenece a  Departamento: ') !!}
                         {!! Form::select('departamento_id', $departamentos) !!}
                        
                        </div>

                         <button type="submit" class="btn btn-primary">Crear</button>
                         <a class="btn btn-default" href="{{url('Encargado/docentes')}}" role="button">Cancelar</a>

                         
                    </form>
                      {!! Form::close() !!}


                       
                   </div>
            </div>  
        </div>       <!-- /#page-wrapper -->


@stop


         