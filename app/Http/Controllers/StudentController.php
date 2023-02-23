<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        return view("students.index",[
            "students"=>Student::orderBy("name")->get()
            ]
        );
    }

    public function create(){
        return view("students.creat");
    }

    public function save(Request $request){
        $student=new Student();
        $student->name=$request->name;
        $student->surname=$request->surname;
        $student->year=$request->year;
        $student->save();
        return redirect()->route("students.index");

    }

    public function edit($id){
        return view("students.edit",[
            "student"=>Student::find($id)
        ]);
    }

    public function update($id, Request $request){
        $student=Student::find($id);
        $student->name=$request->name;
        $student->surname=$request->surname;
        $student->year=$request->year;
        $student->save();
        return redirect()->route("students.index");
    }

    public function delete($id){
        Student::destroy($id);
        return redirect()->route("students.index");
    }
}
