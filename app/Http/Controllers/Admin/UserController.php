<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $users = User::all();
        $roles = Role::all();
        $permissions = Permission::all();
        return view("admin.user.index", ["users" => $users, 'roles' => $roles, 'permissions' => $permissions]);
    }
    public function store(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $roles = Role::all();
        $permissions = Permission::all();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return response()->json(['message' => 'User created successfully', 'data' => $user,'roles' => $roles, 'permissions' => $permissions], 201);
    }

    public function update(Request $request, $id) {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255',"min:3"],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::findOrFail($id);

        $user->name = $data['name'];
        $user->email = $data['email'];

        $user->save();

        return response()->json(['message' => 'User updated successfully', 'data' => $user], 200);
    }

    public function destroy(string $user)
    {
        $user = User::find($user);
        $user->delete();
        return  response()->json(['message' => 'User remove  '], 201);

        //
    }
    public function giveRoleUser(Request $request, User  $user)
    {
        if ($user->hasRole($request->role)) {
            return  response()->json(['message' => 'this Role  already exist'], 404);
        }
        $user->assignRole($request->role);
        $data = Role::where('name',  $request->role)->get();

        return response()->json(['data' => $data, 'message' => 'the Role has been assigend'], 201);
    }
    public function removeRoleUser(User  $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return  response()->json(['message' => 'Role remove  '], 201);
        }

        return response()->json(['message' => 'this Role is Note exist '], 404);
    }


    public function givePermissionToUser(Request $request, User  $user)
    {
        if ($user->hasPermissionTo($request->permission)) {
            return  response()->json(['message' => 'this permission already exist'], 404);
        }
        $user->givePermissionTo($request->permission);
        $data = Permission::where('name',  $request->permission)->get();

        return response()->json(['data' => $data, 'message' => 'the permision has been added'], 201);
    }
    public function revokePermissionToUser(User  $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return  response()->json(['message' => 'Permission remove  '], 201);
        }

        return response()->json(['message' => 'this permision is Note exist '], 404);
    }
}
