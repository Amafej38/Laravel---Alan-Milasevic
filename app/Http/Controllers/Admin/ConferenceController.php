<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    public function index()
    {
        // Пример данных: список всех конференций
        $conferences = [
            ['id' => 1, 'name' => 'Tech Conference', 'date' => '2024-10-10'],
            ['id' => 2, 'name' => 'Business Summit', 'date' => '2024-11-15']
        ];

        return view('admin.conferences.index', compact('conferences'));
    }

    public function create()
    {
        return view('admin.conferences.form');
    }

    public function store(Request $request)
    {
        // Логика для сохранения конференции
        return redirect()->route('admin.conferences.index')->with('success', 'Conference created successfully.');
    }

    public function edit($id)
    {
        // Пример данных: конкретная конференция для редактирования
        $conference = ['id' => $id, 'name' => 'Tech Conference', 'description' => 'Details about the conference...'];

        return view('admin.conferences.form', compact('conference'));
    }

    public function update(Request $request, $id)
    {
        // Логика для обновления конференции
        return redirect()->route('admin.conferences.index')->with('success', 'Conference updated successfully.');
    }

    public function destroy($id)
    {
        // Логика для удаления конференции
        return redirect()->route('admin.conferences.index')->with('success', 'Conference deleted successfully.');
    }
}
