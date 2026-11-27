<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    // Enroll a student in a course
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $student = Student::findOrFail($validated['student_id']);

        if ($student->courses()->where('course_id', $validated['course_id'])->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Student is already enrolled in this course.'
            ], 409);
        }

        $student->courses()->attach($validated['course_id'], [
            'enrolled_at' => now()->toDateString(),
            'status' => 'active',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Student enrolled successfully.'
        ], 201);
    }

    // View enrolled courses of a student
    public function show($studentId)
    {
        $student = Student::with('courses')->findOrFail($studentId);

        return response()->json([
            'success' => true,
            'student' => $student
        ]);
    }

    // Remove enrollment
    public function destroy($studentId, $courseId)
    {
        $student = Student::findOrFail($studentId);

        $student->courses()->detach($courseId);

        return response()->json([
            'success' => true,
            'message' => 'Enrollment removed successfully.'
        ]);
    }
}
