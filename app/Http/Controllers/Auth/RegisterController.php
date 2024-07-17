<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|string|max:15|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
        ]);

        // Assign default role
        $user->assignRole('کاربر عادی');
        Auth::login($user);
        return redirect('/')->with('success', 'ثبت‌نام با موفقیت انجام شد');
    }


    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $messages = [
            'first_name.required' => 'لطفاً نام را وارد کنید.',
            'first_name.string' => 'نام باید یک رشته باشد.',
            'first_name.max' => 'نام نباید بیشتر از ۲۵۵ کاراکتر باشد.',
            'last_name.required' => 'لطفاً نام خانوادگی را وارد کنید.',
            'last_name.string' => 'نام خانوادگی باید یک رشته باشد.',
            'last_name.max' => 'نام خانوادگی نباید بیشتر از ۲۵۵ کاراکتر باشد.',
            'email.required' => 'لطفاً ایمیل را وارد کنید.',
            'email.string' => 'ایمیل باید یک رشته باشد.',
            'email.email' => 'لطفاً یک ایمیل معتبر وارد کنید.',
            'email.max' => 'ایمیل نباید بیشتر از ۲۵۵ کاراکتر باشد.',
            'email.unique' => 'ایمیل وارد شده قبلاً ثبت شده است.',
            'mobile.required' => 'لطفاً شماره موبایل را وارد کنید.',
            'mobile.string' => 'شماره موبایل باید یک رشته باشد.',
            'mobile.max' => 'شماره موبایل نباید بیشتر از ۱۵ کاراکتر باشد.',
            'mobile.unique' => 'شماره موبایل وارد شده قبلاً ثبت شده است.',
            'password.nullable' => 'رمز عبور می‌تواند خالی باشد.',
            'password.string' => 'رمز عبور باید یک رشته باشد.',
            'password.min' => 'رمز عبور باید حداقل ۸ کاراکتر باشد.',
            'password.confirmed' => 'تایید رمز عبور با رمز عبور همخوانی ندارد.',
            'address.nullable' => 'آدرس می‌تواند خالی باشد.',
            'address.string' => 'آدرس باید یک رشته باشد.',
            'address.max' => 'آدرس نباید بیشتر از ۲۵۵ کاراکتر باشد.',
            'state.nullable' => 'استان می‌تواند خالی باشد.',
            'state.string' => 'استان باید یک رشته باشد.',
            'state.max' => 'استان نباید بیشتر از ۲۵۵ کاراکتر باشد.',
            'city.nullable' => 'شهر می‌تواند خالی باشد.',
            'city.string' => 'شهر باید یک رشته باشد.',
            'city.max' => 'شهر نباید بیشتر از ۲۵۵ کاراکتر باشد.',
            'phone.nullable' => 'تلفن ثابت می‌تواند خالی باشد.',
            'phone.string' => 'تلفن ثابت باید یک رشته باشد.',
            'phone.max' => 'تلفن ثابت نباید بیشتر از ۲۰ کاراکتر باشد.',
            'profile_picture.nullable' => 'عکس پروفایل می‌تواند خالی باشد.',
            'profile_picture.image' => 'عکس پروفایل باید یک تصویر باشد.',
            'profile_picture.mimes' => 'عکس پروفایل باید از نوع jpeg، png، jpg، gif یا svg باشد.',
            'profile_picture.max' => 'عکس پروفایل نباید بیشتر از ۲ مگابایت باشد.',
            'biography.nullable' => 'بیوگرافی می‌تواند خالی باشد.',
            'biography.string' => 'بیوگرافی باید یک رشته باشد.',
            'biography.max' => 'بیوگرافی نباید بیشتر از ۵۰۰ کاراکتر باشد.',
        ];

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'mobile' => 'required|string|max:15|unique:users,mobile,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'address' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'biography' => 'nullable|string|max:1000',
        ], $messages);

        // Update user information
        $userData = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
        ];
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }
        $user->update($userData);

        // Update or create user profile
        $profileData = $request->only(['address', 'state', 'city', 'phone', 'biography']);

        if ($request->hasFile('profile_picture')) {
            $profileData['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        if ($user->profile) {
            $user->profile->update($profileData);
        } else {
            $user->profile()->create($profileData);
        }

        return redirect()->back()->with('success', 'پروفایل با موفقیت به روز شد');
    }
}
