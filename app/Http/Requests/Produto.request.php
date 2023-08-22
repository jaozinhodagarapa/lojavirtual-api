<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class Produto extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:80|min:3',
          'codigo' => 'required|max:30|min:10|unique:model_produtos,id',
          'preco' => 'required',
          'tipo' => 'required|max:50|min:3',
          'linha' => 'required|max:50|min:2'
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatorio',
            'nome.max' => 'o campo nome deve conter no maximo 80 caracteres',
            'nome.min' => 'o campo nome deve conter no minimo 5 caracteres',
            'codigo.required' => 'codigo obrigatorio',
            'codigo.max' => 'codigo deve conter no maximo 30 caracteres',
            'codigo.min' => 'codigo deve conter no minimo 30 caracteres',
            'codigo.unique' => 'codigo já cadastrado no sistema',
            'preco.required' => 'preco obrigatorio',
            'preco.max' => 'preco deve conter no maximo 15 caracteres',
            'preco.min' => 'preco deve conter no minimo 10 caracteres',
            'tipo.required' => 'tipo de produto obrigatorio',
            'tipo.tipo' => ' tipo de produto invalido',
            'linha.required' => 'O campo linha é obrigatorio',
            'linha.max' => 'O campo linha deve conter no maximo 30 caracteres',
            'linha.min' => 'o campo linha deve conter no minimo 5 caracteres',
           

        ];
       
    }
}
