<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesStateRequest extends FormRequest
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
            'cst_name'=> 'required|min:3'
        ];
    }

    public function messages() 
    {
        return [
            'cst_name.required' => 'Nama Kategori Status harus diisi',
            'cst_name.min' => 'Nama Kategori Status minimal 3 huruf'
        ];
    }
}
