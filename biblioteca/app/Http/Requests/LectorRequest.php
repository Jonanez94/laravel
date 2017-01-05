<?php

namespace Biblio\Http\Requests;

use Biblio\Http\Requests\Request;

class LectorRequest extends Request
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
            'nombre' => 'required|min:5',
            'correo' => 'required',
            'edad' => 'required',
            'password' => 'required',
            'direccion' => 'required',
        ];
    }
}
