<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublisherRequest extends FormRequest
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
            'pub_name' => 'required|min:2'
        ];
    }

    public function messages()
    {
        return [
            'pub_name.required' => 'Nama Penerbit Buku harus diisi',
            'pub_name.min' => 'Nama penerbit minimal 2 huruf'
        ];
    }
}
