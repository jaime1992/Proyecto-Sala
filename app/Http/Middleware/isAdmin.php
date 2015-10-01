<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class isAdmin {

 protected $auth;

  public function __construct(Guard $auth)
  {
  $this->auth =$auth;    //incluir autenticacion
  }

	public function handle($request, Closure $next)
	{
		if(!$this->auth->check())
		{
			return redirect('auth.login');
		}
		return $next($request);
	}

	/*public function handle($request, Closure $next)
	{
        $user = Auth::user();
        if($user){
            if($user->roles()->get()[0]->nombre != 'Administrador')
                return redirect()->route('auth.login');
        }
        else{
            return redirect()->route('auth.login');
        }
		return $next($request);
	}*/
}


