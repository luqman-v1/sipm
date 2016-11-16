<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditorRequest extends Request
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
            'judul' => 'required|max:100',
            'alamat' => 'required|max:100',
            'isi' => 'required',
            'id_category' => 'required',
            'locLat' => 'required',
            'locLng' => 'required',
            'pict' => 'required'
        ];
    }
}
