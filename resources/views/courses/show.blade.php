@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Course Details</h2>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label">ID</label>
            <p class="form-control-plaintext">{{ $course->id }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label">Name</label>
            <p class="form-control-plaintext">{{ $course->name }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <p class="form-control-plaintext">{{ $course->description }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label">Professor</label>
            <p class="form-control-plaintext">{{ $course->professor ? $course->professor->name : 'None' }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label">Students</label>
            <ul>
                @foreach($course->students as $student)
                    <li>{{ $student->fname }} {{ $student->lname }}</li>
                @endforeach
            </ul>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection