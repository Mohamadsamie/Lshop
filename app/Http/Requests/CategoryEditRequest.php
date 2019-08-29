<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function prepareForValidation()
    {
        if($this->input('slug')){
            $this->merge(['slug' => make_slug($this->input('slug'))]);
        }else{
            $this->merge(['slug' => make_slug($this->input('name'))]);
        }
    }
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
            'name' => 'required',
            'slug' => Rule::unique('categories')->ignore(request()->category), //To avoid confliction in entire slug of the post!

        ];
    }

    public function messages()
    {
        return [
            'name.required' => '.نام دسته نمیتواند خالی باشد',
            'slug.unique' => 'نام مستعار قبلا انتخاب شده',
        ];
    }
}
