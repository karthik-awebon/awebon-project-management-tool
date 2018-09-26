<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'project_name' => 'required',
            'project_price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'project_name.required' => 'A project name is not required',
            'project_price.required'  => 'A Project Price is not required',
        ];
    }
}
