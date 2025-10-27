<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Student Management System</h1>
        </div>
        
        <div class="nav-bar">
            <a href="{{ route('students.create') }}" class="btn btn-primary">Add New Student</a>
        </div>
        
        <div class="students-list">
            @if($students->count() > 0)
                @foreach($students as $student)
                <div class="student-item">
                    <div class="student-info">
                        <div class="student-name">{{ $student->lname }}, {{ $student->fname }}</div>
                        <div class="student-number">Student #{{ $student->studentNumber }}</div>
                        @if($student->email)
                            <div class="student-email">{{ $student->email }}</div>
                        @endif
                    </div>
                    <div class="student-actions">
                        <a href="{{ route('students.edit', $student) }}" class="action-btn edit">Edit</a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn delete" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                        </form>
                    </div>
                </div>
                @endforeach
            @else
                <div class="text-center" style="padding: 3rem; color: #666;">
                    <h3>No students found</h3>
                    <p>Start by adding your first student!</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>