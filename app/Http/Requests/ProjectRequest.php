<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'resume' => 'nullable|max:255',
            'text' => 'required',
            'photos' => 'required|mimes:jpg,jpeg,png',
            'categories' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'O campo título é obrigatório.',
            'text.required' => 'O campo texto é obrigatório.',
            'photos.required' => 'O campo imagem é obrigatório.',
            'photos.mimes' => 'O formato da imagem deve ser jpg ou png.',
            'categories.required' => 'O campo imagem é obrigatório.',
        ];
    }
}
