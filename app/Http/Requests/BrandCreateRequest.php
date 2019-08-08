<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandCreateRequest extends FormRequest
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
            'title' => 'required|unique:brands',
            'description' => 'required',
            'photo_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'عنوان برند شما باید درج شود',
            'title.unique' => 'این برند قبلا ثبت شده است',
            'description.required' => 'توضیحات خود را وارد کنید',
            'photo_id.required' => 'تصویر برند الزامیست'
        ];
    }
}
