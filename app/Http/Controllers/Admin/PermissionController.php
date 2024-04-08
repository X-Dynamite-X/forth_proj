<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        $roles = Role::all();

        return view("admin.permission.index", ["permissions" => $permissions,"roles"=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            "name" => ["required", "min:3"],
        ]);
        $permission = Permission::create($validate);
        $roles = Role::all();

        return response()->json(["data" => $permission,'roles'=> $roles ,"message" => "Create permission is Successfully"]);
    }

    public function update(Request $request, Permission $permission)
    {
        //
        $validate = $request->validate([
            "name" => ["required", "min:3"],
        ]);
        $permission->update($validate);

        return response()->json(["data" => $permission,"message" => "Update permission is Successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return response()->json(["messages"=> "success"  ,"message" => "Delete permission is Successfully"]);

    }


    public function giveRole(Request $request, Permission  $permission)
    {
        if ($permission->hasRole($request->role)) {
            return  response()->json(['message' => 'this Role  already exist'], 404);
        }
        $permission->assignRole($request->role);
        $data = Role::where('name',  $request->role)->get();

        return response()->json(['data' => $data, 'message' => 'the Role has been assigend'], 201);
    }
    public function removeRole(Permission  $permission , Role $role)
    {
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);
            return  response()->json(['message' => 'Role remove  '], 201);
        }

        return response()->json(['message' => 'this Role is Note exist '], 404);
    }
}









