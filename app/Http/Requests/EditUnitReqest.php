<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUnitReqest extends FormRequest
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
            'title' => ['required', 'unique:units,title'],
            'orientation' => ['required', 'exists:orientations,id'],
            'numUnit' => ['required', 'digits:1', 'numeric'],
            'group' => ['required', 'numeric'],
            'number' => ['required', 'digits:7', 'numeric']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'عنوان درس نمیتواند خالی باشد.',
            'title.unique' => 'عنوان درس تکراری است.',
            'orientation.required' => 'رشته مربوط به درس را وارد کنید.',
            'orientation.exists' => 'رشته نامعتبر است.',
            'numUnit.required' => 'تعداد واحد درس نباید خالی باشد',
            'numUnit.numeric' => 'تعدا واحد یک مقدار عددی باشد.',
            'numUnit.digits' => 'مقدار تعداد واحد باید یک رقمی باشد.',
            'group.numeric' => 'برای گروه یک مقدار عددی باشد.',
            'group.required' => 'شماره گروه نباید خالی باشد.',
            'number.required' => 'شماره درس را وارد کنید.',
            'number.numeric' => 'یک مقدار عددی برای شماره درس وارد کنید.',
            'number.digits' => 'مقدار شماره درس 7 رقمی باشد.',
        ];
    }
}
