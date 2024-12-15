<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function formlogin(){
        if(Auth::check()){
            $user=Auth::user();
            if($user->level == 'admin'){
                return redirect('admin');
            }
            // elseif ($user->level == 'user') {
            //     return redirect('user');
            // }
        }
        return view('login');
    }

    public function daftar(){
        if(Auth::check()){
            $user=Auth::user();
            if($user->level == 'admin'){
                return redirect('admin');
            }
            // elseif ($user->level == 'user') {
            //     return redirect('user');
            // }
        }
        return view('register');
    }

    public function register(request $request){
        request()->validate(
            [
                'name'=> 'required',
                'username'=> 'required',
                'password' => 'required',
            ]
        );
        $user = new User();
        $user->name=$request->input('name');
        $user->username=$request->input('username');
        $user->password=Hash::make($request->input('password'));
        $user->level=$request->input('level');
        $user->save();
        Auth::login($user);
        return redirect('admin');
    }
    

    public function proses_login(Request $request){
        request()->validate(
            [
                'username'=> 'required',
                'password' => 'required', 
            ]
            );
            $cek= $request->only('username','password');
            if(Auth::attempt($cek)){
                $user=Auth::user();
                if($user->level == 'admin'){
                    return redirect('admin');
                }
                // elseif ($user->level == 'user') {
                //     return redirect('user');
                // }
            }
        return redirect('login')->with('error','username & password anda salah');
    }

    public function logout(){
        Auth::logout();
        return view('login');
    }
}
