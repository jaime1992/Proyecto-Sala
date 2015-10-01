<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		

		{!! HTML::style('css/login.css') !!}
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
		<!--//webfonts-->


<script>
$(document).ready (function () { $('#rut').Rut({ on_error: function(){ alert('Rut incorrecto !! Ingrese un Rut Válido'); } }); }) ; 
</script>

<script> jQuery(document).ready(function($) { $("#rut").Rut(); }); </script>

		
</head>




<body style="background-image:url('../../images/green.png')">
	 <div class="main ">
		<div class="login-form z-depth-5">
			<h1>Universidad Tecnologica Metropolitana</h1>
					<div class="head">
						<img src="../../images/use.jpg" alt=""/>
					</div>

					   @if ($errors->any())
                    <div class="alert alert-warning" role="alert">
                 
                    <ul>
                         @foreach($errors->all() as $error)
                         <li>{{ $error }} </li>
                          @endforeach
                      </ul>
                      @endif
				    {!! Form::open(['route' => 'auth.doLogin', 'method' => 'POST']) !!}

						<input type="text" name="rut"   placeholder="Ingrese Rut" >
						<input type="password" name="password"  placeholder="Ingrese Contraseña Dirdoc">
                       
						<div class="submit">
							<input type="submit" value="ENTRAR" >
					</div>	
					<p><a href="#">Olvidaste la contraseña ?</a></p>
				{!! Form::close() !!}
			</div>

			<!--//End-login-form-->
		</div>		

		<div class="container" style="margin-top: 100px;">
        <footer>© Sistema de salas UTEM - 2015</footer>
      </div>	
		 
</body>
</html>