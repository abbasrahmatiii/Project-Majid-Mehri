<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    // سایر متدها

    public function index()
    {
        $users = User::paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all(); // دریافت نقش‌ها
        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'mobile' => 'required|string|max:15|unique:users',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'mobile' => $request->mobile,
        ]);

        return redirect()->route('admin.user.index')->with('success', 'کاربر با موفقیت ایجاد شد.');
    }

    public function edit(User $user)
    {
        $roles = Role::all(); // دریافت لیست نقش‌ها
        return view('admin.user.edit', compact('user', 'roles'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'mobile' => 'required|string|max:15|unique:users,mobile,' . $user->id,
            'roles' => 'required|array', // اضافه کردن اعتبارسنجی برای نقش‌ها
        ], [
            'email.unique' => 'ایمیل وارد شده قبلاً ثبت شده است.',
            'mobile.unique' => 'شماره موبایل وارد شده قبلاً ثبت شده است.',
            'roles.required' => 'لطفاً حداقل یک نقش انتخاب کنید.',

        ]);
    
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'mobile' => $request->mobile,
        ]);
    
        // به‌روزرسانی نقش‌های کاربر
        $user->syncRoles($request->roles);
    
        return redirect()->route('admin.user.index')->with('success', 'کاربر با موفقیت به روز شد.');
    }
    

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'کاربر با موفقیت حذف شد.');
    }

    public function showAssignRolesForm(User $user)
    {
        $roles = Role::all();
        return view('admin.user.assign_roles', compact('user', 'roles'));
    }

    public function assignRoles(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'array|exists:roles,name',
        ]);

        $user->syncRoles($request->roles);

        return redirect()->route('admin.user.index')->with('success', 'نقش‌ها با موفقیت به کاربر اختصاص یافت.');
    }
}
