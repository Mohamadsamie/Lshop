<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminUserEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'national_code' => [Rule::unique('users')->ignore(request()->user),'melli_code'], //To avoid confliction in entire national_code of the user!
            'name'          => 'required|max:25|persian_alpha',
            'last_name'     => 'required|max:25|persian_alpha',
            'email' => [Rule::unique('users')->ignore(request()->user),'email'],
            'phone'         => 'iran_mobile',
            'roles'      => 'required',
            'status'      => 'required',
            'password'      => 'nullable|min:6|same:password_confirmed|regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9]).*$/',

        ];
    }

    public function messages()
    {
        return [
            'national_code.unique' => 'این کد ملی قبلا ثبت شده است.',
            'name.max' => 'حداکثر طول نام 25 کاراکتر میباشد.',
            'name.required' => 'لطفا نام خود را وارد کنید.',
            'last_name.required' => 'لطفا نام خانوادگی خود را وارد کنید.',
            'last_name.max' => 'حداکثر طول نام خانوادگی 25 کاراکتر میباشد.',
            'email.email' => 'ایمیل وارد شده معتبر نیست.',
            'email.required' => 'لطفا ایمیل خود را وارد نمایید.',
            'email.unique' => 'این ایمیل قبلا ثبت شده است.',
//            'national_code.unique'               => 'این کد ملی قبلا ثبت شده است.',
            'birthday.required' => 'لطفا تاریخ تولد را وارد نمایید.',
            'gender.required' => 'لطفا جنسیت را تعیین نمایید.',
            'roles.required' => 'انتخاب نقش کاربر الزامیست.',
            'status.required' => 'انتخاب وضعیت کاربر الزامیست.',
            'password.min' => 'حداقل طول رمز 6 کاراکتر میباشد.',
            'password.same' => 'رمز انتخاب شده مطابقت ندارد.',
            'password.regex' => 'رمز انتخابی باید شامل حروف بزرگ و کوچک و حداقل یک عدد باشد.',

        ];
    }
}
