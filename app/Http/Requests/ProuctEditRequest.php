<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProuctEditRequest extends FormRequest
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
    protected function prepareForValidation()
    {
        if($this->input('slug')){
            $this->merge(['slug' => make_slug($this->input('slug'))]);
        }else{
            $this->merge(['slug' => make_slug($this->input('title'))]);
        }
    }
    public function rules()
    {
        return [
            'title' => 'required|min:10',
            'slug' => Rule::unique('products')->ignore(request()->product), //To avoid confliction in entire slug of the post!
            'categories' => 'required',
            'brand' => 'required',
            'attributes' => 'required',
            'status' => 'required',
            'price' => 'required|min:4',
            'discount_price' => 'min:2|nullable',
            'description' => 'required|min:10',
            'photo_id.*' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'لطفا برای مطلب عنوانی تعریف کنید.',
            'title.min' => 'حداقل طول عنوان مطلب 10 کاراکتر میباشد.',
            'slug.unique' => 'این نام مستعار قبلا انتخاب شده لطفا نام دیگری وارد کنید.',
            'categories.required' => 'انتخاب دسته بندی برای محصول الزامیست.',
            'brand.required' => 'انتخاب برند برای محصول الزامیست.',
            'attributes.required' => 'انتخاب ویژگیها برای محصول الزامیست.',
            'price.required' => 'تعیین قیمت برای محصول الزامیست.',
            'price.min' => 'حداقل طول قیمت 4 عدد میباشد.',
            'discount_price.min' => 'حداقل طول قیمت ویژه 4 عدد میباشد.',
            'description.required' => 'لطفا برای مطلب توضیحات تعریف کنید.',
            'description.min' => 'حداقل طول توضیحات محصول 10 کاراکتر میباشد.',
            'photo_id.*.required' => 'انتخاب تصویر برای محصول الزامیست.',
        ];
    }
}
