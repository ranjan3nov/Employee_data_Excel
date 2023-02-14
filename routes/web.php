<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    // Route::get('/', function () {
    //     // phpinfo();
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    Route::get('/addEmployee', [HomeController::class, 'addEmployee']);
    Route::post('import', [HomeController::class, 'import']);
    Route::post('store', [HomeController::class, 'store']);
    Route::get('editEmployee/{id}', [HomeController::class, 'editEmployee']);
    Route::put('updateEmployee/{id}', [HomeController::class, 'updateEmployee']);
    Route::delete('deleteEmployee/{id}', [HomeController::class, 'deleteEmployee']);
});
