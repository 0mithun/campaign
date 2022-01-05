<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailSettingRequest extends FormRequest
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
            'mail_host'         =>  ['required'],
            'mail_port'         =>  ['required','numeric'],
            'mail_username'     =>  ['required'],
            'mail_password'     =>  ['required'],
            'mail_encryption'   =>  ['required'],
        ];
    }
}
