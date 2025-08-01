<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
</head>
<body>
    <h1>Student Details</h1>
    <p><strong>ID:</strong> {{ $student->id }}</p>
    <p><strong>First Name:</strong> {{ $student->fname }}</p>
    <p><strong>Last Name:</strong> {{ $student->lname }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    
    <a href="{{ route('students.edit', $student->id) }}">Edit</a>
    <form action="{{ route('students.destroy', $student->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <a href="{{ route('students.index') }}">Back to List</a>
</body>
</html>