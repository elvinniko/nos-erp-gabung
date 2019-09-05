<?php

namespace App\Http\Requests\Request\Master;

use Illuminate\Foundation\Http\FormRequest;
use DB;

class RequestKlasifikasi extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'KodeKategori'=> 'required|',
            'NamaKategori'=> 'required|',
            'KodeItemAwal'=> 'required'
        ];
    }
}
