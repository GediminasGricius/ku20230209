<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class StudentController extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){

        $filter=$request->session()->get('filterStudents', (object)['name'=>null,'year'=>null]);

        $students=Student::with(['course','grades'])->filter($filter)->orderBy("name")->get();

        return view("students.index",[
            "students"=>$students,
             "filter"=>$filter
            ]
        );
    }

    public function create(){
        return view("students.creat");
    }

    public function save(StudentRequest $request){
        $request->validate();
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

    public function update($id, StudentRequest $request){
        $student=Student::find($id);
        $student->name=$request->name;
        $student->surname=$request->surname;
        $student->year=$request->year;

        if ($request->file("image")!=null){
            if ($student->image!=null){
                unlink(storage_path()."/app/public/students/".$student->image);
            }

            $request->file("image")->store("/public/students");
            $student->image=$request->file("image")->hashName();
        }
        if ($request->file("agreement")!=null){
            if ($student->agreement!=null){
                unlink(storage_path()."/app/agreements/".$student->agreement);
            }

            $request->file("agreement")->store("/agreement");
            $student->agreement=$request->file("agreement")->hashName();
        }

        //$request->file("image")->storeAs("/public/students", $request->file("image")->getClientOriginalName());
        $student->save();
        return redirect()->route("students.index");
    }

    public function delete($id){
        Student::destroy($id);
        return redirect()->route("students.index");
    }

    public function search(Request $request){
        $filterStudents=new \stdClass();
        $filterStudents->name=$request->name;
        $filterStudents->year=$request->year;

        $request->session()->put('filterStudents', $filterStudents);
        return redirect()->route('students.index');
    }

    public function getAgreement($id){
        $student=Student::find($id);
        if ($student->agreement==null){
            return redirect()->route("students.index");
        }
        return response()->download(storage_path().'/app/agreement/'.$student->agreement);
    }

}
