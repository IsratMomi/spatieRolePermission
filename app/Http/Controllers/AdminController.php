<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('backend.pages.auth.login');
    }

    public function login(Request $request){
        // dd($request);
        $request->validate([
            'email' =>'required|email|max:50',
            'password' => 'required',
        ]);

        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password'],'is_admin' => 1])){
            return redirect()->route('admin.dashboard')->with('success','Admin login successfull');
        }
        else{
            return back()->with('error','Invalid Credentials');
        }
    }

    public function logoutAdmin(){

        Auth::guard('admin')->logout();
        return redirect()->route('login.page')->with('success','Logout successfully!!');
    }
}
