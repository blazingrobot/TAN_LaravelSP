<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Home Page
Route::get('/', function () {
    return view('home');
})->name('home');

// Student Routes
Route::prefix('students')->group(function () {
    Route::get('/', function () {
        // Static student data
        $students = [
            ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'course' => 'Computer Science', 'year_level' => '3rd Year'],
            ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'course' => 'Information Technology', 'year_level' => '2nd Year'],
            ['id' => 3, 'name' => 'Bob Johnson', 'email' => 'bob@example.com', 'course' => 'Software Engineering', 'year_level' => '4th Year'],
            ['id' => 4, 'name' => 'Alice Brown', 'email' => 'alice@example.com', 'course' => 'Data Science', 'year_level' => '1st Year'],
            ['id' => 5, 'name' => 'Charlie Wilson', 'email' => 'charlie@example.com', 'course' => 'Cybersecurity', 'year_level' => '3rd Year'],
        ];
        
        // Check if we have updated data in session
        if (Session::has('updated_student')) {
            $updatedStudent = Session::get('updated_student');
            foreach ($students as &$student) {
                if ($student['id'] == $updatedStudent['id']) {
                    $student = $updatedStudent;
                    break;
                }
            }
        }
        
        return view('students.index', compact('students'));
    })->name('students.index');
    
    Route::get('/create', function () {
        return view('students.create');
    })->name('students.create');
    
    Route::get('/{id}', function ($id) {
        $student = [
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'course' => 'Computer Science',
            'year_level' => '3rd Year',
            'created_at' => '2023-09-15'
        ];
        
        // Check for updated data in session
        if (Session::has('updated_student') && Session::get('updated_student')['id'] == $id) {
            $student = Session::get('updated_student');
        }
        
        return view('students.show', compact('student'));
    })->name('students.show');
    
    Route::get('/{id}/edit', function ($id) {
        $student = [
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'course' => 'Computer Science',
            'year_level' => '3rd Year'
        ];
        
        // Check for updated data in session
        if (Session::has('updated_student') && Session::get('updated_student')['id'] == $id) {
            $student = Session::get('updated_student');
        }
        
        return view('students.edit', compact('student'));
    })->name('students.edit');
    
    // Simulate update route
    Route::post('/{id}/update', function ($id) {
        // Simulate updating student data
        $updatedStudent = [
            'id' => $id,
            'name' => request('name'),
            'email' => request('email'),
            'course' => request('course'),
            'year_level' => request('year_level'),
            'created_at' => '2023-09-15'
        ];
        
        // Store in session to simulate persistence
        Session::put('updated_student', $updatedStudent);
        Session::flash('success', 'Student updated successfully!');
        
        return redirect()->route('students.show', $id);
    })->name('students.update');
});