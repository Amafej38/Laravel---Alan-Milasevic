<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Admin\ConferenceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;

// Главная страница
Route::get('/', function () {
    return view('index');
})->name('home');

// Маршруты для клиента
Route::prefix('client')->name('client.')->middleware(['auth', 'role:Client'])->group(function () {
    Route::get('/', function () {
        return view('client.index');
    })->name('dashboard');
    
    Route::get('/conferences', [ClientController::class, 'index'])->name('conferences.index');
    Route::get('/conference/{id}', [ClientController::class, 'show'])->name('conference.show');
    Route::post('/client/conference/register', [ClientController::class, 'register'])->name('conference.register');
    Route::post('/client/conference/unregister', [ClientController::class, 'unregister'])->name('conference.unregister');
});


// Маршруты для сотрудника
Route::prefix('employee')->name('employee.')->middleware(['auth', 'role:Employee'])->group(function () {
    Route::get('/', function () {
        return view('employee.index');
    })->name('dashboard');

    Route::get('/', [EmployeeController::class, 'index'])->name('index');
    Route::get('/conferences', [EmployeeController::class, 'index'])->name('conferences.index');
    Route::get('/conference/{id}', [EmployeeController::class, 'show'])->name('conference.show');
});



// Маршруты для администратора
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:Admin'])->group(function () {
    // Главная страница администратора
    Route::get('/', function () {
        return view('admin.index'); // Страница выбора
    })->name('dashboard');

    // Управление конференциями
    Route::get('/conferences', [ConferenceController::class, 'index'])->name('conferences.index');
    Route::get('/conference/create', [ConferenceController::class, 'create'])->name('conference.create');
    Route::post('/conference/store', [ConferenceController::class, 'store'])->name('conference.store');
    Route::get('/conference/{id}/edit', [ConferenceController::class, 'edit'])->name('conference.edit');
    Route::post('/conference/{id}/update', [ConferenceController::class, 'update'])->name('conference.update');
    Route::post('/conference/{id}/delete', [ConferenceController::class, 'destroy'])->name('conference.destroy');

    // Управление пользователями
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/{id}/update', [UserController::class, 'update'])->name('user.update');
});

// Маршруты для аутентификации
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
