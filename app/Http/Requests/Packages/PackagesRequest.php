<?php

namespace App\Http\Requests\Packages;

use Illuminate\Foundation\Http\FormRequest;

class PackagesRequest extends FormRequest
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
            'name' => 'required|array',
            'name.ar' => 'required|string|max:255',
            'name.en' => 'required|string|max:255',
            'name.fr' => 'required|string|max:255',
            'name.de' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|array',
            'description.ar' => 'required|string',
            'description.en' => 'required|string',
            'description.fr' => 'required|string',
            'description.de' => 'required|string',
            'features' => 'required|array|min:1', // Ensure it's an array with at least one item
            'features.*.ar' => 'required|string|max:255', // Arabic feature
            'features.*.en' => 'required|string|max:255', // English feature
            'features.*.de' => 'required|string|max:255', // German feature
            'features.*.fr' => 'required|string|max:255', // French feature
            'image' => 'nullable|image|max:5000', //
        ];
    }
}
