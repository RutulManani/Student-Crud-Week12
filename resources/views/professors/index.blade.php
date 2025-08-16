@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Professors List</h2>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Course</th>
                </tr>
            </thead>
            <tbody>
                @foreach($professors as $professor)
                <tr>
                    <td>{{ $professor->id }}</td>
                    <td>{{ $professor->name }}</td>
                    <td>{{ $professor->course ? $professor->course->name : 'None' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection