<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewRegister extends FormRequest
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
            //
            'username' => 'required|max:12|min:2',
            'mail' => 'required|email|max:40|min:5|unique:users',
            'password' => 'required|min:8|max:20|',
            'password-confirm' => 'required|same:password'
        ];
    }
}
