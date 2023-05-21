<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Announcement;
use App\Models\Message;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $studentsCount = Student::count();
        $announcementsCount = Announcement::count();
        $messagesCount = Message::count();

        return view('dashboard' , compact('usersCount', 'studentsCount', 'announcementsCount', 'messagesCount'));
    }

}

