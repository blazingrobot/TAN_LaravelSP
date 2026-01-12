@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Edit Student</h1>
                </div>
                <div class="card-body">
                    @php
                        // Static student data
                        $student = [
                            'id' => 1,
                            'name' => 'John Doe',
                            'email' => 'john@example.com',
                            'course' => 'Computer Science',
                            'year_level' => '3rd Year'
                        ];
                        
                        // Check if form was submitted (for simulation)
                        $submitted = isset($_GET['submitted']) && $_GET['submitted'] == 'true';
                        
                        // If form was "submitted", show success message
                        if($submitted) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Student information has been updated successfully!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                  </div>';
                        }
                    @endphp
                    
                    <form method="GET" action="{{ route('students.edit', $student['id']) }}">
                        <input type="hidden" name="submitted" value="true">
                        <input type="hidden" name="id" value="{{ $student['id'] }}">
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" 
                                   value="{{ isset($_GET['name']) ? $_GET['name'] : $student['name'] }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   value="{{ isset($_GET['email']) ? $_GET['email'] : $student['email'] }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="course" class="form-label">Course</label>
                            <select class="form-select" id="course" name="course" required>
                                @php
                                    $courses = ['Computer Science', 'Information Technology', 'Software Engineering', 'Data Science', 'Cybersecurity'];
                                    $selectedCourse = isset($_GET['course']) ? $_GET['course'] : $student['course'];
                                @endphp
                                @foreach($courses as $course)
                                    <option value="{{ $course }}" {{ $selectedCourse == $course ? 'selected' : '' }}>
                                        {{ $course }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="year_level" class="form-label">Year Level</label>
                            <select class="form-select" id="year_level" name="year_level" required>
                                @php
                                    $yearLevels = ['1st Year', '2nd Year', '3rd Year', '4th Year'];
                                    $selectedYear = isset($_GET['year_level']) ? $_GET['year_level'] : $student['year_level'];
                                @endphp
                                @foreach($yearLevels as $year)
                                    <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('students.show', $student['id']) }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection