<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BMI_Controller extends Controller
{
    public function index(Request $request){
        $request->validate([
            'H' => 'required|numeric',
            'W' => 'required|numeric'
        ]);
        
        $Feet = $request->H;
        $Weight = $request->W;
        $heightInMeter = $Feet / 3.284;
        $BMI = $Weight / pow($heightInMeter, 2);
        return view('BMI')->with('BMI', $BMI);
    }
}
