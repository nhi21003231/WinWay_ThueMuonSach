<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationFormUpdateKH extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'tenkh' => 'required|regex:/^[^!@#$%^&*()<>?\/\{}`~\.\,:;0-9\[\]]+$/',

            'sdtkh' => 'required|regex:/^0[1-9][0-9]{8}$/',

            'email' => 'required|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',

            'diachi' => 'required'
            //
        ];
    }

    public function messages(): array
    {
        return [
            'tenkh.required' => 'Vui lòng nhập tên khách hàng',

            'tenkh.regex' => 'Họ tên khách hàng không chứa kí tự đặc biệt và số',

            'sdtkh.required' => 'Vui lòng nhập số điện thoại khách hàng',

            'sdtkh.regex' => 'Số điện thoại không đúng định dạng',

            'email.required' => 'Vui lòng nhập email khách hàng',

            'email.regex' => 'Email không đúng định dạng',

            'diachi.required' => 'Vui lòng nhập địa chỉ khách hàng',
        ];
    }
}
