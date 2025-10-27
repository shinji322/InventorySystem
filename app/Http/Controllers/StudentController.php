<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
class StudentController extends Controller
{
 // Show all students
 public function index()
 {
 $students = Student::all();
 return view('students.index', compact('students'));
 }
 // Show form to create a student
 public function create()
 {
 return view('students.create');
 }
 // Save new student
 public function store(Request $request)
 {
 Student::create($request->all());
 return redirect()->route('students.index');
 }
 
 // Show form to edit a student
 public function edit(Student $student)
 {
 return view('students.edit', compact('student'));
 }
 
 // Update a student
 public function update(Request $request, Student $student)
 {
 $student->update($request->all());
 return redirect()->route('students.index');
 }
 
 // Delete a student
 public function destroy(Student $student)
 {
 $student->delete();
 return redirect()->route('students.index');
 }
}

