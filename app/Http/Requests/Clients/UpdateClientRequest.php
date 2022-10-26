<?php

namespace App\Http\Requests\Clients;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'sometimes|required|min:3',
            'last_name' => 'sometimes|required|min:3',
            'email' => 'sometimes|required|email|unique:clients,email',
            'dob'   => 'sometimes|required',
            'nationality' => 'sometimes|required',
            'home_phone' => 'sometimes|required',
            'cell_phone' => 'sometimes|required',
            'work_phone' => 'sometimes|required',
            'address1' => 'sometimes|required',
            'address2' => 'sometimes|required',
            'city' => 'sometimes|required',
            'state' => 'sometimes|required',
            'residence_country' => 'sometimes|required',
            'zip' => 'sometimes|required',
            'gender' => 'sometimes|required',
            'sexuality' => 'sometimes|required',
        ];
    }
}
