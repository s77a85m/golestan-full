<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => ['required', 'numeric'],
            'password' => ['required', 'min:8'],
            'captcha'  => ['required', 'captcha']
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'نام کاربری را وارد کنید.',
            'username.numeric' => 'نام کاربری معتبر وارد کنید.',
            'password.required' => 'رمز عبور خود را وارد کنید.',
            'password.min' => 'رمز عبور معتبر وارد کنید.',
            'captcha' => 'ثابت کنید که رباط نیستید!'
        ];
    }
}
