<?php

namespace App\Http\Controllers;

class StudentController extends Controller
{
    public function index()
    {
        $students = [
            ['id' => 1, 'name' => 'Iranna', 'course' => 'MCA'],
            ['id' => 2, 'name' => 'Rahul', 'course' => 'BCA'],
            ['id' => 3, 'name' => 'Kiran', 'course' => 'MCA'],
            ['id' => 4, 'name' => 'Raj', 'course' => 'MCA'],
        ];

        return view('students', compact('students'));
    }
}
