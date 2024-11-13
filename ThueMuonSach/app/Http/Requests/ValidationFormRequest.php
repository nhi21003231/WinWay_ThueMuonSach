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
            'tenkhachhang' => 'required|regex:/^[^!@#$%^&*()<>?\/\{}`~\.\,:;0-9\[\]]+$/',

            'sodienthoai' => 'required|regex:/^0[1-9][0-9]{8}$/',

            'loaidon' => 'required',

            'diachi' => 'required',

            'ngaythue' => 'required|date',

            'ngaydukien' => 'required|date|after_or_equal:ngaythue',
        ];
    }

    public function messages(): array
    {
        return [

            'tenkhachhang.required' => 'Vui lòng nhập tên khách hàng',

            'tenkhachhang.regex' => 'Họ tên không chứa số và kí tự đặc biệt',

            'sodienthoai.required' => 'vui lòng nhập số điện thoại',

            'sodienthoai.regex' => 'Số điện thoại không đúng định dạng',

            'diachi.required' => 'Vui lòng nhập địa chỉ',

            'ngaydukien.required' => 'Vui lòng chọn ngày dự kiến nhận',

            'ngaydukien.after_or_equal' => 'Vui lòng chọn ngày dự kiến nhận lớn hơn ngày thuê',

            'loaidon.required' => 'Vui lòng chọn loại đơn',
        ];
    }
}
