<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Admin\ConferenceController;
use App\Http\Controllers\Admin\UserController;

// Главная страница
Route::get('/', function () {
    return view('index');
})->name('home');

// Маршруты для клиента
Route::prefix('client')->name('client.')->group(function () {
    Route::get('/conferences', [ClientController::class, 'index'])->name('conferences.index');
    Route::get('/conference/{id}', [ClientController::class, 'show'])->name('conference.show');
    Route::post('/conference/register', [ClientController::class, 'register'])->name('conference.register');
});

// Маршруты для сотрудника
Route::prefix('employee')->name('employee.')->group(function () {
    Route::get('/conferences', [EmployeeController::class, 'index'])->name('conferences.index');
    Route::get('/conference/{id}', [EmployeeController::class, 'show'])->name('conference.show');
});

// Маршруты для администратора
Route::prefix('admin')->name('admin.')->group(function () {
    // Страница выбора администратора (пользователи или конференции)
    Route::get('/', function () {
        return view('admin.index');  // Страница выбора
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
    Route::post('/user/{id}/delete', [UserController::class, 'destroy'])->name('user.destroy');
});
