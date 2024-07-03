<?php

// app/Http/Middleware/CheckPermission.php
namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    public function handle($request, Closure $next, $permission)
    {
        $user = User::find(Auth::id());

        if (Auth::check() && $user->can($permission) or $user->hasRole('مدیر کل')) {
            return $next($request);
        }

        return redirect()->route('admin.dashboard')->with('error', 'شما اجازه دسترسی به این بخش را ندارید.');
    }
}
