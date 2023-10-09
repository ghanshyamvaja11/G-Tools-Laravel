<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscribe;

class SubscribeInsert extends Controller
{
    public function Subscribe(Request $request){
        
        $request->validate([
        'email' => 'required|email'
    ]);

    $email = strtolower($request->input('email'));
        $data = Subscribe::where('email', $email)->exists();
        if($data){
            $EmailExists = "email already exists in our database try different email.";
            return view('index')->with(compact('EmailExists'));
        }
        else{
            $table = new Subscribe;
            $table->email = strtolower($request->input('email'));
            $Confirmation = "Thank you for subscribing Us.";
            if($table->save()){
               return view('index')->with(compact('Confirmation'));
            }
        }
    }
}
