@extends('layouts.student')

@section('title', 'My Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Welcome Banner -->
    <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-xl shadow-lg p-8 text-white">
        <h1 class="text-3xl font-bold mb-2">Welcome back, {{ $user->name }}! 👋</h1>
        <p class="text-primary-100">Here's your student profile information</p>
    </div>

    <!-- Profile Cards -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Personal Information -->
        <div class="card">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Personal Information</h2>
            <div class="space-y-4">
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-primary-100 flex items-center justify-center">
                        <svg class="w-6 h-6 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Full Name</p>
                        <p class="text-base font-medium text-gray-900">{{ $user->name }}</p>
                    </div>
                </div>

                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Email</p>
                        <p class="text-base font-medium text-gray-900">{{ $user->email }}</p>
                    </div>
                </div>

                @if($user->phone)
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Phone</p>
                        <p class="text-base font-medium text-gray-900">{{ $user->phone }}</p>
                    </div>
                </div>
                @endif

                @if($user->address)
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Address</p>
                        <p class="text-base font-medium text-gray-900">{{ $user->address }}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Academic Information -->
        @if($student)
        <div class="card">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Academic Information</h2>
            <div class="space-y-4">
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 14l9-5-9-5-9 5 9 5z"/>
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Student ID</p>
                        <p class="text-base font-mono font-bold text-gray-900">{{ $student->student_id }}</p>
                    </div>
                </div>

                @if($student->grade)
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Grade</p>
                        <p class="text-base font-medium text-gray-900">{{ $student->grade }}</p>
                    </div>
                </div>
                @endif

                @if($student->class)
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-pink-100 flex items-center justify-center">
                        <svg class="w-6 h-6 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Class/Section</p>
                        <p class="text-base font-medium text-gray-900">{{ $student->class }}</p>
                    </div>
                </div>
                @endif

                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full {{ $student->status === 'active' ? 'bg-green-100' : 'bg-red-100' }} flex items-center justify-center">
                        <svg class="w-6 h-6 {{ $student->status === 'active' ? 'text-green-600' : 'text-red-600' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Status</p>
                        <span class="badge {{ $student->status === 'active' ? 'badge-success' : 'badge-danger' }}">
                            {{ ucfirst($student->status) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- Additional Info -->
    @if($student && ($student->parent_name || $student->parent_phone || $student->parent_email))
    <div class="card">
        <h2 class="text-xl font-bold text-gray-900 mb-6">Parent/Guardian Information</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @if($student->parent_name)
            <div>
                <p class="text-sm text-gray-600 mb-1">Name</p>
                <p class="text-base font-medium text-gray-900">{{ $student->parent_name }}</p>
            </div>
            @endif
            @if($student->parent_phone)
            <div>
                <p class="text-sm text-gray-600 mb-1">Phone</p>
                <p class="text-base font-medium text-gray-900">{{ $student->parent_phone }}</p>
            </div>
            @endif
            @if($student->parent_email)
            <div>
                <p class="text-sm text-gray-600 mb-1">Email</p>
                <p class="text-base font-medium text-gray-900">{{ $student->parent_email }}</p>
            </div>
            @endif
        </div>
    </div>
    @endif
</div>
@endsection
