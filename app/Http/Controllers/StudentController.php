<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('user')->latest()->paginate(10);
        return view('teacher.students.index', compact('students'));
    }

    public function create()
    {
        return view('teacher.students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'student_id' => 'required|unique:students',
            'grade' => 'nullable|string',
            'class' => 'nullable|string',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'parent_name' => 'nullable|string',
            'parent_phone' => 'nullable|string',
            'parent_email' => 'nullable|email',
            'enrollment_date' => 'nullable|date',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'student',
            'phone' => $request->phone,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
        ]);

        Student::create([
            'user_id' => $user->id,
            'student_id' => $request->student_id,
            'grade' => $request->grade,
            'class' => $request->class,
            'parent_name' => $request->parent_name,
            'parent_phone' => $request->parent_phone,
            'parent_email' => $request->parent_email,
            'enrollment_date' => $request->enrollment_date ?? now(),
            'status' => 'active',
        ]);

        return redirect()->route('teacher.students.index')
            ->with('success', 'Student added successfully!');
    }

    public function show(Student $student)
    {
        return view('teacher.students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('teacher.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $student->user_id,
            'student_id' => 'required|unique:students,student_id,' . $student->id,
            'grade' => 'nullable|string',
            'class' => 'nullable|string',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'parent_name' => 'nullable|string',
            'parent_phone' => 'nullable|string',
            'parent_email' => 'nullable|email',
            'status' => 'required|in:active,inactive,suspended',
            'notes' => 'nullable|string',
        ]);

        $student->user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
        ]);

        $student->update([
            'student_id' => $request->student_id,
            'grade' => $request->grade,
            'class' => $request->class,
            'parent_name' => $request->parent_name,
            'parent_phone' => $request->parent_phone,
            'parent_email' => $request->parent_email,
            'status' => $request->status,
            'notes' => $request->notes,
        ]);

        return redirect()->route('teacher.students.index')
            ->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->user->delete();
        return redirect()->route('teacher.students.index')
            ->with('success', 'Student deleted successfully!');
    }
}
