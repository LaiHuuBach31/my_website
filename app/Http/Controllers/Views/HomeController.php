<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Mail\VerifyAccount;
use App\Mail\VerifyAcount;
use App\Models\Customer;
use App\Models\PasswordReset;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use Mail;

class HomeController extends Controller
{
    public function index()
    {
        $topSellProducts = Product::inRandomOrder()->limit(10)->get();
        $trendingProducts = Product::inRandomOrder()->limit(10)->get();
        $newProducts = Product::inRandomOrder()->limit(10)->get();

        return view('customer.home', compact('topSellProducts', 'trendingProducts', 'newProducts'));
    }

    public function verifyAccount($token)
    {
        $info = PasswordReset::where('token', $token)->firstOrFail();
        // $account =  Customer::where('email', $info->email)->firstOrFail();
        
        $check = Customer::where('email', $info->email)->update([
            "email_verified_at" => date('Y-m-d H:i:s')  
        ]);

        if($check){

            PasswordReset::where('token', $token)->delete();

            return redirect()->route('index.login')->with('yes', 'Account activation successful, You can login');
        }

        return redirect()->route('index.home')->with('no', 'Account activation failed, please try again');
    }

    public function register()
    {
        return view('customer.register');
    }

    public function checkRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required|min:10',
            'password' => 'required|min:6',
        ]);

        $form_data = $request->only('name', 'email', 'phone', 'address');
        $form_data['password'] = bcrypt($request->password);

        if (Customer::create($form_data)) {

            $token = Str::random(50);

            PasswordReset::create([
                "email" => $request->email,
                "token" => $token,
            ]);

            Mail::to($request->email)->send(new VerifyAccount($request->name, $token));

            return redirect()->route('index.login')->with('yes', 'Please Verify Your Account To Log In');
        }
        return redirect()->back()->with('no', 'Registration Failed, please try again');
    }

    public function login()
    {
        return view('customer.login');
    }

    public function checkLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);
        $form_data = $request->only('email', 'password');

        $check = Auth::guard('cus')->attempt($form_data);

        if ($check) {
            if(Auth::guard('cus')->user()->email_verified_at != null){
                return redirect()->route('index.home')->with('yes', 'Welcome To Back');
            }
            return redirect()->back()->with('no', 'You have not activated your account, please check your email to activate');
        }

        return redirect()->back()->with('no', 'Incorrect Account or Password');
    }

    public function logout()
    {
        Auth::guard('cus')->logout();
        return redirect()->route('index.login')->with('yes', 'Sign Out Successful');
    }

    public function profile()
    {
        # code...
    }
}
