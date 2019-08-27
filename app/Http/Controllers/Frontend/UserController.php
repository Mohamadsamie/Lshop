<?php

namespace App\Http\Controllers\Frontend;

use App\Address;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{


    public function register(Request $request)
    {
        $validator = Validator::make( $request->all(), [

            'name'          => 'required|max:25|persian_alpha',
            'last_name'     => 'required|max:25|persian_alpha',
            'email'         => 'required|email|unique:users',
            'phone'         => 'iran_mobile',
            'national_code' => 'melli_code|unique:users',
            'birthday'      => 'required',
            'gender'      => 'required',
            'address'       => 'address',
            'post_code'     => 'iran_postal_code',
            'province_id'   => 'numeric',
            'password'      => 'min:6|required_with:password_confirmed|same:password_confirmed|regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9]).*$/',
        ],[
            'name.max'                  => 'حداکثر طول نام 25 کاراکتر میباشد.',
            'name.required'                  => 'لطفا نام خود را وارد کنید.',
            'last_name.required'                  => 'لطفا نام خانوادگی خود را وارد کنید.',
            'last_name.max'                  => 'حداکثر طول نام خانوادگی 25 کاراکتر میباشد.',
            'province_id.numeric'               => 'لطفا استان مورد نظر را انتخاب کنید.',
            'email.email'               => 'ایمیل وارد شده معتبر نیست.',
            'email.required'               => 'لطفا ایمیل خود را وارد نمایید.',
            'email.unique'               => 'این ایمیل قبلا ثبت شده است.',
            'national_code.unique'               => 'این کد ملی قبلا ثبت شده است.',
            'birthday.required'               => 'لطفا تاریخ تولد را وارد نمایید.',
            'gender.required'               => 'لطفا جنسیت را تعیین نمایید.',
            'password.min'               => 'حداقل طول رمز 6 کاراکتر میباشد.',
            'password.same'               => 'رمز انتخاب شده مطابقت ندارد.',
            'password.regex'               => 'رمز انتخابی باید شامل حروف بزرگ و کوچک و حداقل یک عدد باشد.',

        ]);
        if($validator->fails()){
            return redirect('/register')->withErrors($validator)->withInput();
        }else {
            $user = new User();
            $user->name = $request->input('name');
            $user->last_name = $request->input('last_name');
            $user->national_code = $request->input('national_code');
            $user->phone = $request->input('phone');
            $user->email = $request->input('email');
            $user->birthday = $request->input('birthday');
            $user->gender = $request->input('gender');
            $user->password = Hash::make($request->input('password'));
            $user->save();

            $address = new Address();
            $address->address = $request->input('address');
            $address->company = $request->input('company');
            $address->province_id = $request->input('province_id');
            $address->city_id = $request->input('city_id');
            $address->post_code = $request->input('post_code');
            $address->user_id = $user->id;

            $address->save();

            Session::flash('success', 'ثبت نام شما با موفقیت انجام شد.');
            return redirect('/login');
        }
    }



}