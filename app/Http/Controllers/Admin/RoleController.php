<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();

        return view("admin.role.index", ["roles" => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view("admin.role.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            "name" => ["required", "min:3"],
        ]);
        $role =  Role::create($validate);
        return response()->json(["data"=> $role  ,"message" => "Create Role is Successfully" ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role  $role)
    {
        $validate = $request->validate([
            "name" => ["required", "min:3"],
        ]);
        $role->update($validate);
        return response()->json(["data"=> $role  ,"message" => "Update Role is Successfully"]);
        }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role  $role)
    {
        $role->delete();
        return response()->json(["message" => "Delete Role is Successfully"]);
        }
}
