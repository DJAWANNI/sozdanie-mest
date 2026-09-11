<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PlaceRequest extends FormRequest
{

    public function rules(): array
    {
        return [
             'name'=>'required|unique:places',
            'opisanie'=>'required',
            'image'=>'required',
        ];
    }
}
