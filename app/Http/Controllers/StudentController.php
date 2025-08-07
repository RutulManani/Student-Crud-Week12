<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
        ]);

        try {
            Student::create($request->all());
            Session::flash('success', 'Student created successfully!');
            return redirect()->route('students.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Error creating student: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
        ]);

        try {
            $student->update($request->all());
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
            $student->delete();
            Session::flash('success', 'Student deleted successfully!');
            return redirect()->route('students.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Error deleting student: ' . $e->getMessage());
            return redirect()->route('students.index');
        }
    }
}