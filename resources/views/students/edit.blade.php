<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="fname">First Name:</label>
        <input type="text" name="fname" id="fname" value="{{ $student->fname }}" required><br>
        
        <label for="lname">Last Name:</label>
        <input type="text" name="lname" id="lname" value="{{ $student->lname }}" required><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $student->email }}" required><br>
        
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('students.index') }}">Back to List</a>
</body>
</html>