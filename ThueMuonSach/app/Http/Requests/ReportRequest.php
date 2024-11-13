<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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

            'startdate'=>['nullable',function($attribute, $value, $fail){

                if($value && $this->enddate && $value > $this->enddate){

                    $fail('Ngày bắt đầu phải nhỏ hơn ngày kết thúc');

                }
            }],
            'enddate'=>'nullable'
            //
        ];
    }

    public function messages()
    {
        return [

            // 'startdate.date' => 'ngày bắt đầu không hợp lệ',
            // 'ennddate.date' => 'ngày kết thúc không hợp lệ',

            // 'startdate.before_or_equal' => 'Ngày bắt đầu phải nhỏ hơn ngày kết thúc',
            // 'ennddate.after_or_equal' => 'Ngày kết thúc phải lớn hơn ngày hiện tại'
        ];
    }
}
