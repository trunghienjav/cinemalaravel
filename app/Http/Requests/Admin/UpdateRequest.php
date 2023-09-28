<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string'
            ],
            'status_id' => [
                'required',
            ],
            'subtitle_id' => [
                'required',
            ],
            'start_date' => [
                'required',
            ],
            'end_date' => [
                'required',
            ],
            'duration' => [
                'required',
            ],
            'national' => [
                'required',
            ],
            'description' => [
                'required',
            ],
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute bắt buộc phải điền',
            'string' => ':attribute phải điền bằng kí tự'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Họ và tên',
            'status_id' => 'Tình trạng',
            'subtitle_id' => 'Dạng phim',
            'start_date' => 'Ngày bắt đầu',
            'end_date' => 'Ngày kết thúc',
            'duration' => 'Thời lượng',
            'national' => 'Quốc gia',
            'description' => 'Mô tả',
        ];
    }
}
