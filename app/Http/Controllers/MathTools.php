<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MathTools extends Controller
{
    public function RandomNumber(Request $request){
        $request->validate(
            [
                'Lower' => 'required|numeric',
                'Upper' => 'required|numeric'
            ]
            );

            $Lower = $request->Lower;
            $Upper = $request->Upper;

            $Answer = rand($Lower, $Upper);

            return view('MathTools.RandomNumberGenerator')->with(compact('Answer'));
    }

    public function Percentage(Request $request){
        $request->validate(
            [
                'P' => 'required|numeric',
                'V' => 'required|numeric'
            ]
            );

            $P = $request->P;
            $V = $request->V;

            $Answer = compact('P', 'V');
            return view('MathTools.Percentage')->with($Answer);
    }
}
