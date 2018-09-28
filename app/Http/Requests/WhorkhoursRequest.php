<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WhorkhoursRequest extends FormRequest
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
            'date' => 'required',
            'no_of_hours' => 'required',
            'hourly_rate' => 'required',
            'project_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'date.required' => 'A date is not required',
            'no_of_hours.required'  => 'A number of hours is not required',
            'hourly_rate.required' => 'A hourly rate is not required',
            'project_id.required'  => 'A project id is not required',
        ];
    }
}
