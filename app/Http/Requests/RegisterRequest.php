<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstname' => ['required'],
            'lastname'  => ['required'],
            'melicode'  => ['required', 'digits:10', 'numeric', 'unique:users,national_name'],
            'phone'  => ['required', 'digits:11', 'numeric', 'unique:users,mobile'],
            'image'  => ['required', 'max:2048', 'dimensions:min_width=250, max_width=350, max_height=450, min_height=350', 'image', 'mimes:jpeg,jpg,png'],
            'grade'  => ['required', 'exists:grades,id'],
            'major'  => ['required', 'exists:majors,id'],
            'orientation'  => ['required', 'exists:orientations,id'],
            'email'  => ['required', 'email:rfc,dns'],
        ];
    }

    public function messages()
    {
        return [
            // name and last name
            'firstname' => 'نام خود را به فارسی وارد کنید.',
            'lastname'  => 'نام خوانوادگی خود را به فارسی وارد کنید.',
            // national_name
            'melicode.required' => 'شماره ملی خود را به درستی وارد کنید.',
            'melicode.digits' => 'شماره ملی ده رقمی وارد کنید.',
            'melicode.numeric' => 'شماره ملی را صحیح وارد کنید.',
            'melicode.unique' => 'این شماره ملی قبلا استفاده شده است.',
            // phone
            'phone.required' => 'شماره موبایل معتبر وارد کنید.',
            'phone.digits' => 'شماره موبایل معتبر وارد کنید.',
            'phone.numeric' => 'شماره موبایل صحیح نیست.',
            'phone.unique' => 'این شماره موبایل قبلا استفده شده است.',
            // avatar
            'image.required' => 'یک تصویر انتخاب کنید.',
            'image.dimensions' => 'سایز عکس باید 3*4 باشد.',
            'image.mimes' => 'فرمت عکس یکی از اینها باشد: jpg,jpeg,png',
            // grade
            'grade.required' => 'مقطع تحصیلی خود را وارد کنید.',
            'grade.exists'  => ':// برو پی کارت.',
            //
            'major.exists'  => ':// برو پی کارت.',
            'major.required'  => 'رشته تحصیلی خود را وارد کنید.',
            // orientation
            'orientation.exists'  => ':)))) برو پی کارت.',
            'orientation.required'  => 'گرایش تحصیلی خود را وارد کنید.',
            // email
            'email.exists'  => 'این ایمیل قبلا استفاده شده است.',
            'email.required'  => 'ایمیل خود را وارد کنید.',
            'email.email'  => 'ایمیل معتبر وارد کنید.',
        ];
    }
}
