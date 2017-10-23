<?php

namespace totalWebConnections\simpleBlog\Middleware;

use Closure;
use DB;

class blogSettings
{
    /**
     * Handles initial blog configuration
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $settings = DB::table('simpleBlog_settings')->first();
        

        if($settings === null){
            return view('simpleBlog::register');
        }
        return $next($request);
    }
}
