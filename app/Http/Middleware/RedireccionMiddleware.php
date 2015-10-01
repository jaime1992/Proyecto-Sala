<?php namespace App\Http\Middleware;

use Closure;
use Auth;

class RedireccionMiddleware {

	public function handle($request, Closure $next)
	{
		$user = Auth::user();
        //dd($user->roles()->whereNombre('Administrador')->first());
		if($user->roles()->whereNombre('Administrador')->first()){
			return redirect()->route('Administrador.bienvenido.index');
		}
		elseif ($user->roles()->whereNombre('Encargado')->first()){
            return redirect()->route('Encargado.bienvenido.index');
        }
        elseif($user->roles()->whereNombre('Estudiante')->first()){
            return redirect()->route('Estudiante.bienvenido.index');
        }
        else if($user->roles()->whereNombre('Docente')->first()){
            return redirect()->route('Docente.bienvenido.index');
        }
		return $next($request);
	}


}
