<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'school_id'      => 'required|exists:schools,id',
            'preferred_date' => 'required|date|after:today',
            'message'        => 'nullable|string|max:500',
        ];
    }
}
