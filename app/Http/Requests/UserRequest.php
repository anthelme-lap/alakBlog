<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users',
            'password' => ['required', Password::min(8)
                            ->mixedCase()
                            ->letters()
                            ->numbers()
                            ->uncompromised()
                            ->symbols()
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Veuillez entrer un nom s\'il vous plait.',
            'name.min' => 'Veuillez entrer au moins 2 lettres.',
            'email.required' => 'Veuillez entrer une adresse e-mail s\'il vous plait.',
            'email.unique' => 'Ce adresse e-mail est déjà utilisé.',
            'email.email' => 'Veuillez entrer une adresse e-mail valide s\'il vous plait.',
            'password.required' => 'Veuillez entrer un mot de passe s\'il vous plait.'
        ];
    }
}
