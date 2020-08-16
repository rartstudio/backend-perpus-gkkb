<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesBookRequest extends FormRequest
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
            'cbo_name' => 'required|min:2'
        ];
    }

    public function messages(){
        return [
            'cbo_name.required' => 'Nama kategori harus diisi',
            'cbo_name.min' =>'Nama kategori minimal 2 huruf'
        ];
    }
}
