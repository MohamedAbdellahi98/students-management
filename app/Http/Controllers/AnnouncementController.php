<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role !== 'admin' && $user->role !== 'standard') {
            return abort(403, 'Unauthorized action.');
        }

        $announcements = Announcement::all();

        if ($user->role === 'admin') {
            return view('announcements.index', compact('announcements'));
        } else {
            return view('standard_users.announcements.index', compact('announcements'));
        }
    }


    public function create()
    {
        // Only an admin can create an announcement
        if (Auth::user()->role !== 'admin') {
            return abort(403, 'Unauthorized action.');
        }

        return view('announcements.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            return abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Announcement::create($request->all());
        return redirect()->route('announcements.index')->with('success', 'Announcement created successfully.');
    }

    public function edit(Announcement $announcement)
    {
        if (Auth::user()->role !== 'admin') {
            return abort(403, 'Unauthorized action.');
        }

        return view('announcements.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        if (Auth::user()->role !== 'admin') {
            return abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $announcement->update($request->all());
        return redirect()->route('announcements.index')->with('success', 'Announcement updated successfully.');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return redirect()->route('announcements.index')->with('success', 'Announcement deleted successfully.');
    }

}
