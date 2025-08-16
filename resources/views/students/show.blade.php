@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Student Details</h2>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label">ID</label>
            <p class="form-control-plaintext">{{ $student->id }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label">First Name</label>
            <p class="form-control-plaintext">{{ $student->fname }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label">Last Name</label>
            <p class="form-control-plaintext">{{ $student->lname }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <p class="form-control-plaintext">{{ $student->email }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label">Courses</label>
            <ul>
                @foreach($student->courses as $course)
                    <li>{{ $course->name }}</li>
                @endforeach
            </ul>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection