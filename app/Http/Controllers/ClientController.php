<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $conferences = $this->getUpcomingConferences();
        return view('client.index', compact('conferences'));
    }

    public function show($id)
    {
        $conference = Conference::findOrFail($id);
        return view('client.show', compact('conference'));
    }

    public function register(Request $request)
    {
        $conferenceId = $request->input('conference_id');
        $conference = Conference::findOrFail($conferenceId);
        $conference->increment('registered_users_count');

        return redirect()->back()->with('success', 'You have successfully registered for the conference.');
    }

    public function unregister(Request $request)
    {
        $conferenceId = $request->input('conference_id');
        $conference = Conference::findOrFail($conferenceId);
        if ($conference->registered_users_count > 0) {
            $conference->decrement('registered_users_count');
        }

        return redirect()->back()->with('success', 'You have successfully unregistered from the conference.');
    }

    public function getUpcomingConferences()
    {
        return Conference::where('date', '>=', now()->toDateString())->get();
    }
}
