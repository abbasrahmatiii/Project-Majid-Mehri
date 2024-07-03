<?php
// app/Http/Controllers/PermissionController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name',
        ]);

        Permission::create(['name' => $request->name]);

        return redirect()->route('admin.permissions.index')->with('success', 'مجوز با موفقیت ایجاد شد.');
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $permission->id,
        ]);

        $permission->update(['name' => $request->name]);

        return redirect()->route('admin.permissions.index')->with('success', 'مجوز با موفقیت ویرایش شد.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('admin.permissions.index')->with('success', 'مجوز با موفقیت حذف شد.');
    }

    public function showAssignPermissionsForm(Role $role)
    {
        $permissions = Permission::all();
        $rolePermissions = $role->permissions()->pluck('name')->toArray();
        return view('admin.roles.assign_permissions', compact('role', 'permissions', 'rolePermissions'));
    }

    public function assignPermissionsToRole(Request $request, Role $role)
    {
        $role->syncPermissions($request->permissions);

        return redirect()->route('admin.roles.index')->with('success', 'مجوزها با موفقیت به نقش اختصاص یافتند.');
    }
}
