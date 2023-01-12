<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::group(['middleware' => 'admin','prefix'=> 'admin'],function(){

    Route::get('/dashboard', [DashboardController::class,'index'])->name('admin.dashboard');
    Route::resource('roles', RolesController::class);
    Route::resource('users', UserController::class);
    Route::get('/admin-logout',[AdminController::class,'logoutAdmin'])->name('admin.logout');
});

Route::prefix('admin-login')->group(function(){
    Route::get('/login',[AdminController::class,'index'])->name('login.page');
    Route::post('/login/owner',[AdminController::class,'login'])->name('admin.login');
    // Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
});
// Route::prefix('admin')->group(function () {


// });

require __DIR__.'/auth.php';
