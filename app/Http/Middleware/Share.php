<?php

namespace App\Http\Middleware;

use Closure;

class Share
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
        \View::composer('blade._form', function($view){
            $view->with('tagList', \App\Tag::tagList());
        });

        return $next($request);
    }
}
