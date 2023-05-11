<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Password\UpdateRequest as PasswordUpdateRequest;
use App\Http\Requests\Profile\UpdateRequest;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function check_login(Request $request)
    {
        $form_data = $request->only('email', 'password');
        $check = Auth::attempt($form_data, $request->has('remember'));


        if($check) {
            return redirect()->route('admin.index')->with('yes', 'Logged in successfully');
        }

        return redirect()->back()->with('no', 'Login unsuccessful');

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('yes', 'Logout successful, please login again');
    }

    public function profile()
    {
        $auth = Auth::user();
        return view('admin.profile', compact('auth'));
    }

    public function updateProfile(Request $request, UpdateRequest $req)
    {
       
        $auth = Auth::user();
        $form_data = $request->only('name', 'email');
        if($auth->update($form_data)){
            return redirect()->back()->with('yes', 'Update profile successful');
        }
        return redirect()->back()->with('no', 'Update profile failed');
    }

    public function changePassword()
    {
       return view('admin.changePassword');
    }

    public function updatePassword(Request $request, PasswordUpdateRequest $req)
    {
     
        $auth = Auth::user();
        $form_data = [
            "password" => bcrypt($request->new_password)
        ];

        if($auth->update($form_data)){
            Auth::logout();
            return redirect()->route('admin.login')->with('yes', 'Password update successful, please login again');
        }
        return redirect()->back()->with('no', 'Update password failed');
    }
}
