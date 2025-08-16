<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with(['professor', 'students'])->get();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $professors = Professor::all();
        return view('courses.create', compact('professors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'professor_id' => 'nullable|exists:professors,id',
        ]);

        try {
            Course::create($request->all());
            Session::flash('success', 'Course created successfully!');
            return redirect()->route('courses.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Error creating course: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function show(Course $course)
    {
        $course->load(['professor', 'students']);
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $professors = Professor::all();
        $course->load('professor');
        return view('courses.edit', compact('course', 'professors'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'professor_id' => 'nullable|exists:professors,id',
        ]);

        try {
            $course->update($request->all());
            Session::flash('success', 'Course updated successfully!');
            return redirect()->route('courses.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Error updating course: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function destroy(Course $course)
    {
        try {
            $course->students()->detach();
            $course->delete();
            Session::flash('success', 'Course deleted successfully!');
            return redirect()->route('courses.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Error deleting course: ' . $e->getMessage());
            return redirect()->route('courses.index');
        }
    }
}