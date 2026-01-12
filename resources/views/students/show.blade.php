@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Student Profile</h1>
                </div>
                <div class="card-body">
                    @php
                        $student = [
                            'id' => 1,
                            'name' => 'John Doe',
                            'email' => 'john@example.com',
                            'course' => 'Computer Science',
                            'year_level' => '3rd Year',
                            'created_at' => '2023-09-15'
                        ];
                    @endphp
                    
                    <div class="text-center mb-4">
                        <div class="student-avatar bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" 
                             style="width: 100px; height: 100px; font-size: 2rem;">
                            {{ strtoupper(substr($student['name'], 0, 1)) }}
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th class="text-end" style="width: 40%;">Student ID:</th>
                                    <td>{{ $student['id'] }}</td>
                                </tr>
                                <tr>
                                    <th class="text-end">Full Name:</th>
                                    <td>{{ $student['name'] }}</td>
                                </tr>
                                <tr>
                                    <th class="text-end">Email Address:</th>
                                    <td>{{ $student['email'] }}</td>
                                </tr>
                                <tr>
                                    <th class="text-end">Course:</th>
                                    <td>{{ $student['course'] }}</td>
                                </tr>
                                <tr>
                                    <th class="text-end">Year Level:</th>
                                    <td>{{ $student['year_level'] }}</td>
                                </tr>
                                <tr>
                                    <th class="text-end">Date Enrolled:</th>
                                    <td>{{ $student['created_at'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="text-center mt-4">
                        <a href="{{ route('students.index') }}" class="btn btn-primary">Back to Student List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection