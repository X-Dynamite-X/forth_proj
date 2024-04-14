<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// });

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix("admin")->group(function(){
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post("/roles/permission/{role}",[RoleController::class,"givePermission"])->name("givePermission");
    Route::delete("/roles/permission/{role}/{permission}",[RoleController::class,"revokePermissions"])->name("revokePermission");

    Route::resource('/permissions', PermissionController::class);
    Route::post("/permissions/role/{permission}",[PermissionController::class,"giveRole"])->name("giveRole");
    Route::delete("/permissions/role/{permission}/{role}",[PermissionController::class,"removeRole"])->name("removeRole");

    Route::get("/users",[UserController::class,"index"])->name("usersPage");
    Route::post("/users/permissions/{user}",[UserController::class,"givePermissionToUser"])->name('givePermissionToUser');
    Route::delete("/users/permissions/delete/{user}/{permission}",[UserController::class,"revokePermissionToUser"])->name("revokePermissionToUser");
    Route::post("/users/role/{user}",[UserController::class,"giveRoleUser"])->name("giveRoleUser");
    Route::delete("/users/role/delete/{user}/{role}",[UserController::class,"removeRoleUser"])->name("removeRoleUser");

    Route::post("/users/create",[UserController::class,"store"])->name("createUser");
    Route::put("/users/edit/{id}",[UserController::class,"update"])->name("editUser");

    Route::delete("/users/delete/{user}",[UserController::class,"destroy"])->name("removeUser");



});



Route::get('/admin', function () {
    return view('admin.index');

})->name('admin.index')->middleware(['auth', 'role:admin']);
