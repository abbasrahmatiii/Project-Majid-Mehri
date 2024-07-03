<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventGetMethodForDeleteRoutes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // List of routes that should not be accessed with GET method
        $restrictedRoutes = [
            'admin/roles/delete/*',
        ];

        foreach ($restrictedRoutes as $route) {
            if ($request->is($route) && $request->isMethod('get')) {
                abort(403, 'GET method is not supported for this route.');
            }
        }

        return $next($request);
    }
}
