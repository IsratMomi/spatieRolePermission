<?php

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
Route::group(['middleware' => 'auth','prefix'=> 'admin'],function(){
    Route::get('/dashboard', [DashboardController::class,'index'])->name('admin.dashboard');
    Route::resource('roles', RolesController::class);
    Route::resource('users', UserController::class);
});
// Route::prefix('admin')->group(function () {


// });

require __DIR__.'/auth.php';
