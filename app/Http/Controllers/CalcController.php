<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller
{

    public function showForm(){
        return view("calc.form");
    }

    public function result(Request $request){
        $x=$request->x;
        $y=$request->y;


        return view('calc.result', [
            "result"=>$x*$y
        ]);
    }
}
