@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-primary-600 via-primary-700 to-primary-900 flex items-center justify-center p-4 py-12">
    <div class="max-w-2xl w-full">
        <!-- Logo -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-white mb-2">Create Account</h1>
            <p class="text-primary-100">Join our student management system</p>
        </div>

        <!-- Register Card -->
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Role Selection -->
                <div>
                    <label class="label">I am a</label>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <input type="radio" name="role" value="student" id="role_student" class="peer sr-only" checked>
                            <label for="role_student" class="block p-4 text-center border-2 border-gray-300 rounded-lg cursor-pointer peer-checked:border-primary-600 peer-checked:bg-primary-50 peer-checked:text-primary-700 transition-all">
                                <svg class="mx-auto h-8 w-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                <span class="font-semibold">Student</span>
                            </label>
                        </div>
                        <div>
                            <input type="radio" name="role" value="teacher" id="role_teacher" class="peer sr-only">
                            <label for="role_teacher" class="block p-4 text-center border-2 border-gray-300 rounded-lg cursor-pointer peer-checked:border-primary-600 peer-checked:bg-primary-50 peer-checked:text-primary-700 transition-all">
                                <svg class="mx-auto h-8 w-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span class="font-semibold">Teacher</span>
                            </label>
                        </div>
                    </div>
                    @error('role')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="label">Full Name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required class="input-field" placeholder="John Doe">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="label">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required class="input-field" placeholder="john@example.com">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="label">Phone Number</label>
                        <input id="phone" type="text" name="phone" value="{{ old('phone') }}" class="input-field" placeholder="+1 234 567 8900">
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Date of Birth -->
                    <div>
                        <label for="date_of_birth" class="label">Date of Birth</label>
                        <input id="date_of_birth" type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="input-field">
                        @error('date_of_birth')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Address -->
                <div>
                    <label for="address" class="label">Address</label>
                    <textarea id="address" name="address" rows="2" class="input-field" placeholder="123 Main St, City, State, ZIP">{{ old('address') }}</textarea>
                    @error('address')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Password -->
                    <div>
                        <label for="password" class="label">Password</label>
                        <input id="password" type="password" name="password" required class="input-field" placeholder="••••••••">
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="label">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required class="input-field" placeholder="••••••••">
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full btn btn-primary py-3 text-lg">
                    Create Account
                </button>

                <!-- Login Link -->
                <p class="text-center text-sm text-gray-600">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="font-semibold text-primary-600 hover:text-primary-500 transition-colors">
                        Sign in here
                    </a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
