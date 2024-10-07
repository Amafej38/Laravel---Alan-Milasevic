<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Пример статических данных пользователей
        $users = [
            ['id' => 1, 'first_name' => 'John', 'last_name' => 'Doe'],
            ['id' => 2, 'first_name' => 'Jane', 'last_name' => 'Smith']
        ];

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.form');
    }

    public function store(Request $request)
    {
        // Логика сохранения нового пользователя
        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        // Пример статического пользователя для редактирования
        $user = ['id' => $id, 'first_name' => 'John', 'last_name' => 'Doe'];

        return view('admin.users.form', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Логика обновления пользователя
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        // Логика удаления пользователя
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
