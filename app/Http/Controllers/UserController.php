<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $messages = [
            'first_name.required' => 'نام الزامی است.',
            'last_name.required' => 'نام خانوادگی الزامی است.',
            'email.required' => 'ایمیل الزامی است.',
            'email.email' => 'ایمیل باید معتبر باشد.',
            'email.unique' => 'این ایمیل قبلاً ثبت شده است.',
            'password.required' => 'رمز عبور الزامی است.',
            'password.min' => 'رمز عبور باید حداقل ۸ کاراکتر باشد.',
            'password.confirmed' => 'تأیید رمز عبور مطابقت ندارد.',
            'mobile.required' => 'موبایل الزامی است.',
            'mobile.unique' => 'این شماره موبایل قبلاً ثبت شده است.',
            'role.required' => 'نقش الزامی است.',
        ];

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'mobile' => 'required|string|max:15|unique:users',
            'role' => 'required|string|exists:roles,name',
            // Additional validation rules for user profile
            'address' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'biography' => 'nullable|string|max:1000',
        ], $messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'mobile' => $request->mobile,
        ]);

        // اضافه کردن نقش به کاربر
        $user->assignRole($request->role);

        // ذخیره اطلاعات پروفایل کاربر
        $profileData = $request->only(['address', 'state', 'city', 'phone', 'biography']);

        if ($request->hasFile('profile_picture')) {
            $profileData['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $user->profile()->create($profileData);

        return response()->json(['success' => 'کاربر با موفقیت ایجاد شد.']);
    }



    public function edit(User $user)
    {
        $roles = Role::all(); // دریافت لیست نقش‌ها
        return view('admin.user.edit', compact('user', 'roles'));
    }
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'mobile' => 'required|string|max:15|unique:users,mobile,' . $user->id,
            'roles' => 'required|array',
            // Additional validation rules for user profile
            'address' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'biography' => 'nullable|string|max:1000',
        ], [
            'first_name.required' => 'لطفاً نام را وارد کنید.',
            'last_name.required' => 'لطفاً نام خانوادگی را وارد کنید.',
            'email.required' => 'لطفاً ایمیل را وارد کنید.',
            'email.unique' => 'ایمیل وارد شده قبلاً ثبت شده است.',
            'password.min' => 'رمز عبور باید حداقل ۸ کاراکتر باشد.',
            'password.confirmed' => 'تکرار رمز عبور با رمز عبور همخوانی ندارد.',
            'mobile.required' => 'لطفاً شماره موبایل را وارد کنید.',
            'mobile.unique' => 'شماره موبایل وارد شده قبلاً ثبت شده است.',
            'roles.required' => 'لطفاً حداقل یک نقش انتخاب کنید.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'mobile' => $request->mobile,
        ]);

        $user->syncRoles($request->roles);

        // ذخیره اطلاعات پروفایل کاربر
        $profileData = $request->only(['address', 'state', 'city', 'phone', 'biography']);

        if ($request->hasFile('profile_picture')) {
            $profileData['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $user->profile()->updateOrCreate(['user_id' => $user->id], $profileData);

        return response()->json(['success' => 'کاربر با موفقیت به روز شد.']);
    }




    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response()->json(['success' => true, 'message' => 'کاربر با موفقیت حذف شد.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'خطایی رخ داده است. لطفا دوباره تلاش کنید.']);
        }
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
