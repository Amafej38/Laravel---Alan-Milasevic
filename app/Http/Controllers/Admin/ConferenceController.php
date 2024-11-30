<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conference;

class ConferenceController extends Controller
{
    public function index()
    {
        $conferences = Conference::all();

        return view('admin.conferences.index', ['conferences' => $conferences]);
    }

    public function create()
    {
        return view('admin.conferences.form');
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'date' => [
            'required',
            'date',
            'after_or_equal:today', // Дата должна быть сегодняшней или будущей
            function ($attribute, $value, $fail) {
                $oneYearFromNow = now()->addYear(); // Максимум год вперед
                if (\Carbon\Carbon::parse($value)->greaterThan($oneYearFromNow)) {
                    $fail('The conference date cannot be more than one year in the future.');
                }
            },
        ],
    ]);

    // Создание конференции
    Conference::create($request->all());

    return redirect()->route('admin.conferences.index')->with('success', 'Conference created successfully!');
    }

    public function destroy($id)
    {
    $conference = Conference::findOrFail($id);

    // Проверка: конференции с прошедшей датой нельзя удалить
    if (\Carbon\Carbon::parse($conference->date)->isPast()) {
        return redirect()->route('admin.conferences.index')
            ->with('error', 'You cannot delete a conference that has already passed.');
    }

    $conference->delete();

    return redirect()->route('admin.conferences.index')
        ->with('success', 'Conference deleted successfully!');
    }

    public function edit($id)
    {
        $conference = Conference::findOrFail($id);
        return view('admin.conferences.form', ['conference' => $conference]);
    }

    public function update(Request $request, $id)
    {
        $conference = Conference::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => [
                'required',
                'date',
                'after_or_equal:today',
                function ($attribute, $value, $fail) {
                    $oneYearFromNow = now()->addYear();
                    if (\Carbon\Carbon::parse($value)->greaterThan($oneYearFromNow)) {
                        $fail('The conference date cannot be more than one year in the future.');
                    }
                },
            ],
        ]);

        $conference->update($request->all());

        return redirect()->route('admin.conferences.index')
            ->with('success', 'Conference updated successfully!');
    }
}

