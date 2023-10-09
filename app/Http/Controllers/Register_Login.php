<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class Register_Login extends Controller
{
    public function Register(Request $request){
        $request->validate(
            [
                'Name' => 'required|string',
                'Email' => 'required|email',
                'DOB' => 'required|date',
                'Password' => 'required|string|min:8',
            ]
            );
            $Name = strtolower($request->input('Name'));
            $Email = strtolower($request->input('Email'));
            $DOB = $request->input('DOB');
            $Password = $request->input('Password');
        $data = Users::where('email', $Email)->exists();
        if($data){
            $EmailExists = "email already exists in our database try different email.";
            return view('Register')->with(compact('EmailExists'));
        }else{
        $Users = new Users;
        $Users->name = $request->Name;
        $Users->email = strtolower($request->Email);
        $Users->dob = $request->DOB;
        $Users->password = md5($request->Password);
        $Users->updated_at = time();
        $Users->created_at = time();
        if($Users->save()){
            
            mail($Users->email, "Registeration Confirmation", "Hi ". $Users->name. ",\nThank you for Registering Yourself on our platform now enjoy our services.");
            $success = "success";
            return view('Register')->with(compact('success', 'Name', 'Email'));
    }
}
    }

    public function Login(Request $request){
        $request->validate(
            [
                'Email' => 'required|email',
                'Password' => 'required|string'
            ]
            );

            $Email = strtolower($request->input('Email'));
            $Password = md5($request->input('Password'));
        $data = Users::where('email', $Email)->where('password', $Password)->first();
        if($data){
           session(['Email' => $Email]);
            return redirect('/tools');
}
else{
    $NotFound = "Email and Password Combination is not found in our database, try again later";
    return view('Login')->with('NotFound', $NotFound);
}
    }
}
