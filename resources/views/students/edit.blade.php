<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Edit Student</h1>
        </div>
        
        <div class="form-container">
            <form action="{{ route('students.update', $student) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="studentNumber">Student Number *</label>
                    <input type="text" id="studentNumber" name="studentNumber" class="form-control" 
                           placeholder="Enter student number" value="{{ $student->studentNumber }}" required>
                </div>
                
                <div class="form-group">
                    <label for="lname">Last Name *</label>
                    <input type="text" id="lname" name="lname" class="form-control" 
                           placeholder="Enter last name" value="{{ $student->lname }}" required>
                </div>
                
                <div class="form-group">
                    <label for="fname">First Name *</label>
                    <input type="text" id="fname" name="fname" class="form-control" 
                           placeholder="Enter first name" value="{{ $student->fname }}" required>
                </div>
                
                <div class="form-group">
                    <label for="mi">Middle Initial</label>
                    <input type="text" id="mi" name="mi" class="form-control" 
                           placeholder="Enter middle initial" value="{{ $student->mi }}" maxlength="1">
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" 
                           placeholder="Enter email address" value="{{ $student->email }}">
                </div>
                
                <div class="form-group">
                    <label for="contactNumber">Contact Number</label>
                    <input type="text" id="contactNumber" name="contactNumber" class="form-control" 
                           placeholder="Enter contact number" value="{{ $student->contactNumber }}">
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Update Student</button>
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
