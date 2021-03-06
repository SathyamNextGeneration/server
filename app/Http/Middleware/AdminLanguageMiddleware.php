<?php

namespace App\Http\Middleware;

use Closure;
use Carbon;

class AdminLanguageMiddleware
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
        \Config::set('auth.admins.users.model', 'App\Admin');

       if (\Auth::check()) {
          
            $language = config('constants.default_lang','en');
            if(\Auth::user()->language){
               $language = \Auth::user()->language;
           }
            \Carbon\Carbon::setLocale($language);
           \App::setLocale($language);

       }
       return $next($request);
      
    }
}