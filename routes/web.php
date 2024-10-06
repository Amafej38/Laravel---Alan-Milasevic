<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ConferenceController;

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

// Маршруты для клиента
Route::get('/conferences', [ClientController::class, 'index']);
Route::get('/conference/{id}', [ClientController::class, 'show']);
Route::post('/conference/register/{id}', [ClientController::class, 'register']);

// Маршруты для сотрудника
Route::get('/employee/conferences', [EmployeeController::class, 'index']);

// Маршруты для администратора
Route::prefix('admin')->group(function () {
    Route::resource('users', UserController::class); // CRUD маршруты для пользователей
    Route::resource('conferences', ConferenceController::class); // CRUD маршруты для конференций
});