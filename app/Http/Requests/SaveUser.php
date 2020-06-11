<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SaveUser extends FormRequest
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
        $user_id = Auth::user()->id;
        return [
            'identification' => 'required|digits_between:10,10|unique:users,identification,'.$user_id,
            'name' => 'required',
            'lastname' => 'required',
            'cellphone' => 'required|digits_between:10,10',
            'address' => 'required',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|unique:users,email,'.$user_id,
        ];
    }
}
