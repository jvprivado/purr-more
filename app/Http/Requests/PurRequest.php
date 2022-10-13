<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurRequest extends FormRequest
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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users|email',
            'phone' => 'required|unique:users',
            'pur' => 'required|max:153600',
            'cat_names' => 'required',
        ];
    }
}
