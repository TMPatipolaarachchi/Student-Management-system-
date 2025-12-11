@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-primary-600 via-primary-700 to-primary-900 flex items-center justify-center p-4">
    <div class="max-w-md w-full">
        <!-- Logo -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-white mb-2">Student Management</h1>
            <p class="text-primary-100">Sign in to your account</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                @if ($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-red-700">{{ $errors->first('email') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Email -->
                <div>
                    <label for="email" class="label">Email Address</label>
                    <input id="email" 
                           type="email" 
                           name="email" 
                           value="{{ old('email') }}"
                           required 
                           autofocus
                           autocomplete="username"
                           class="input-field"
                           placeholder="you@example.com">
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="label">Password</label>
                    <input id="password" 
                           type="password" 
                           name="password"
                           required
                           autocomplete="current-password"
                           class="input-field"
                           placeholder="••••••••">
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50">
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full btn btn-primary py-3 text-lg">
                    Sign In
                </button>

                <!-- Register Link -->
                <p class="text-center text-sm text-gray-600">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="font-semibold text-primary-600 hover:text-primary-500 transition-colors">
                        Register here
                    </a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
