<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreatePlayerRequest extends Request
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
            'first_name' => 'required',
            'last_name'  => 'required',
            'rego_start' => 'required|date|before:rego_end',
            'rego_end' => 'required|date|after:rego_start',
            'email' => 'required|email|unique:players,email',
            'team' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First name field cannot be blank.',
            'last_name.required' => 'Last name field cannot be blank.',
            'rego_start.before' => 'Rego start date field must be before the Rego end date.',
            'rego_start.required' => 'Rego start date field is required.',
            'rego_start.date' => 'Rego start date field must be a date format.',
            'rego_end.required' => 'Rego end date field is required.',
            'rego_end.date' => 'Rego start date field must be a date format.',
            'rego_end.after' => 'Rego end date field must be after the Rego start date.',
            'team.required' => 'A team must be selected.'
        ];
    }
}
