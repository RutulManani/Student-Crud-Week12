@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Edit Student</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" name="fname" value="{{ old('fname', $student->fname) }}">
                @error('fname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname" name="lname" value="{{ old('lname', $student->lname) }}">
                @error('lname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $student->email) }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Courses</label>
                @foreach($courses as $course)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="courses[]" 
                               value="{{ $course->id }}" id="course{{ $course->id }}"
                               {{ $student->courses->contains($course->id) ? 'checked' : '' }}>
                        <label class="form-check-label" for="course{{ $course->id }}">
                            {{ $course->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection