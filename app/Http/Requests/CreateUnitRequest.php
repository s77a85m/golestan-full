<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUnitRequest extends FormRequest
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
            'number' => ['required', 'digits:7', 'numeric', 'unique:units,unit_num']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'عنوان درس نمیتواند خالی باشد.',
            'title.unique' => 'این عنوان قبلا استفاده شده است.',
            'orientation.required' => 'رشته درس را مشخص کنید.',
            'orientation.exists' => 'رشته درس را مشخص کنید.',
            'numUnit.required' => 'اندازه واحد درس نمیتواند خالی باشد.',
            'numUnit.numeric' => 'مقدار عددی برای اندازه واحد درس وارد کنید.',
            'numUnit.digits' => 'یک عدد یک رقمی برای اندازه تعداد واحد درس انتخاب کنید.',
            'group.required' => 'گروه درس نیمتواند خالی باشد.',
            'group.numeric' => 'مقدار عددی برای گروه درس انتخاب کنید.',
            'number.required' => 'شماره درس نمیتواند خالی باشد.',
            'number.numeric' => 'مقدار عددی برای شماره درس وارد کنید.',
            'number.unique' => 'این شماره قبلا انتخاب شده است.',
            'number.digits' => 'مقدار شماره درس باید 7 رقمی باشد.',
        ];
    }
}
