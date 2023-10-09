<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RandomPasswordGeneratorController extends Controller
{
    public function index(Request $request){
        $request->validate(
            [
                'Lenght' => 'required|numeric',
                'Combination' => 'required|string'
            ]
            );
            
        $PasswordLength = $request->Length;
    $Digits = "0123456789";
    $Alphabets = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $SpecialCharacters = ".,=_-@#$&*?/[]{}()!%^|";
    $DigitsAndAlphabets = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $DigitsAndSpecialCharacters = "0123456789.,=_-@#$&*?/[]{}()!%^|";
    $AlphabetsAndSpecialCharacters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz.,=_-@#$&*?/[]{}()!%^|";
    $DigitsAndAlphabetsAndSpecialCharacters = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz.,=_-@#$&*?/[]{}()!%^|";
    $Combination = $request->Combination;
    $GeneratedPassword = "";

     if($Combination == "Digits"){
      $Strlen = strlen($Digits);
    for($i=0; $i<$PasswordLength; $i++){
    $GeneratedPassword .= $Digits[rand(0, $Strlen-1)];
      }
    }
    else if($Combination == "Alphabets"){
       $Strlen = strlen($Alphabets);
    for($i=0; $i<$PasswordLength; $i++){
    $GeneratedPassword .= $Alphabets[rand(0, $Strlen-1)];
    }
    }
    else if($Combination == "Special Characters"){
       $Strlen = strlen($SpecialCharacters);
    for($i=0; $i<$PasswordLength; $i++){
    $GeneratedPassword .= $SpecialCharacters[rand(0, $Strlen-1)];
    }
    }
    else if($Combination == "Digits + Alphabets"){
       $Strlen = strlen($DigitsAndAlphabets);
    for($i=0; $i<$PasswordLength; $i++){
    $GeneratedPassword .= $DigitsAndAlphabets[rand(0, $Strlen-1)];
    }
    }
    else if($Combination == "Digits + Special Characters"){
       $Strlen = strlen($DigitsAndSpecialCharacters);
    for($i=0; $i<$PasswordLength; $i++){
    $GeneratedPassword .= $DigitsAndSpecialCharacters[rand(0, $Strlen-1)];
    }
    }
    else if($Combination == "Alphabets + Special Characters"){
       $Strlen = strlen($AlphabetsAndSpecialCharacters);
    for($i=0; $i<$PasswordLength; $i++){
    $GeneratedPassword .= $AlphabetsAndSpecialCharacters[rand(0, $Strlen-1)];
    }
    }
    else if($Combination == "Digits + Alphabets + Special Characters"){
       $Strlen = strlen($DigitsAndAlphabetsAndSpecialCharacters);
    for($i=0; $i<$PasswordLength; $i++){
    $GeneratedPassword .= $DigitsAndAlphabetsAndSpecialCharacters[rand(0, $Strlen-1)];
    }
    }

    $GeneratedPassword = preg_replace('/\s+/', '', $GeneratedPassword);

    $Answer = compact('PasswordLength', 'GeneratedPassword');
    return view('RandomPasswordgenerator')->with($Answer);
    }
}
