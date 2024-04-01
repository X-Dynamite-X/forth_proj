<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        return view("admin.permission.index", ["permissions" => $permissions]);
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
        return response()->json(["data" => $permission ,"message" => "Create permission is Successfully"]);
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
}
