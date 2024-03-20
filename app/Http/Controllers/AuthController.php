<?php

namespace App\Http\Controllers;

// Illuminate
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Request
use App\Http\Requests\AuthRequest;



class AuthController extends Controller
{
    public function index(){
        return view('pages.login');
    }

    public function login(AuthRequest $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // cek user berdasarkan data request
        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        return back()->with('error','Incorrect email or password');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
