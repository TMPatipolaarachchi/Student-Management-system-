@extends('layouts.teacher')

@section('title', 'Student Details')
@section('page-title', 'Student Details')

@section('content')
<div class="space-y-6">
    <!-- Back Button -->
    <div>
        <a href="{{ route('teacher.students.index') }}" class="inline-flex items-center text-sm text-gray-600 hover:text-primary-600">
            <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Students
        </a>
    </div>

    <!-- Student Header -->
    <div class="card">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="w-20 h-20 rounded-full bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center text-white font-bold text-2xl">
                    {{ substr($student->user->name, 0, 1) }}
                </div>
                <div class="ml-6">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $student->user->name }}</h1>
                    <p class="text-gray-600 mt-1">Student ID: <span class="font-mono font-semibold">{{ $student->student_id }}</span></p>
                    <div class="mt-2">
                        @if($student->status === 'active')
                            <span class="badge badge-success">Active</span>
                        @elseif($student->status === 'inactive')
                            <span class="badge badge-warning">Inactive</span>
                        @else
                            <span class="badge badge-danger">Suspended</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('teacher.students.edit', $student) }}" class="btn btn-primary">
                    <svg class="w-5 h-5 mr-2 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit
                </a>
                <form method="POST" action="{{ route('teacher.students.destroy', $student) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this student?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <svg class="w-5 h-5 mr-2 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Personal Information -->
        <div class="card">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Personal Information</h2>
            <div class="space-y-4">
                <div class="flex justify-between py-3 border-b border-gray-100">
                    <span class="text-gray-600 font-medium">Full Name</span>
                    <span class="text-gray-900">{{ $student->user->name }}</span>
                </div>
                <div class="flex justify-between py-3 border-b border-gray-100">
                    <span class="text-gray-600 font-medium">Email</span>
                    <span class="text-gray-900">{{ $student->user->email }}</span>
                </div>
                @if($student->user->phone)
                <div class="flex justify-between py-3 border-b border-gray-100">
                    <span class="text-gray-600 font-medium">Phone</span>
                    <span class="text-gray-900">{{ $student->user->phone }}</span>
                </div>
                @endif
                @if($student->user->date_of_birth)
                <div class="flex justify-between py-3 border-b border-gray-100">
                    <span class="text-gray-600 font-medium">Date of Birth</span>
                    <span class="text-gray-900">{{ $student->user->date_of_birth->format('F j, Y') }}</span>
                </div>
                <div class="flex justify-between py-3 border-b border-gray-100">
                    <span class="text-gray-600 font-medium">Age</span>
                    <span class="text-gray-900">{{ $student->user->date_of_birth->age }} years</span>
                </div>
                @endif
                @if($student->user->address)
                <div class="py-3">
                    <span class="text-gray-600 font-medium block mb-2">Address</span>
                    <span class="text-gray-900">{{ $student->user->address }}</span>
                </div>
                @endif
            </div>
        </div>

        <!-- Academic Information -->
        <div class="card">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Academic Information</h2>
            <div class="space-y-4">
                <div class="flex justify-between py-3 border-b border-gray-100">
                    <span class="text-gray-600 font-medium">Student ID</span>
                    <span class="text-gray-900 font-mono font-semibold">{{ $student->student_id }}</span>
                </div>
                @if($student->grade)
                <div class="flex justify-between py-3 border-b border-gray-100">
                    <span class="text-gray-600 font-medium">Grade</span>
                    <span class="text-gray-900">{{ $student->grade }}</span>
                </div>
                @endif
                @if($student->class)
                <div class="flex justify-between py-3 border-b border-gray-100">
                    <span class="text-gray-600 font-medium">Class/Section</span>
                    <span class="text-gray-900">{{ $student->class }}</span>
                </div>
                @endif
                <div class="flex justify-between py-3 border-b border-gray-100">
                    <span class="text-gray-600 font-medium">Status</span>
                    <span>
                        @if($student->status === 'active')
                            <span class="badge badge-success">Active</span>
                        @elseif($student->status === 'inactive')
                            <span class="badge badge-warning">Inactive</span>
                        @else
                            <span class="badge badge-danger">Suspended</span>
                        @endif
                    </span>
                </div>
                @if($student->enrollment_date)
                <div class="flex justify-between py-3 border-b border-gray-100">
                    <span class="text-gray-600 font-medium">Enrollment Date</span>
                    <span class="text-gray-900">{{ $student->enrollment_date->format('F j, Y') }}</span>
                </div>
                @endif
                <div class="flex justify-between py-3 border-b border-gray-100">
                    <span class="text-gray-600 font-medium">Registered</span>
                    <span class="text-gray-900">{{ $student->created_at->format('F j, Y') }}</span>
                </div>
            </div>
        </div>

        <!-- Parent/Guardian Information -->
        @if($student->parent_name || $student->parent_phone || $student->parent_email)
        <div class="card lg:col-span-2">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Parent/Guardian Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @if($student->parent_name)
                <div>
                    <p class="text-sm text-gray-600 mb-2">Name</p>
                    <p class="text-base font-medium text-gray-900">{{ $student->parent_name }}</p>
                </div>
                @endif
                @if($student->parent_phone)
                <div>
                    <p class="text-sm text-gray-600 mb-2">Phone</p>
                    <p class="text-base font-medium text-gray-900">{{ $student->parent_phone }}</p>
                </div>
                @endif
                @if($student->parent_email)
                <div>
                    <p class="text-sm text-gray-600 mb-2">Email</p>
                    <p class="text-base font-medium text-gray-900">{{ $student->parent_email }}</p>
                </div>
                @endif
            </div>
        </div>
        @endif

        <!-- Notes -->
        @if($student->notes)
        <div class="card lg:col-span-2">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Notes</h2>
            <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-gray-700">{{ $student->notes }}</p>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
