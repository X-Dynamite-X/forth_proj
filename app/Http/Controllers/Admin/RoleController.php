<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view("admin.role.index", ["roles" => $roles, 'permissions' => $permissions]);
    }



    public function store(Request $request)
    {
        $validate = $request->validate([
            "name" => ["required", "min:3"],
        ]);
        $role =  Role::create($validate);
        $permissions = Permission::all();

        return response()->json(["data" => $role, 'permissions'=>$permissions,"message" => "Create Role is Successfully"]);
    }
    public function update(Request $request, Role  $role)
    {
        $validate = $request->validate([
            "name" => ["required", "min:3"],
        ]);
        $role->update($validate);
        return response()->json(["data" => $role, "message" => "Update Role is Successfully"]);
    }
    public function destroy(Role  $role)
    {
        $role->delete();
        return response()->json(["message" => "Delete Role is Successfully"]);
    }
    public function givePermission(Request $request, Role  $role)
    {
        if ($role->hasPermissionTo($request->permission)) {
            return  response()->json(['message' => 'this permission already exist'], 404);
        }
        $role->givePermissionTo($request->permission);
        $data = Permission::where('name',  $request->permission)->get();

        return response()->json(['data' => $data, 'message' => 'the permision has been added'], 201);
    }
    public function revokePermissions(Role  $role,Permission $permission)
    {
        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
            return  response()->json(['message' => 'Permission remove  '], 201);
        }

        return response()->json(['message' => 'this permision is Note exist '], 404);
    }
}
