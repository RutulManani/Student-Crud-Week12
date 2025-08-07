<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .main-nav {
            background: #f8f9fa;
            padding: 1rem;
            margin-bottom: 2rem;
            border-bottom: 1px solid #dee2e6;
        }
        .nav-links {
            display: flex;
            gap: 1rem;
        }
        .nav-link {
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }
        .nav-link:hover {
            color: #0d6efd;
        }
    </style>
</head>
<body>
    <div class="main-nav">
        <div class="container">
            <div class="nav-links">
                <a href="{{ route('students.index') }}" class="nav-link">Students</a>
                <a href="{{ route('courses.index') }}" class="nav-link">Courses</a>
                <a href="{{ route('professors.index') }}" class="nav-link">Professors</a>
            </div>
        </div>
    </div>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>