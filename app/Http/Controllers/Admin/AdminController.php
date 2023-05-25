<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Admin;

class AdminController extends Controller
{
    public function adminLoginForm()
    {
        return view('admin.login');
    }

    public function adminaDashboard()
    {
        return view('admin.home.dashboard');
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $adminEmail = Admin::where('email', $request->email)->first();
        if(!$adminEmail){
            return redirect()->back()->with('error', 'Email not match');
        }else{
            if(password_verify($request->password, $adminEmail->password)){
                session()->put('adminId', $adminEmail->id);
                session()->put('adminName', $adminEmail->name);
                return redirect('/admin/dashboard');
            }else{
                return redirect()->back()->with('error', 'password not match');
            }
        }
    }

    public function adminLogout()
    {
        session()->flush();
        return redirect('/admin/login')->with('success', 'You are logout');
    }
}
