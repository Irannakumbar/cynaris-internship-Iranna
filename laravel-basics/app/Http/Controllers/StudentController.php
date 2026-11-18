<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display all students
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    // Show create form
    public function create()
    {
        return view('students.create');
    }

    // Store student
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'course' => 'required',
            'phone' => 'nullable'
        ]);

        Student::create($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student added successfully!');
    }

    // Show individual student
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    // Edit student
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Update student
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'course' => 'required',
            'phone' => 'nullable'
        ]);

        $student->update($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully!');
    }

    // Delete student
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully!');
    }
}
