<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function teacherDashboard()
    {
        $totalStudents = Student::count();
        $activeStudents = Student::where('status', 'active')->count();
        $inactiveStudents = Student::where('status', 'inactive')->count();
        $recentStudents = Student::with('user')->latest()->take(5)->get();

        return view('teacher.dashboard', compact(
            'totalStudents',
            'activeStudents',
            'inactiveStudents',
            'recentStudents'
        ));
    }

    public function studentDashboard()
    {
        $user = Auth::user();
        $student = $user->student;

        return view('student.dashboard', compact('user', 'student'));
    }

    public function viewAllStudents()
    {
        $students = Student::with('user')->paginate(10);

        return view('teacher.students.index', compact('students'));
    }
}
