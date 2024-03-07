<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('auth.admin.login');
    }
    public function login(Request $request){
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('admin.daskboard');
        }
        return back()->with('error','Invalid Email or passwords');
    }
    public function dashboard(){
        return view('admin-dashboard');
    }
    public function  logout(Request $request){
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login.index');
    }

}
