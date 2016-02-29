<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Container\bind;
use Illuminate\Database\Eloquent\Model;

class ModelbinderMiddleware
{


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $route = $request->route();
        list($class, $method) = explode('@', $route[1]['uses']);
        $routeParams = $route[2];

        $reflect = new \ReflectionMethod($class, $method);
        $reflectedParams = $reflect->getParameters();

        foreach ($reflectedParams as $p) {
            $modelClass = $p->getClass();
            if (array_key_exists($p->name, $routeParams) &&
            ! $p->name instanceof Model) {
                $model = $modelClass->newInstance();

                $routeParams[$p->name] = $model->where(
                    $model->getRouteKeyName(),
                    $routeParams[$p->name]
                )->firstOrFail();

                /*app()->bind($modelClass->name, function() use ($instance) {
                    return $instance;
                });*/
            }
        }
        //$request->replace($routeParams);
        return $next($request);
    }
}
