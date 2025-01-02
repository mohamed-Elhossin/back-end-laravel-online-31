<?php

namespace App\Http\Controllers;

use App\Models\Lavel;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::with("lavel")->paginate(5);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $lavels = Lavel::all();
        return view("students.create", compact('lavels'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|string|min:3|max:50",
            "email" => "required|email|unique:students,email",
            "GPA" => "required|numeric",
            "lavel_id" => "required"
        ]);
        Student::create([
            "name" => $request->name,
            "GPA" => $request->GPA,
            "email" => $request->email,
            "lavel_id" => $request->lavel_id,
        ]);

        return redirect()->back()->with("success", "Create Student Successfully");
    }


    public function show($id)
    {
        $student = Student::with("lavel")->where("id", "=", $id)->first();
        return view("students.show", compact("student"));
    }

    public function edit(string $id)
    {
        $lavels = Lavel::all();
        $student = Student::find($id);
        return view("students.edit", compact("student", 'lavels'));
    }


    public function update(Request $request, string $id)
    {
   
        $request->validate([
            'name' => "required|string|min:3|max:50",
            "email" => "required|email|unique:students,email,$id",
            "GPA" => "required|numeric",
            "lavel_id" => "required"
        ]);
        Student::where("id", "=", $id)->update([
            "name" => $request->name,
            "GPA" => $request->GPA,
            "email" => $request->email,
            "lavel_id" => $request->lavel_id,
        ]);
        return redirect()->route("student.index")->with("success", "Update Student Successfully");
    }

    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route("student.index")->with("success", "Delete Student Successfully");
    }
}

