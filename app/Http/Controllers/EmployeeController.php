<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        // Пример данных: все конференции (прошедшие и планируемые)
        $conferences = [
            ['id' => 1, 'name' => 'Tech Conference', 'date' => '2024-10-10', 'status' => 'upcoming'],
            ['id' => 2, 'name' => 'Business Summit', 'date' => '2024-11-15', 'status' => 'upcoming'],
            ['id' => 3, 'name' => 'Past Conference', 'date' => '2024-09-01', 'status' => 'past']
        ];

        return view('employee.index', compact('conferences'));
    }

    public function show($id)
    {
        // Пример данных: информация о конференции и зарегистрированных клиентах
        $conference = ['id' => $id, 'name' => 'Tech Conference', 'description' => 'Details about the conference...'];
        $registeredClients = [
            ['name' => 'John Doe', 'email' => 'john@example.com'],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com']
        ];

        return view('employee.show', compact('conference', 'registeredClients'));
    }
}