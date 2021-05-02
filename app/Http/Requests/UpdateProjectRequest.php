<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'photos' => 'nullable',
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
            'resume.max' => 'O campo resumo deve ter no máximo :max caracteres.',
            'photos.mimes' => 'O formato da imagem deve ser jpg ou png.',
            'categories.required' => 'O campo imagem é obrigatório.',
        ];
    }
}
