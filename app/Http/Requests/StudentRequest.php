<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    public function attributes()
    {
        /**
         * Get custom attributes for validator errors.
         *
         * @return array
         */
        return [
            'name' => 'name',
            'birth_at' => 'date of birth',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'birth_at' => 'required',
        ];
    }
}
