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
                        <h1 class="page-header">Asignar Sala</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>


             @if(Session::has('message'))
             <p class="alert alert-success">{{ Session::get('message')}} </p>
             @endif


           <div class="panel-body">
                <div class="row">
                  <div class="highlight" data-example-id="condensed-table" style="  width: 500px;">
    
 

                <div class="abuelo" style="width: 400px;">

                   {!! Form::open(['route' => 'Encargado.asignarSalas.store','method' => 'POST','id'=>'formulario']) !!}
        
                   <div style="float:left; width:170px;"> 
                    <label>Dias</label>
                    <?php $salas= array('1' => 'Lunes',
                                        '2' => 'Martes',
                                        '3' => 'Miercoles',
                                        '4' => 'Jueves',
                                        '5' => 'Viernes',
                                        '6' => 'Sabado',

                    ); ?>

                   {!! Form::select('dias[]', $salas , null , ['class' => 'browser-default']) !!}      
                   </div>

                   
                   <div style="float:right; width:170px;">
                    <label>periodo</label>
                   {!! Form::select('periodo[]', $periodo , null , ['class' => 'browser-default']) !!}
                   </div>

                  <div class="padre" style="display: inline-block; margin-left: 140px;"> 
                  <a class="btn btn-info btn-sm" id="menos"><i class="">-</i></a>
                  <a href="#"class="btn btn-danger btn-sm"  id="mas"><i class="">+</i></a>
                  </div>

    <br></br>

          <div>
                
                  {!! Form::label('campus', 'Seleccione Campus:') !!}
                  {!! Form::select('campus',  array('default' => 'Seleccione Campus')+$campus ,
                   null , ['class' => 'browser-default', 'id' => 'campus']) !!}
                         <br><br>
          </div>
          <div>

              {!! Form::label('salas', 'Seleccione Salas:') !!}
             {!! Form::select('salas', array('default' => 'Seleccione Sala')
              , null , ['class' => 'browser-default', 'id' => 'salas']) !!}
                <br><br>
          </div>
        <div>
             {!! Form::label('curso', 'Seleccione Curso:') !!}
           <select class="browser-default" name="curso">
           <option value="" disabled selected>Seleccione curso (Identificador)</option>
            @foreach($cursos as $curso)
           <option value="{{ $curso->id}}">{{ $curso->id}}</option>
             @endforeach
           </select>
           <br></br>

    <button class="btn btn-warning" type="submit">Asignar Sala</button>
         {!! Form::close() !!}

        
          </div>

     </div>
   </div>
                            
                                <div id="dataTables-example_wrapper" 
                                class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                         






                                <div class="row">
                                <div class="col-sm-12">

                         <div style=" margin-top: 30px;">  
                         <br></br>  
                         <h3> Listado de Cursos </h3>     
                         <br></br>  
                                
                            <table id="table_id" class="table table-bordered">
                                    <thead>
                                        <tr>
            <th>Identificador Curso</th>
    
            <th>Asignatura</th>
            <th>Docente</th>
            <th>Semestre</th>
            <th>Seccion</th>
            <th>Año</th>
         
        </tr>
                                    </thead>
                                    <tbody>
                                           @foreach($cursos as $curso)
            <tr>
               <td>{{ $curso->id}}</td>
          
              <td>{{ $curso->asignaturas->nombre }}</td>
              <td>{{ $curso->docentes->nombres." ".$curso->docentes->apellidos }}</td>
              <td>{{ $curso->semestre }}</td>
              <td>{{ $curso->seccion }}</td>
              <td>{{ $curso->anio }}</td>
              

       
            </tr>
          @endforeach
                                         
                                           
                                      

                                     
                                    </tbody>
                                    
                               </table>
                          
                                    
                                 

                                </div>  

                                                      
                        </div> 

            </div>      <!-- /#page-wrapper -->



    </div>


   </div>



@stop

@section('js_bottom')




<script>

 $(document).ready(function(){ 


  $('#campus').on('click', function(e) 
  {  
     e.preventDefault();


    var id_campus=$(this).val();
     console.log(id_campus);
     
        $.ajaxSetup({
                headers: {
                    'X-XSRF-Token': $('meta[name="csrf-token"]').attr('content')
                   
                }
            });

  
     //this.val devuelve el id del elemento de la lista seleccionada (value)
    $.ajax({
        type: "GET",
        url: '{{ route('Encargado.asignarSalas.show') }}',
        dataType: 'json',
        data : {id:id_campus},
        
          beforeSend: function(){
               
          },
          success: function (data) 
          {//data es un arreglo de objetos en json
            console.log(data);
              var datos = '';


                 $.each(data ,function(index,value)
                {
                   $.each(value ,function(index,values)
                  {            
                   // console.log(value[index]);
                    datos+='<option value='+value[index].id+'>'+value[index].nombre+'</option>';
                  
                 });
               });
                 
             $("#salas").html(datos);
             
          }
        

      })






   
    });


      $('#mas').on('click', function(e) 
     {  
         e.preventDefault();
         
                    <?php $salas= array('1' => 'Lunes',
                                        '2' => 'Martes',
                                        '3' => 'Miercoles',
                                        '4' => 'Jueves',
                                        '5' => 'Viernes',
                                        '6' => 'Sabado',

                    ); ?>


          var template=   '<div class="dinamico">'+
                         '<div style="float:left; width:170px;">'+ 
                          '<label>Dias</label>'+
                         '{!! Form::select('dias[]', $salas , null , ['class' => 'browser-default']) !!}'+      
                         '</div>'+
                       '<div  style="float:right; width:170px;">'+
                          '<label>periodo</label>'+
                         '{!! Form::select('periodo[]', $periodo , null , ['class' => 'browser-default']) !!}'+
                         '</div>'+
                         '</div>'
           
             $(this).parents(".padre").before(template);

       });



      $('#menos').on('click', function(e) 
      {  
         e.preventDefault();
          
             $('.abuelo .dinamico').last().remove();

       });




  var form = $('#formulario');
      form.on("submit",function(e) {
  
       e.preventDefault();

        /*
        para usar este tengo que sacar cotchetes del name rut_encargadoss
      var checkedItemsAsString = $('select[name="rut_encargadoss"] option:selected').map(function()
      {
        console.log($(this).val());
      return $(this).val();

      }).get();

      console.log(checkedItemsAsString);
      */
      
          $.ajaxSetup({
                headers: {
                    'X-XSRF-Token': $('meta[name="csrf-token"]').attr('content')
                   
                }
            });

          $.ajax({
              type: 'POST',
              url: form.attr('action'),
              data: form.serialize(),
               dataType: "json",
              beforeSend: function(){
                
              },
              complete: function(data){
                
              },
              success: function (data) {

                 switch(data.resultado){
                    case 'EXISTE':

                    console.log(data.datos);
                          $.each(data.datos ,function(index,value)
                          {
                            console.log(value);
                          });

                         console.log("Registro ya existe ");
                         alert("Registro ya existe");
                         location.reload();
                      
                        break;
                    case 'NO_EXISTE':
                       
                        console.log("Registro creado correctamente");
                        alert("Registro creado correctamente");
                        location.reload();
                        break;

                  
                }
/*
       
          $(".errors_form").html("");
          $(".success_message").hide().html("");
                if(data.success == false){
                  var errores = "";
                  for(datos in data.errors){
                    errores += "<p class='alert alert-danger' style='padding: 5px;'>" + data.errors[datos] + "</p>";
                  }
                  $(".errors_form").html(errores)
                }else{
                  $(form)[0].reset();//limpiamos el formulario
                  //muestro en el div todos los errores
                  $(".success_message").show().html(data.message)
                  // Recargo la página
                        location.reload();


                }
                */

              },
              error: function(errors){
                console.log(errors);
                /*
          $(".errors_form").html("");
                $(".errors_form").html(errors);
                */
              }
          });

     
  });

});




</script>

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

