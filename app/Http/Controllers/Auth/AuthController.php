<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function register(){
        return view("auth.register");
    }

    public function store(Request $request){
        $data = $request->validate([
            "name"=> "",
            "username"=> ["required","max:12"],
            "email"=> ["required","email",Rule::unique('users','email')],
            "password"=> ["required","confirmed","min:6"],
        ]);
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        auth()->login($user);
        return redirect()->route('dashboard')->with('message','User registered and logged in');
    }
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index')->with('message','Log out successful. Goodbye');
    }
    public function login(){
        return view('auth.login');
    }
    public function validate(Request $request){
        $data = $request->validate([
            'email' => ['required','email'],
            'password' => 'required',
        ]);
        if(auth()->attempt($data,true)){
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('message','Login successful. Welcome');
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
