@extends('Layout.administrador')

@section('content')

        <!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Crear Curso</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                   @if(Session::has('message'))

        
          <div class="alert alert-dismissible alert-info">
           <strong>{{ Session::get('message') }}</strong>
          </div>

      @endif


                 @if ($errors->any())
                    <div class="alert alert-success" role="alert">
                 
                    <ul>
                         @foreach($errors->all() as $error)
                         <li>{{ $error }} </li>
                          @endforeach
                      </ul>
                      @endif
                  </div>

<div style="float: right;width: 450px;">
  <div class="highlight" data-example-id="condensed-table" style="  width: 500px;background-color: rgb(225, 232, 236);">

                  {!! Form::open(['route' => 'Administrador.subirCursos.index',
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


                 {!! Form::open(['route' => 'Administrador.cursos.store', 'method' => 'POST']) !!}
                    <form role="form">
                        
                           <div class="form-group" style="width:900px">

                         {!! Form::label('nombre', 'Pertenece a Asignatura: ') !!}
                         {!! Form::select('asignatura_id', $asignaturas) !!}
                        
                        </div>
                         <div class="form-group" style="width:900px">

                         {!! Form::label('nombre', 'Pertenece a  Docente: ') !!}
                         {!! Form::select('docente_id', $docentes) !!}
                        
                        </div>
                        
                      <div class="form-group" style="width:900px">
                           {!! Form::label('semestre', 'Semestre') !!}
                            {!! Form::text('semestre', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese el semestre']) !!}
                        </div>
                        <div class="form-group" style="width:900px">
                           {!! Form::label('anio', 'Año') !!}
                            {!! Form::text('anio', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese el año']) !!}
                        </div>
                        <div class="form-group" style="width:900px">
                         {!! Form::label('seccion', 'Seccion') !!}
                            {!! Form::text('seccion', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese la seccion']) !!}
                        </div>

                           

                         <button type="submit" class="btn btn-success">Crear</button>
                         <a class="btn btn-danger" href="{{url('Administrador/cursos')}}" role="button">Cancelar</a>
                
                    </form>
                      {!! Form::close() !!}
                     
                    </div>

   
            </div>  
        </div>       <!-- /#page-wrapper -->


@stop