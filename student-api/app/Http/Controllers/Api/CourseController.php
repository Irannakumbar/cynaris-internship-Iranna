<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Get all courses
    public function index()
    {
        return response()->json([
            'success' => true,
            'courses' => Course::latest()->get()
        ]);
    }

    // Create a course
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'course_code' => 'required|string|unique:courses,course_code',
            'description' => 'nullable|string',
            'duration_months' => 'required|integer|min:1',
            'fee' => 'required|numeric|min:0',
        ]);

        $course = Course::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Course created successfully',
            'course' => $course
        ], 201);
    }

    // Get one course
    public function show(Course $course)
    {
        return response()->json([
            'success' => true,
            'course' => $course
        ]);
    }

    // Update a course
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'course_code' => 'sometimes|required|string|unique:courses,course_code,' . $course->id,
            'description' => 'nullable|string',
            'duration_months' => 'sometimes|required|integer|min:1',
            'fee' => 'sometimes|required|numeric|min:0',
        ]);

        $course->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Course updated successfully',
            'course' => $course
        ]);
    }

    // Delete a course
    public function destroy(Course $course)
    {
        $course->delete();

        return response()->json([
            'success' => true,
            'message' => 'Course deleted successfully'
        ]);
    }
}
