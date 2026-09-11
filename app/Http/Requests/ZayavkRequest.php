<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ZayavkRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
            'data'=>'required',
            'pay'=>'required',
            'place'=>'required'
        ];
    }
}
