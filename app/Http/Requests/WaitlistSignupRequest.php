<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WaitlistSignupRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $emailRule = app()->runningUnitTests() ? 'email:rfc' : 'email:rfc,dns';

        return [
            'name' => ['required', 'string', 'min:2', 'max:120'],
            'email' => ['required', $emailRule, 'max:150'],
            'role' => ['required', Rule::in(['customer', 'driver', 'investor', 'admin'])],
        ];
    }

    public function messages(): array
    {
        return [
            'role.in' => 'Please select a valid role.',
        ];
    }
}
