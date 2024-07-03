<?php
// app/Http/Middleware/CheckRole.php
namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    // public function handle($request, Closure $next, ...$roles)
    // {
    //     $user = User::find(Auth::id());
    //     if (Auth::check() &&  $user->hasAnyRole($roles)) {
    //         return $next($request);
    //     }

    //     return redirect()->route('home')->with('error', 'شما اجازه دسترسی به این بخش را ندارید.');
    // }

    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // $user = Auth::user();
        $user = User::find(Auth::id());
        // بررسی اینکه کاربر نقش "کاربر عادی" را ندارد
        if (!$user->hasRole('کاربر عادی')) {
            return $next($request);
        }

        return redirect()->route('admin.dashboard')->with('error', 'شما اجازه دسترسی به این بخش را ندارید.');
    }
}
