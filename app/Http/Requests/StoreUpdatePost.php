<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePost extends FormRequest
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
            'title' => 'required|min:3|max:160',
            'content' => 'nullable|min:5|max:200',
            'image' => 'required|image'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Campo de título é requiredo',
            'content.required' => 'Quantidade mínima de caracteres é 5',
            'image' => 'Inclua uma imagem'
        ];
    }
}
