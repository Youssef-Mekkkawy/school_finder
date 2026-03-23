<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSchoolRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'       => 'required|string|max:255|unique:schools,name',
            'type_id'    => 'required|exists:school_types,id',
            'email'      => 'required|email',
            'phone'      => 'required|string',
            'fee_min'    => 'required|numeric|min:0',
            'fee_max'    => 'required|numeric|min:0',
            'age_min'    => 'required|integer|between:1,25',
            'age_max'    => 'required|integer|between:1,25',
            'curricula'  => 'required|array|min:1',
            'curricula.*'=> 'integer|exists:curricula,id',
        ];
    }
}
