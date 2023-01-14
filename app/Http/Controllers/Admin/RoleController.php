<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $permission = Permission::all();
        $roles = Role::all();
        return view('Admin.role.index', [
            'permissions' => $permission,
            'roles' => $roles,
        ]);
    }

    public function store(Request $request)
    {
        $role = Role::query()->create([
            'title' => $request->get('title'),
        ]);

        $role->permissions()->attach($request->get('permissions'));

        return redirect(route('admin.role.index'));
    }

    public function permissions(Request $request)
    {
        $role = Role::find($request->get('role_id'));
        $permissions = $role->permissions()->pluck('id');

        return response()->json([
            'data' => [
                'permissions' => $permissions,
                'role_title' => $role->title
            ]
        ])->setStatusCode(200);
    }

    public function update(Request $request, Role $role)
    {
        $role->update([
            'title' => $request->get('title')
        ]);
        $role->permissions()->sync($request->get('permissionsEdit'));

        return redirect(route('admin.role.index'));
    }

    public function destroy(Role $role)
    {
        $role->permissions()->detach();
        $role->delete();

        return redirect(route('admin.role.index'));
    }
}
