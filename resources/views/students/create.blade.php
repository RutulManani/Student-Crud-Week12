@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Add New Student</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" name="fname" value="{{ old('fname') }}">
                @error('fname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname" name="lname" value="{{ old('lname') }}">
                @error('lname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Courses</label>
                @foreach($courses as $course)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="courses[]" value="{{ $course->id }}" id="course{{ $course->id }}">
                        <label class="form-check-label" for="course{{ $course->id }}">
                            {{ $course->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection