<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Contracts\View\View;
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
    public function editIndex(Request $request)
    {
        return view('auth.admin.profile.edit',['user'=>Auth::guard('admin')->user()]);
    }
    public function registerIndex(){
        return view('auth.admin.register');
    }
    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>['required','unique:admins'],
            'password'=>['required','min:8','confirmed']
        ]);
        $admin = new Admin();
        $admin->name= $request->name;
        $admin->email= $request->email;
        $admin->password= bcrypt($request->password);

        $admin->save();
        Auth::guard('admins')->login($admin);
        return redirect()->route('admin.daskboard');
    }
}
