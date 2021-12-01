<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarefaRequest extends FormRequest
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
            'id_projeto' => ['required'],
            'id_prioridade' => ['required'],
            'id_status' => ['required'],
            'id_user' => ['required'],
            'nome' => ['required'],
            'data_inicio' => ['required', 'date']
        ];
    }
}
