<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact_Us;

class Contact_Us_Controller extends Controller
{
     public function index(Request $request){
        $Contact_Us = new Contact_Us;
        $request->validate(
            [
                'name' => 'required|string',
                'email' => 'required|email',
                'message' => 'required|string'
            ]
            );

        $email = strtolower($request->input('email'));
        $data = Contact_Us::where('email', $email)->exists();
        if($data){
            $EmailExists = "email already exists in our database try different email.";
            return view('index')->with(compact('EmailExists'));
        }else{
        $Contact_Us->name = $request->name;
        $Contact_Us->email = strtolower($request->email);
        $Contact_Us->message = $request->message;
        $Contact_Us->updated_at = time();
        $Contact_Us->created_at = time();
        if($Contact_Us->save()){
            $success = "success";
            return view('Contact Us')->with('success', 'success');
        }
    }
}
}
