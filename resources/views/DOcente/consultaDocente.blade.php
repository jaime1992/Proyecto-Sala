@extends('Layout.docentes')

@section('content2')  

<!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
        <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Consultas Específicas</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>


{!! Form::open(['route' => 'Docente.consultas.store', 'method' => 'POST','id'=>'formularioeditar']) !!}

<div class="col-md-12">   

<div class="col-md-3">
 <!-- FORMULARIO SEDE --> 
<select class="form-control" style="width:100%" name="campus">
  <option value="1" selected disabled>CAMPUS</option>
  @foreach($campus as $campu)
  <option value="{{$campu->id}}">{{$campu->nombre}}</option>
  @endforeach
</select>
  <!-- FIN FORMULARIO SEDE -->
</div>

<div class="col-md-3">
 <!-- FORMULARIO SEDE --> 
<select class="form-control" style="width:100%" name="bloque">
  <option value="1" selected disabled>BLOQUE</option>
  @foreach($bloques as $bloque)
  <option value="{{$bloque->id}}">({{$bloque->bloque}}) | {{$bloque->inicio}} - {{$bloque->fin}}</option>
  @endforeach
</select>
  <!-- FIN FORMULARIO SEDE -->
</div>

<div class="col-md-3">
 <!-- FORMULARIO SEDE --> 
<input type='date' style="width:100%" class="form-control" name="fecha"/>
  <!-- FIN FORMULARIO SEDE -->
</div>

<div class="col-md-3">
 <!-- FORMULARIO SEDE --> 
  <button class="btn btn-primary btn-lg" type="submit" style="background-color: rgb(87, 215, 113);">
    Consultar
  </button>
  <!-- FIN FORMULARIO SEDE -->
</div>
{!! Form::close() !!}

<br><br><br><br>

<!-- ==================== -->
<div class="row">

  <div class="col-md-6">
    
    <div class="list-group" id="tipos" style="">
    <!-- ACA SE CARGA CON AJAX LOS DATOS-->
    </div>

  </div>

</div>
<!-- ====================-->

</div>

    </div>




                <!-- /.row -->
            </div>          
          

@stop

@section('js_bottom')

 <script>
  
$(document).ready(function(e) {
      $('#formularioeditar').on('submit', function(e)
      {
               e.preventDefault();
               var id_campus="holahola";
               //console.log(id_campus);
              //var CSRF_TOKENS = $('meta[name="csrf-token"]').attr('content');
               $.ajaxSetup({
                headers: { 'X-XSRF-Token': $('meta[name="csrf-token"]').attr('content') }
               });
              $.ajax({
                  type: 'POST',
                  url: $(this).attr('action'),
                  data: $(this).serialize(),
                  dataType: "json",
                  beforeSend: function(){
                  },
                  complete: function(data){
                  },
                  success: function (data)
                  {
                    console.log(data);

                      var datos="";
                       
                         console.log(data);

                          $.each(data ,function(index,value)
                          {
                             $.each(value ,function(index,values)
                            {            
                              console.log(value[index]);

                          
                      
                             datos+=

                             '<a href="#!" class="list-group-item">'+value[index].nombre+'</a>';

                            //  datos+='<option value='+value[index].id+'>'+value[index].nombre+'</option>';
                            
                            });

                         });

                          if (datos == "") {datos = '<a href="#!" class="list-group-item">No hay coincidencias con su búsqueda</a>'}

                            $("#tipos").html(datos);
                 
                  },
                  error: function(errors){
                    console.log(errors);
                  }
              });
            });
});      

</script> 

@endsection