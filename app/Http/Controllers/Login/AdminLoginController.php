<?php namespace App\Http\Controllers\Login;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminLoginController extends Controller {

	protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function getLogin()   //metodo que muestra la vista
    {
        return view('Login.login');   
    }

    public function postLogin(Request $request)
    {

        $credenciales = $request->only(['rut', 'password']);
        $rules = [ // Reglas de validacion TODO: validar rut
            'rut'    => 'required',
            'password' => 'required'
        ];

        $this->validate($request, $rules); // Valida que se envien ambos parametros

        if ($this->auth->attempt($credenciales, $request->has('remember')))
        { // Login exitoso
            return redirect()->intended('dashboard');
        }

        return redirect()->route('auth.login')
            ->withInput($request->only(['rut', 'remember']))
            ->withErrors(['rut' => 'Sus credenciales no son válidas, intente nuevamente!']);
    }

    public function getLogout()  //metodo que cierra sesion del usuario
    { 
        $this->auth->logout();
        return redirect()->route('auth.login')
            ->with('message', 'Ha salido correctamente');
    }
}

