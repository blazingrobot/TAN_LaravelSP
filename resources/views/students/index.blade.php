@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Student List</h1>
        <a href="{{ route('students.create') }}" class="btn btn-success">Add New Student</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Year Level</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $students = [
                            ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'course' => 'Computer Science', 'year_level' => '3rd Year'],
                            ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'course' => 'Information Technology', 'year_level' => '2nd Year'],
                            ['id' => 3, 'name' => 'Bob Johnson', 'email' => 'bob@example.com', 'course' => 'Software Engineering', 'year_level' => '4th Year'],
                            ['id' => 4, 'name' => 'Alice Brown', 'email' => 'alice@example.com', 'course' => 'Data Science', 'year_level' => '1st Year'],
                            ['id' => 5, 'name' => 'Charlie Wilson', 'email' => 'charlie@example.com', 'course' => 'Cybersecurity', 'year_level' => '3rd Year'],
                        ];
                    @endphp
                    
                    @foreach($students as $student)
                    <tr>
                        <td>{{ $student['id'] }}</td>
                        <td>{{ $student['name'] }}</td>
                        <td>{{ $student['course'] }}</td>
                        <td>{{ $student['year_level'] }}</td>
                        <td>
                            <a href="{{ route('students.show', $student['id']) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('students.edit', $student['id']) }}" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection