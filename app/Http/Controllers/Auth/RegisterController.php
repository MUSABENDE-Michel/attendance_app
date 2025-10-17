<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\StudentAuthController;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewStudentCredentials;
use Str;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    use RegistersUsers;

     public function create(){
        return view("auth.register");
    }
    public function store(Request $request){
     
            $user = User::create([
                "name"=> request('name'),
                "email"=> request('email'),
                "password"=> bcrypt(request("password")),
            ]);
            
            if($user){
                Session::flash("success","Registration successful");
                return redirect()->route("login");

            }
            else{
                Session::flash("error","registration fail");
            }



    }

}
