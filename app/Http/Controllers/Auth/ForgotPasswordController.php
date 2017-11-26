<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function changePasswordGet() {
        return view('changePassword');
    }

    public function changePasswordPost(request $request) {

        $user = User::where('email', $request['email'])->first();

        if (!Hash::check($request['old_password'], $user->password)) {
            return redirect('/change_password')->withErrors(['old_password' => 'Wrong password!']);
        }

        $request->validate([
            'email' => 'required|string|email|max:255',
            'old_password' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::where('email', $request['email'])->first();

        $user->password = bcrypt($request['password']);
        $user->save();

        return redirect('/home');
    }
}
