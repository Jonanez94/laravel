<?php

namespace Biblio\Http\Requests;

use Biblio\Http\Requests\Request;

class LibroRequest extends Request
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
            'titulo' => 'required',
            'fecha_lanzamiento' => 'required',
            'fk_autor' => 'required',
            'fk_categoria' => 'required',
            'fk_editorial' => 'required',
            'descripcion' => 'required',
            'paginas' => 'required',
        ];
    }
}
