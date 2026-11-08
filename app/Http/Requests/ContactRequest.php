<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:180'],
            'service' => ['nullable', 'string', 'max:100'],
            'message' => ['required', 'string', 'min:10', 'max:3000'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Veuillez renseigner votre nom complet.',
            'name.min' => 'Votre nom doit comporter au moins 2 caractères.',
            'email.required' => 'Veuillez saisir une adresse email valide.',
            'email.email' => 'Le format de l\'adresse email est invalide.',
            'message.required' => 'Veuillez décrire brièvement votre besoin ou projet.',
            'message.min' => 'Votre message doit contenir au moins 10 caractères.',
        ];
    }
}
