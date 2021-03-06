<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AdminLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:admin',['except'=>['logout']]);
    }
    public function showLoginForm()
    {
      return view('auth.admin-login');
    }
    public function login(Request $request)
    {
      //1.validacia
      $this->validate($request,[
        'email'=>'required|email',
        'password'=>'required|min:6'
      ]);
      //damtxveva monacemebis
      if (Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)) {
        //tu daemtxvaa
        return redirect()->intended(route('admin'));
      }else {
        return redirect()->back()->withinput($request->only('email','remember'));
      }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
