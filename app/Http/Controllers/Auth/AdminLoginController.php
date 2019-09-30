<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
//        return redirect()->route('administrator');
        $national_code = $request->input('national_code');
        $password = $request->input('password');
        $user = Admin::where('national_code', '=', $national_code)->first();
//        if (!$user || !Hash::check($password, $user->password)) {
//            Session::flash('error-login', 'کد ملی یا رمز عبور به درستی وارد نشده است!');
//            return redirect()->intended(route('admin.login'));
//        }
        if ($user->status == 1){
            if (Auth::guard('admin')->attempt(['national_code' => $national_code , 'password' => $password]) && Hash::check($password, $user->password)) {
                // Authentication passed...
//            Session::flash('success-login',  'خوش آمدید ' . $user->name . ' عزیز');
                return redirect()->intended(route('administrator'));

            }
            Session::flash('error-login', 'کد ملی یا رمز عبور به درستی وارد نشده است!');
            return redirect()->back();
        }
        return redirect()->route('home');

    }
}
