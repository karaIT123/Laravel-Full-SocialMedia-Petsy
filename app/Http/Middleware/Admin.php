<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class Admin
{
    /**
     * @var Guard
     */
    private $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($this->auth->guest() || $this->auth->user()->role != 'admin')
        {
            if($request->ajax()){
                return response("Vous n'êtes pas authorisé", 404);
            }
            else{
                return redirect('/')->with('error','Vous ne pouvez pas éditer ce contenu');
            }
        }
        return $next($request);
    }
}
