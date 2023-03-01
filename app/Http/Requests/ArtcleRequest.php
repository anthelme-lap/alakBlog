<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtcleRequest extends FormRequest
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
            'titre' => 'required',
            'image' => 'required',
            'description' => 'required',
            
            
        ];
    }

    public function messages()
    {
        return [
            'titre.required' => 'Veuillez entrer un titre s\'il vous plait.',
            'description.required' => 'Veuillez entrer une description s\'il vous plait.',
            'image.required' => 'Veuillez entrer une image s\'il vous plait.',
           
        ];
    }
}
