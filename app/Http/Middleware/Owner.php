<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Owner
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

        $uses = $request->route()->getAction();
        $controller_name = explode('@', $uses['uses'])[0];
        $controller = App($controller_name);

        #dd($request->route()->parameters());
        #$reflectionMethod = new \ReflectionMethod($controller_name,'getResource');
        #$resource = $reflectionMethod->invokeArgs($controller,$request->route()->parameters());
        $resource = $controller->getResource($request->route()->parameters());
        #dd($resource);
        #dd($resource->all()[0]->guarded[0]);
        #dd($resource->all()[0]->getAttribute('user_id'));

        $id = $resource->all()[0]->getAttribute('user_id');


        if($id != $this->auth->user()->id)
        {
            if($request->ajax()){
                return response("Vous n'êtes pas authorisé", 404);
            }
            else{
                return redirect('/')->with('error','Vous ne pouvez pas éditer ce contenu');
            }
        }
        #dd($request->route()->parameterNames()[0]);
        #dd($resource->all()[0]);
        #dd($resource->all()[0]->getAttribute('user_id'));
        $request->route()->setParameter($request->route()->parameterNames()[0], $resource->all()[0]);
        return $next($request);
    }
}
