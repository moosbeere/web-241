<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signout(){
        return view('auth.signout');
    }
    public function registr(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'email|required|unique:App\Models\User',
            'password'=>'required|min:6'
        ]);
        $user = User::create([
            'name'=>request('name'),
            'email'=>request('email'),
            'password'=>Hash::make(request('password'))
        ]);
        $user->createToken('myToken');
        // return response()->json($user);
        return redirect()->route('/');
    }
    public function signin(){
        return view('auth.signin');
    }
    public function auth(Request $request){
        $credentials = $request->validate([
            'email'=>'required',
            'password'=>'required|min:6'
        ]);
        if (Auth::attempt($credentials, $request->remember)){
            $request->session()->regenerate();
            $request->user()->createToken('myToken')->plainTextToken;
            return redirect()->intended('/');
        }
        return back()->withError([
            'email'=>'Предоставленные учетные данные не соотвествуют нашим записям'
        ])->inputOnly('email');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->user()->tokens()->delete();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
