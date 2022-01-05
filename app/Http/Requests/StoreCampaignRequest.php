<?php

namespace App\Http\Requests;

use App\Rules\CheckValidEmails;
use Illuminate\Foundation\Http\FormRequest;

class StoreCampaignRequest extends FormRequest
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
            'template_id'       =>  ['required','exists:templates,id'],
            'date'              =>  ['required','date','after:today'],
            'times'             =>  ['required','numeric','min:1'],
            'emails'            =>  ['required', new CheckValidEmails]
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'template_id.required' => 'Template field is required',
        ];
    }
}
