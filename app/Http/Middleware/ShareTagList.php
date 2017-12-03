<?php
namespace App\Http\Middleware;
use App\Tag;
use Closure;
use View;

class ShareTagList
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
        View::composer('blog._form', function($view){
            $view->with('tagList', Tag::tagList());
        });
        return $next($request);
    }

}