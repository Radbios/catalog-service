<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:500',
            'image_url' => 'nullable|url|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome do produto é obrigatório.',
            'name.string' => 'O nome do produto deve ser uma string.',
            'name.max' => 'O nome do produto não pode exceder 255 caracteres.',
            
            'price.required' => 'O preço do produto é obrigatório.',
            'price.numeric' => 'O preço do produto deve ser um número válido.',
            'price.min' => 'O preço do produto não pode ser menor que zero.',
            
            'description.string' => 'A descrição do produto deve ser uma string.',
            'description.max' => 'A descrição do produto não pode exceder 500 caracteres.',
            
            'image_url.url' => 'A URL da imagem deve ser uma URL válida.',
            'image_url.max' => 'A URL da imagem não pode exceder 255 caracteres.',
        ];
    }
}
