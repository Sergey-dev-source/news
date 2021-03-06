<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'en_name' => 'required|min:2',
            'ru_name' => 'required|min:2',
            'arm_name' => 'required|min:2',
            'ru_title' => 'required|min:2',
            'en_title' => 'required|min:2',
            'arm_title' => 'required|min:2',
        ];
    }
}
