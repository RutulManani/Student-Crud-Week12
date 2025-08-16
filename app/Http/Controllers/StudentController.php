<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('courses')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('students.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'courses' => 'nullable|array',
        ]);

        try {
            $student = Student::create($request->only(['fname', 'lname', 'email']));
            
            if ($request->has('courses')) {
                $student->courses()->attach($request->courses);
            }
            
            Session::flash('success', 'Student created successfully!');
            return redirect()->route('students.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Error creating student: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function show(Student $student)
    {
        $student->load('courses');
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $courses = Course::all();
        $student->load('courses');
        return view('students.edit', compact('student', 'courses'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'courses' => 'nullable|array',
        ]);

        try {
            $student->update($request->only(['fname', 'lname', 'email']));
            
            $student->courses()->sync($request->courses ?? []);
            
            Session::flash('success', 'Student updated successfully!');
            return redirect()->route('students.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Error updating student: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function destroy(Student $student)
    {
        try {
            $student->courses()->detach();
            $student->delete();
            Session::flash('success', 'Student deleted successfully!');
            return redirect()->route('students.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Error deleting student: ' . $e->getMessage());
            return redirect()->route('students.index');
        }
    }
}