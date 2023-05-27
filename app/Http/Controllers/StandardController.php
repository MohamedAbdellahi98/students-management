<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\DB;

class StandardController extends Controller
{

    public function dashboard()
    {
        $announcements = Announcement::all();
        return view('standard_users.dashboard', compact('announcements'));
    }

    public function searchStudents(Request $request)
    {
        $query = $request->input('query');
        
        // Searches students table in DB for matching 'id' or 'name' with the query
        $students = DB::table('students')
            ->where('id', '=', $query)
            ->orWhere('name', 'LIKE', "%$query%")
            ->get();

            return view('standard_users.students.index', compact('students'));
        }

}
