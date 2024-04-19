<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

class Admin extends Controller
{
    public function RemoveUser($email)
    {
        // Retrieve the user by email
        $user = User::where('email', $email)->first();

        // Delete the user
        $user->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'User removed successfully');
    }

    public function SendEmail(Request $request)
    {
        // Validate the form data
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Fetch all users
        $users = User::all();
        $subscribers = Subscribe::all();

        // Send email to each user
        foreach ($users as $user) {
            Mail::send(new SendEmail($user->email, $request->subject, $request->message));
        }

        foreach ($subscribers as $subscriber) {
            Mail::send(new SendEmail($subscriber->email, $request->subject, $request->message));
        }

        return redirect()->back();
    }
}
