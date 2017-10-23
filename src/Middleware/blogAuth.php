<?php

namespace totalWebConnections\simpleBlog\Middleware;

use Closure;
use Auth;
use Config;

class blogAuth
{
    /**
     * Handles authenctication for the blog backend
     * All backend requests go through here first Except the initial setup
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $provider = config('simpleBlog.providers');
        Config::set('auth.providers',$provider);
        if(Auth::user())
        {
            return $next($request);
        }
        return redirect('blog/login');
        
    }
}
