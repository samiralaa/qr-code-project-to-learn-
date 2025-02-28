<?php

namespace App\Http\Requests\Vcard;

use Illuminate\Foundation\Http\FormRequest;

class VcardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'company' => 'nullable|string|max:255',
            'address1' => 'nullable|string|max:255',
            'address2' => 'nullable|string|max:255',
            'social_links' => 'nullable|array',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
