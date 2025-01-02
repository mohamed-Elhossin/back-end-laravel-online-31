<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Models\Lavel;
use App\Models\Student;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::with("lavel")->paginate(5);
        if ($students->isEmpty()) {
            $reponse = [
                "status" => 200,
                "message" => "Empty Data",
            ];
        } else {
            $reponse = [
                "status" => 200,
                "data" => $students,
                "message" => "Get Student Data Successfully",
            ];
        }

        return response($reponse, 200);
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|string|min:3|max:50",
            "email" => "required|email|unique:students,email",
            "GPA" => "required|numeric",
            "lavel_id" => "required"
        ]);
        $student =     Student::create([
            "name" => $request->name,
            "GPA" => $request->GPA,
            "email" => $request->email,
            "lavel_id" => $request->lavel_id,
        ]);

        $reponse = [
            "status" => 201,
            "data" => $student,
            "message" => "Create Student Data Successfully",
        ];

        return response($reponse, 200);
    }


    public function show($id)
    {
        $student = Student::with("lavel")->where("id", "=", $id)->first();

        if ($student == null) {
            $reponse = [
                "status" => 200,
                "message" => "Student Not Found With this ID",
            ];
        } else {
            $reponse = [
                "status" => 200,
                "data" => $student,
                "message" => "GET Student Data",
            ];
        }
        return response($reponse, 200);
    }




    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => "string|min:3|max:50",
            "email" => "email|unique:students,email,$id",
            "GPA" => "numeric",
            "lavel_id" => "required"
        ]);
        $student =   Student::where("id", "=", $id)->update([
            "name" => $request->name,
            "GPA" => $request->GPA,
            "email" => $request->email,
            "lavel_id" => $request->lavel_id,
        ]);
        $reponse = [
            "status" => 201,
            "data" => $student,
            "message" => "Update Student Data Successfully",
        ];

        return response($reponse, 200);
    }

    public function destroy(string $id)
    {
        $student = Student::find($id);
        if ($student == null) {
            $reponse = [
                "status" => 200,
                "message" => "Student Not Found With this ID",
            ];
        } else {
            $student->delete();
            $reponse = [
                "status" => 200,
                "data" => $student,
                "message" => "Delete Student Data",
            ];
        }
        return response($reponse, 200);
    }

    
}
