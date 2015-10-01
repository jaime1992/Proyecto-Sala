@extends('Layout.administrador')

@section('content')


   <div class="col-sm-9" >
   <p> <h2>Subir archivo con Campus</h2></p>

      @if(Session::has('message'))

        
          <div class="alert alert-dismissible alert-success">
           <strong>{{ Session::get('message') }}</strong>
          </div>

      @endif



<div class="bs-docs-section">                
 <div class="panel panel-default">
   <div class="panel-body">
       <div class="form-group">
  


 {!! Form::open(['action' => 'AdminController@postCampus','files'=>true]) !!}

 
<div class="form-group">
        <div class="panel-body">
          
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <div class="form-group">
              <label class="col-md-4 control-label">Seleccione el archivo con los Campus</label>
              <div class="col-md-6">
                <input type="file" class="form-control" name="file" >
              </div>
            </div>
        </div>
 </div>

     <div align="center"<th><button type="submit" class="btn btn-success">Subir Campus</button></th></div>

    {!! Form::close() !!}



</div>
</div>
</div>               
</div>


    </div>
                    
@stop


esto va en la vista de crear campus, al principio

 <div class="col-sm-9" >

         <p>
            {!! Form::open(['route' => 'AdminController@getCampus', 'method' => 'GET']) !!}
   
            <button type="submit" class="btn btn-info pull-right">Subir archivo</button>

            {!! Form::close() !!}
         </p>