<?php

namespace App\Http\Requests\Image;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormRequest extends FormRequest
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
            'filename' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'filename.required' => 'Você não adicionou nenhuma imagem',
            'filename.image' => 'Somente imagens podem ser enviadas',
            'filename.mimes' => 'Somente arquivos jpeg, jpg e png são permitidos',
        ];
    }
}
