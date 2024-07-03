<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRequestMethod
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
        // چک کردن اگر درخواست GET به مسیر delete ارسال شده است
        if ($request->isMethod('get') && $request->is('admin/roles/delete/*')) {
            return redirect()->route('admin.roles.index')->with('error', 'روش درخواست نامعتبر است.');
        }

        return $next($request);
    }
}
