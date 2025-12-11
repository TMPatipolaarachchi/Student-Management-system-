@extends('layouts.teacher')

@section('title', 'Edit Student')
@section('page-title', 'Edit Student')

@section('content')
<div class="max-w-4xl">
    <div class="card">
        <form method="POST" action="{{ route('teacher.students.update', $student) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="border-b border-gray-200 pb-4">
                <h3 class="text-lg font-semibold text-gray-900">Personal Information</h3>
                <p class="mt-1 text-sm text-gray-600">Update student's basic details</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="label">Full Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name', $student->user->name) }}" required class="input-field">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="label">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" id="email" value="{{ old('email', $student->user->email) }}" required class="input-field">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="student_id" class="label">Student ID <span class="text-red-500">*</span></label>
                    <input type="text" name="student_id" id="student_id" value="{{ old('student_id', $student->student_id) }}" required class="input-field">
                    @error('student_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone" class="label">Phone</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $student->user->phone) }}" class="input-field">
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="date_of_birth" class="label">Date of Birth</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $student->user->date_of_birth?->format('Y-m-d')) }}" class="input-field">
                    @error('date_of_birth')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="address" class="label">Address</label>
                <textarea name="address" id="address" rows="2" class="input-field">{{ old('address', $student->user->address) }}</textarea>
                @error('address')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="border-b border-gray-200 pb-4 pt-6">
                <h3 class="text-lg font-semibold text-gray-900">Academic Information</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="grade" class="label">Grade</label>
                    <input type="text" name="grade" id="grade" value="{{ old('grade', $student->grade) }}" class="input-field">
                    @error('grade')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="class" class="label">Class/Section</label>
                    <input type="text" name="class" id="class" value="{{ old('class', $student->class) }}" class="input-field">
                    @error('class')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="status" class="label">Status <span class="text-red-500">*</span></label>
                    <select name="status" id="status" required class="input-field">
                        <option value="active" {{ old('status', $student->status) === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status', $student->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="suspended" {{ old('status', $student->status) === 'suspended' ? 'selected' : '' }}>Suspended</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="border-b border-gray-200 pb-4 pt-6">
                <h3 class="text-lg font-semibold text-gray-900">Parent/Guardian Information</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="parent_name" class="label">Parent/Guardian Name</label>
                    <input type="text" name="parent_name" id="parent_name" value="{{ old('parent_name', $student->parent_name) }}" class="input-field">
                    @error('parent_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="parent_phone" class="label">Parent/Guardian Phone</label>
                    <input type="text" name="parent_phone" id="parent_phone" value="{{ old('parent_phone', $student->parent_phone) }}" class="input-field">
                    @error('parent_phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="parent_email" class="label">Parent/Guardian Email</label>
                    <input type="email" name="parent_email" id="parent_email" value="{{ old('parent_email', $student->parent_email) }}" class="input-field">
                    @error('parent_email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="notes" class="label">Notes</label>
                <textarea name="notes" id="notes" rows="3" class="input-field" placeholder="Additional notes about the student">{{ old('notes', $student->notes) }}</textarea>
                @error('notes')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('teacher.students.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Student</button>
            </div>
        </form>
    </div>
</div>
@endsection
