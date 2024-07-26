<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ForgotPasswordController extends Controller
{
    use ResetsPasswords;

    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        // پیدا کردن کاربر با ایمیل داده شده
        $user = \App\Models\User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'کاربری با این ایمیل یافت نشد.']);
        }

        // ایجاد توکن برای کاربر
        $broker = Password::broker();
        $token = $broker->createToken($user);

        // ارسال ایمیل با قالب سفارشی
        Mail::to($request->email)->send(new PasswordResetMail($token, $request->email));

        // بازگشت با پیام موفقیت
        return redirect()->back()->with('status', 'لینک بازیابی رمز عبور به ایمیل شما ارسال گردید.');
    }

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }
}
