<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
class DemoController extends Controller
{
    public function GPTB1_POST (Request $req) {
        $a = $req->a;
        $b = $req->b;
        // $validated = $req->validate([
        //     'a' => "required|integer",
        //     'b' => "required|integer"  
        // ],[
        //     'a.required' => "Nhap vao con cho nay",
        //     'a.integer' => "Nhap dung di con cho nay",
        //     'b.integer' => "Nhap dung di con cho nay",
        //     'b.required' => "Nhap vao con cho nay"
        // ]);
        $validator = Validator::make($req->all(), [
                'a' => "required|integer",
                'b' => "required|integer"  
            ],[
                'a.required' => "Nhap vao con cho nay",
                'a.integer' => "Nhap dung di con cho nay",
                'b.integer' => "Nhap dung di con cho nay",
                'b.required' => "Nhap vao con cho nay"
        ]);
        if($validator->fails()){
            $error = $validator->errors();
            return view("Demo/PTB1")->withErrors($validator);
        }
        if($a == 0){
            if($b == 0){
                $result = 'Equation with infinite solutions';
            }
            else{
                $result =  'The equation has no solution';
            }
        }else{
            $result = 'Equation has solution: x=  ' . round(-$b / $a, 2);
        }
    
        return view("Demo/PTB1", compact('result','a', 'b'));
    }

    // public function GPTB1_GET (Request $req) {
    //     $validated = $req->validate([
    //         'a' => "required|integer",
    //         'b' => "required|integer"  
    //     ]);
    //     $validated = $req->error([
    //         "a" => "Bo dam chet m h",
    //         "b" => "Bo lao bo te"
    //     ]);
    //     $a = $req->query("a", 0);
    //     $b = $req->query("b", 0);
    //     // $a = $req->a;
    //     // $b = $req->b;
    //     if($a == 0){
    //         if($b == 0){
    //             $result = 'Equation with infinite solutions';
    //         }
    //         else{
    //             $result =  'The equation has no solution';
    //         }
    //     }else{
    //         $result = 'Equation has solution: x=  ' . round(-$b / $a, 2);
    //     }
    
    //     return view("Demo/PTB1", compact('result','a', 'b'));
    // }
}
