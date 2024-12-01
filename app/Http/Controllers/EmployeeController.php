<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conference;
use App\Models\User;

class EmployeeController extends Controller
{
    public function index()
    {
        $conferences = Conference::all();
        return view('employee.index', ['conferences' => $conferences]);
    }

    public function show($id)
    {
        $conference = Conference::findOrFail($id);
        return view('employee.show', compact('conference'));
    }
}