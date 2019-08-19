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
            'filename.*' => ['required', 'mimes:jpeg,jpg, png'],
        ];
    }

    public function messages()
    {
        return [
            'filename.*.required' => 'Você não adicionou nenhuma imagem',
            'filename.*.mimes' => 'Somente arquivos jpeg, jpg e png são permitidos',
        ];
    }
}
