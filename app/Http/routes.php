<?php


Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

//PRUEBA SUBIR ARCHIVOS





//RUTAS LOGIN
Route::get('dashboard', ['middleware' => 'is_admin', function()
{
    return view('Layout.administrador');   

}]);

Route::controller('auth', 'Auth\AuthController', [
    'getLogin'  => 'auth.login',
    'postLogin' => 'auth.doLogin',
    'getLogout' => 'auth.logout'
]);

Route::get('/home',['as'=>'home','middleware'=>['auth','redir'],function(){
	return 'bienvenido';
}]);


//RUTAS DEL ADMINISTRADOR
Route::group(['middleware' =>['auth','admin']], function () {
Route::group(['prefix'     => 'Administrador', 
	         'namespace' => 'Administrador'], function(){

Route::resource('bienvenido', 'AdministradorController');

Route::resource('cambiarperfil','PerfilController');
Route::resource('descargarPerfiles','ArchivosPerfilController');

//Configuraciones de usuarios
Route::resource('docente','DocentesAController');
Route::resource('descargarDocentes','ArchivoDocentesController');
Route::resource('subirDocentes','SubirArchivosDocentesController');

Route::resource('estudiante','EstudiantesAController');
Route::resource('descargarEstudiantes','ArchivoEstudiantesController');
Route::resource('subirEstudiantes','SubirArchivosEstudiantesController');

Route::resource('funcionarios','FuncionariosController');
Route::resource('descargarFuncionarios','ArchivoFuncionariosController');
Route::resource('subirFuncionarios','SubirArchivosFuncionariosController');

Route::resource('roles','RolController');
Route::resource('descargarRoles','ArchivoRolesController');
Route::resource('subirRoles','SubirArchivosRolesController');

Route::resource('usuarios','UsuariosController');
Route::resource('descargarUsuarios','ArchivoUsuariosController');
Route::resource('subirUsuarios','SubirArchivosUsuariosController');

//Configuraciones academicas
Route::resource('asignaturas','AsignaturaController');
Route::resource('descargarAsignaturas','ArchivoAsignaturasController');
Route::resource('subirAsignaturas','SubirArchivosAsignaturasController');

Route::resource('asignaturasCursadas','AsignaturasCursadasController'); //NO ME FUNCIONO :(
Route::resource('descargarAsignaturasCursada','ArchivoAsignaturasCursadasController');

Route::resource('carreras','CarrerasController');
Route::resource('descargarCarreras','ArchivoCarrerasController');
Route::resource('subirCarreras','SubirArchivosCarrerasController');

Route::resource('cursos','CursosController');
Route::resource('descargarCursos','ArchivoCursosController');
Route::resource('subirCursos','SubirArchivosCursosController');

//Route::resource('horarios','HorariosController');
//Route::resource('descargarHorarios','ArchivoHorariosController');
//Route::resource('subirHorarios','SubirArchivosHorariosController');

Route::resource('horarioss','PeriodoSalaController');
//Route::resource('descargarHorarios','ArchivoHorariosController');
//Route::resource('subirHorarios','SubirArchivosHorariosController');

Route::resource('periodos','PeriodosController');
Route::resource('descargarPeriodos','ArchivoPeriodosController');
Route::resource('subirPeriodos','SubirArchivosPeriodosController');


//Configuracion de sedes
Route::resource('campus','CampusController');
Route::resource('descargarCampus','ArchivoCampusController');
Route::resource('subirCampus','SubirArchivosCampusController');

Route::resource('facultades','FacultadController');
Route::resource('descargarFacultades','ArchivoFacultadesController');
Route::resource('subirFacultades','SubirArchivosFacultadesController');

Route::resource('departamentos','DepartamentosController');
Route::resource('descargarDepartamentos','ArchivoDepartamentosController');
Route::resource('subirDepartamentos','SubirArchivosDepartamentosController');

Route::resource('escuelas','EscuelaController');
Route::resource('descargarEscuelas','ArchivoEscuelasController');
Route::resource('subirEscuelas','SubirArchivosEscuelasController');

Route::resource('salas','SalasController');
Route::resource('descargarSalas','ArchivoSalasController');
Route::resource('subirSalas','SubirArchivosSalasController');

Route::resource('tiposSalas','TipoSalaController');
Route::resource('descargarTipoSala','ArchivoTipoSalasController');
Route::resource('subirTipoSala','SubirArchivosTipoSalaController');


});
});


//RUTAS DEL ENCARGADO CAMPUS
Route::group(['middleware' =>['auth','encar']], function () {
Route::group(['prefix' =>  'Encargado', 'namespace' => 'Encargado'], function(){

Route::resource('bienvenido','EncargadoController');

Route::resource('consultas','ConsultaEncargadoController');

Route::resource('asignarSalas','SalasAsignarController');
Route::resource('salas','SalasEController');
Route::resource('subirSalas','SubirArchivosSalasController');


Route::resource('estudiantes','EstudianteEncargadoController');
Route::resource('descargarEstudiantes','ArchivosEstudianteEController');
Route::resource('subirEstudiantes','SubirArchivosEstudiantesController');

Route::resource('docentes','DocenteEncargadoController');
Route::resource('descargarDocentes','ArchivosDocenteEController');
Route::resource('subirDocentes','SubirArchivosDocentesController');

Route::resource('cursos','CursoEncargadoController');
Route::resource('descargarCursos','ArchivosCursoEController');
Route::resource('subirCursos','SubirArchivosCursosController');

Route::resource('asignaturas','AsignaturaEncargadoController');
Route::resource('descargarAsignaturas','ArchivosAsignaturaEController');
Route::resource('subirAsignaturas','SubirArchivosAsignaturasController');

Route::resource('asignaturasCursadas','AsignaturasCursadasController');


});
});


//RUTAS DEL ESTUDIANTE

Route::group(['middleware' =>['auth','est']], function () {
Route::group(['prefix' =>  'Estudiante', 'namespace' => 'Estudiante'], function(){

Route::resource('bienvenido','EstudianteController');
Route::resource('consultas','ConsultaEstudianteController');



});
});


//RUTAS DEL DOCENTE

Route::group(['middleware' =>['auth','doc']], function () {
Route::group(['prefix' =>  'Docente', 'namespace' => 'Docente'], function(){

Route::resource('bienvenido','DocenteController');
Route::resource('consultas','ConsultaDocenteController');



});
});


/*

//RUTAS DE PRUEBA

//Route::get('usuario','AdminController@usuarios');
//Route::resource('usuarios','UsuarioController');
//Route::resource('user','UserController');


//RUTAS DEL LOGIN
Route::get('login', function()
{ //voy a la vista login
 
   return view('Login.login');
});

Route::get('logout', function() {
  Auth::logout();
  return redirect()->route('login');

});

Route::post("login","LoginController@acceder2"); */