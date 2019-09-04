<?php

namespace App\Http\Requests\Imagem;

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
            'filename' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'filename.required' => 'Você não enviou nenhuma imagem'
        ];
    }
}
