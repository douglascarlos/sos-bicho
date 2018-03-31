<?php

namespace SOSBicho\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalSaveRequest extends FormRequest
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
            'id' => 'sometimes|required|integer|exists:animals,id',
            'nome' => 'required|min:3|max:255',
            'raca_id' => 'required|integer|exists:racas,id',
            'porte_id' => 'required|integer|exists:portes,id',
            'nascimento' => 'required|date',
            'foto' => 'sometimes|file'
        ];
    }
}
