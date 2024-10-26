<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationFormRequest extends FormRequest
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
            //
            'tenkhachhang'=>'required',

            'loaidon' => 'required'
        ];
    }

    public function messages(): array
    {
        return [

            'tenkhachhang.required' => 'Vui lòng nhập tên khách hàng',
            
            'loaidon.required' => 'Vui lòng chọn loại đơn'
        ];
    }
}
