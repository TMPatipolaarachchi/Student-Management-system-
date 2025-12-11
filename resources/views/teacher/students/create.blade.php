@extends('layouts.teacher')

@section('title', 'Add New Student')
@section('page-title', 'Add New Student')

@section('content')
<div class="max-w-4xl">
    <div class="card">
        <form method="POST" action="{{ route('teacher.students.store') }}" class="space-y-6">
            @csrf

            <div class="border-b border-gray-200 pb-4">
                <h3 class="text-lg font-semibold text-gray-900">Personal Information</h3>
                <p class="mt-1 text-sm text-gray-600">Basic details about the student</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label for="name" class="label">Full Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required class="input-field" placeholder="John Doe">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="label">Email Address <span class="text-red-500">*</span></label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required class="input-field" placeholder="john@example.com">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="label">Password <span class="text-red-500">*</span></label>
                    <input type="password" name="password" id="password" required class="input-field" placeholder="••••••••">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Student ID -->
                <div>
                    <label for="student_id" class="label">Student ID <span class="text-red-500">*</span></label>
                    <input type="text" name="student_id" id="student_id" value="{{ old('student_id') }}" required class="input-field" placeholder="STU001">
                    @error('student_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="label">Phone Number</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="input-field" placeholder="+1 234 567 8900">
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Date of Birth -->
                <div>
                    <label for="date_of_birth" class="label">Date of Birth</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" class="input-field">
                    @error('date_of_birth')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Address -->
            <div>
                <label for="address" class="label">Address</label>
                <textarea name="address" id="address" rows="2" class="input-field" placeholder="123 Main St, City, State, ZIP">{{ old('address') }}</textarea>
                @error('address')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="border-b border-gray-200 pb-4 pt-6">
                <h3 class="text-lg font-semibold text-gray-900">Academic Information</h3>
                <p class="mt-1 text-sm text-gray-600">Student's academic details</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Grade -->
                <div>
                    <label for="grade" class="label">Grade</label>
                    <input type="text" name="grade" id="grade" value="{{ old('grade') }}" class="input-field" placeholder="10th Grade">
                    @error('grade')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Class -->
                <div>
                    <label for="class" class="label">Class/Section</label>
                    <input type="text" name="class" id="class" value="{{ old('class') }}" class="input-field" placeholder="A">
                    @error('class')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Enrollment Date -->
                <div>
                    <label for="enrollment_date" class="label">Enrollment Date</label>
                    <input type="date" name="enrollment_date" id="enrollment_date" value="{{ old('enrollment_date', date('Y-m-d')) }}" class="input-field">
                    @error('enrollment_date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="border-b border-gray-200 pb-4 pt-6">
                <h3 class="text-lg font-semibold text-gray-900">Parent/Guardian Information</h3>
                <p class="mt-1 text-sm text-gray-600">Contact details for parent or guardian</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Parent Name -->
                <div>
                    <label for="parent_name" class="label">Parent/Guardian Name</label>
                    <input type="text" name="parent_name" id="parent_name" value="{{ old('parent_name') }}" class="input-field" placeholder="Jane Doe">
                    @error('parent_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Parent Phone -->
                <div>
                    <label for="parent_phone" class="label">Parent/Guardian Phone</label>
                    <input type="text" name="parent_phone" id="parent_phone" value="{{ old('parent_phone') }}" class="input-field" placeholder="+1 234 567 8900">
                    @error('parent_phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Parent Email -->
                <div>
                    <label for="parent_email" class="label">Parent/Guardian Email</label>
                    <input type="email" name="parent_email" id="parent_email" value="{{ old('parent_email') }}" class="input-field" placeholder="parent@example.com">
                    @error('parent_email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('teacher.students.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Add Student</button>
            </div>
        </form>
    </div>
</div>
@endsection
