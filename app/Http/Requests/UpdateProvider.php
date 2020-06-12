<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProvider extends FormRequest
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
        $provider = $this->route('provider');
        return [
            'ruc' => 'required|digits_between:13,13|unique:providers,ruc,'.$provider->id,
            'user_name' => 'required',
            'user_lastname' => 'required',
            'user_cellphone' => 'required|digits_between:10,10',
            'user_address' => 'required',
            'user_date_of_birth' => 'required|date',
            'user_email' => 'required|email|unique:providers,email,'.$provider->id
        ];
    }
}
