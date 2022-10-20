<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name' => 'required|max:100',
            'document' => 'required|max:20',
            'address' => 'required|max:100',
            'number' => 'required|max:10',
            'complement' => 'required|max:100',
            'zipcode' => 'required|max:10',
            'city' => 'required|max:50',
            'email' => 'required|email|max:100',
            'birth' => 'required',
            'district' => 'required|max:100'
        ];
    }
}
