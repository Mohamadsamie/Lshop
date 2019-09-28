<?php

namespace App\Http\Controllers\Backend;

use App\Admin;
use App\Http\Requests\AdminUserEditRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Admin::with('roles')->get()->all(); //EAGER LOADING (How to access other relations through Eloquent)
//        dd($users);
        return  view('admin.users.index', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
//        dd($user);
        return view('admin.users.create', compact(['roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make( $request->all(), [

            'name'          => 'required|max:25|persian_alpha',
            'last_name'     => 'required|max:25|persian_alpha',
            'email'         => 'required|email|unique:users',
            'phone'         => 'iran_mobile',
            'national_code' => 'melli_code|unique:users',
            'birthday'      => 'required',
            'gender'      => 'required',
            'roles'      => 'required',
            'status'      => 'required',
            'password'      => 'min:6|required_with:password_confirmed|same:password_confirmed|regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9]).*$/',
        ],[
            'name.max'                  => 'حداکثر طول نام 25 کاراکتر میباشد.',
            'name.required'                  => 'لطفا نام خود را وارد کنید.',
            'last_name.required'                  => 'لطفا نام خانوادگی خود را وارد کنید.',
            'last_name.max'                  => 'حداکثر طول نام خانوادگی 25 کاراکتر میباشد.',
            'email.email'               => 'ایمیل وارد شده معتبر نیست.',
            'email.required'               => 'لطفا ایمیل خود را وارد نمایید.',
            'email.unique'               => 'این ایمیل قبلا ثبت شده است.',
            'national_code.unique'               => 'این کد ملی قبلا ثبت شده است.',
            'birthday.required'               => 'لطفا تاریخ تولد را وارد نمایید.',
            'gender.required'               => 'لطفا جنسیت را تعیین نمایید.',
            'roles.required'               => 'انتخاب نقش کاربر الزامیست.',
            'status.required'               => 'انتخاب وضعیت کاربر الزامیست.',
            'password.min'               => 'حداقل طول رمز 6 کاراکتر میباشد.',
            'password.same'               => 'رمز انتخاب شده مطابقت ندارد.',
            'password.regex'               => 'رمز انتخابی باید شامل حروف بزرگ و کوچک و حداقل یک عدد باشد.',

        ]);
        if($validator->fails()){
            return redirect('/administrator/users/create')->withErrors($validator)->withInput();
        }else {
            $user = new Admin();
            $user->name = $request->input('name');
            $user->last_name = $request->input('last_name');
            $user->national_code = $request->input('national_code');
            $user->phone = $request->input('phone');
            $user->email = $request->input('email');
            $user->birthday = $request->input('birthday');
            $user->gender = $request->input('gender');
            $user->status = $request->input('status');
            $user->password = Hash::make($request->input('password'));
//            return $user;
            $user->save();

            $user->roles()->attach($request->input('roles'));
            Session::flash('success', 'ثبت نام شما با موفقیت انجام شد.');
            return redirect('/administrator/users');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Admin::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.edit', compact(['user', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUserEditRequest $request, $id)
    {
        $user = Admin::findOrFail($id);
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->national_code = $request->input('national_code');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->birthday = $request->input('birthday');
        $user->gender = $request->input('gender');
        $user->status = $request->input('status');
        if (trim($request->input('password') != "")){
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();
        $user->roles()->sync($request->input('roles'));
        Session::flash('update_user', 'اطلاعات کاربر با موفقیت بروزرسانی شد.');
        return redirect('/administrator/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Session::flash('delete_user', 'کاربر با موفقیت حذف شد.');
        return redirect('/administrator/users');
    }
}
