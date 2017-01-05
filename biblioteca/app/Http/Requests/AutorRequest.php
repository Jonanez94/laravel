<?php

namespace Biblio\Http\Requests;

use Biblio\Http\Requests\Request;

class AutorRequest extends Request
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
            'autor' => 'required|min:5',
        ];
    }
}
