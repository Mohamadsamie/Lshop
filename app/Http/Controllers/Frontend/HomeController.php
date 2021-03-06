<?php

namespace App\Http\Controllers\Frontend;

use App\Banner;
use App\Brand;
use App\Category;
use App\Product;
use App\Slide;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::with('photo')->orderBy('created_at', 'desc')->limit(10)->get();
        $slides = Slide::with('photo')->orderBy('created_at', 'desc')->limit(5)->get();
        $latestProduct = Product::orderBy('created_at', 'desc')->limit(10)->get();
        $discountedProduct = Product::orderBy('created_at', 'desc')->limit(10)->get();
        $banners = Banner::with('photo')->orderBy('created_at', 'desc')->limit(6)->get();
//        $categories = Category::with('childrenRecursive')->where('parent_id' , null)->get();
        return view('frontend.home.index', compact([
            'latestProduct',
            'banners',
            'slides',
            'discountedProduct',
            'brands',
            ]));

    }
    //    ---------------------------------------------------
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */

    public function authenticateUser(Request $request)
    {
        $national_code = $request->input('national_code');
        $password = $request->input('password');
        $user = User::where('national_code', '=', $national_code)->first();
        if (!$user || !Hash::check($password, $user->password)) {
            Session::flash('error-login', 'کد ملی یا رمز عبور به درستی وارد نشده است!');
            return redirect()->intended('/login');
        }

        if (Auth::attempt(['national_code' => $national_code , 'password' => $password]) && Hash::check($password, $user->password)) {
            // Authentication passed...
            Session::flash('success-login',  'خوش آمدید ' . $user->name . ' عزیز');
            return redirect()->intended(route('user.profile'));

        }
    }
//    ---------------------------------------------------
}
