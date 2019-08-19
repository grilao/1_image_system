<?php

namespace App\Http\Requests\Template;

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
            'nome' => 'required',
            'descricao' => 'required',
            'altura' => 'required',
            'largura' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome não pode ficar em branco',
            'descricao.required' => 'O campo descricao não pode ficar em branco',
            'altura.required' => 'O campo altura não pode ficar em branco',
            'largura.required' => 'O campo largura não pode ficar em branco',
        ];
    }
}
