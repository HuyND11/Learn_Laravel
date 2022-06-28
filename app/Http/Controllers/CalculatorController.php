<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    function calculate(Request $req) {
        $firstNumber = $req->input('a');
        $secondNumber = $req->input('b');
        $formula = $req->formula;
        $result = 0;
        $validate = $req->validate([
            'a' => "required|integer",
            'b' => "required|integer",
            'formula' => "required",
        ],
        [
            'a.required' => "Nhap vao con cho nay",
            'a.integer' => "Nhap dung di con cho nay",
            'b.integer' => "Nhap dung di con cho nay",
            'b.required' => "Nhap vao con cho nay",
            'formula.required' => "Chon phep tinh di con cho nay",
        ]
    );
        if($formula == 1){
            $result = $firstNumber + $secondNumber;
        }
        else if ($formula == 2){
            $result = $firstNumber - $secondNumber;
        }
        else if ($formula == 3){
            $result = $firstNumber * $secondNumber;
        }
        else if($formula == 4){
            if($secondNumber != 0 ){
                $result = $firstNumber / $secondNumber;
            }
            else {
                $result = "Und";
            }
        }
        else{
            $result = 0;
        }
        return view("Demo/Calculation", compact("result", "firstNumber", "secondNumber", "formula"));
    }
}


