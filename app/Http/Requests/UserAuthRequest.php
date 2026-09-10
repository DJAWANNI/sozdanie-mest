<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserAuthRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'login'=>'required',
            'password'=>'required',
        ];
    }
}
