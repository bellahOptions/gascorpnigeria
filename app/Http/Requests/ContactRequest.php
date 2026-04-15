<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $turnstileEnabled = filled(config('services.turnstile.site_key')) && filled(config('services.turnstile.secret_key'));

        return [
            'name'                  => ['required', 'string', 'min:3', 'max:120', 'regex:/^[\p{L}\s.\-]+$/u'],
            'email'                 => ['required', 'email:rfc,dns', 'max:150'],
            'phone'                 => ['required', 'string', 'min:7', 'max:20', 'regex:/^\+?[0-9\-\s()]+$/'],
            'subject'               => ['required', 'string', 'min:5', 'max:150'],
            'message'               => ['required', 'string', 'min:20', 'max:3000'],
            'cf-turnstile-response' => [Rule::requiredIf($turnstileEnabled), 'nullable', 'string'],
            'website'               => ['nullable', 'max:0'],
            'form_started_at'       => ['required', 'integer'],
        ];
    }

    public function messages(): array
    {
        return [
            'website.max'                    => 'Spam detected.',
            'cf-turnstile-response.required' => 'Please complete the security check.',
            'name.regex'                     => 'Name may only contain letters, spaces, hyphens, and dots.',
            'phone.regex'                    => 'Please enter a valid phone number.',
        ];
    }
}
