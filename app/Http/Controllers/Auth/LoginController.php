<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;


class LoginController extends Controller
{

    public function login(){
        return view("auth.login");
    }



// public function authenticate(Request $request)
// {
//     try {
//         $request->validate([
//             'email' => 'required',
//             'password' => 'required',
//         ]);

//         $credentials = $request->only('email', 'password');

//         if (Auth::attempt($credentials)) {
//             Session::put('name', Auth::user()->name);
//             return redirect()->route(route: 'home');
//         } else {
//             return redirect()->back()->withErrors(['login' => 'Invalid credentials']);
//         }
//     } catch (\Exception $e) {
//         Log::error('Authentication Error: ' . $e->getMessage());
//         return redirect()->back()->withErrors(['login' => 'An error occurred during login. Please try again.']);
//     }


// }
public function authenticate(Request $request)
{
    try {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Session::put('name', $user->name);

            if ($user->user_type === 'student') {
                return redirect()->route('student.attendance');
            } elseif ($user->user_type === 'user') {
                return redirect()->route('home');
            }
        } else {
            return redirect()->back()->withErrors(['login' => 'Invalid credentials']);
        }
    } catch (\Exception $e) {
                 Log::error('Authentication Error: ' . $e->getMessage());
                 return redirect()->back()->withErrors(['login' => 'An error occurred during login. Please try again.']);
             }
}
}

