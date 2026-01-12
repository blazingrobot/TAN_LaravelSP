@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Welcome to the Student Portal</h1>
                </div>
                <div class="card-body">
                    <p class="lead text-center">
                        This system allows you to manage student records efficiently. 
                        You can view, add, edit, and manage student information with ease.
                    </p>
                    <p class="text-center">
                        The Student Portal provides a comprehensive platform for tracking student details 
                        including their personal information, course enrollment, and academic progress.
                    </p>
                    <div class="text-center mt-4">
                        <a href="{{ route('students.index') }}" class="btn btn-primary btn-lg">
                            View Student List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection