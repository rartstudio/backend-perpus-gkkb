<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BooksRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required|min:20',
            'qty' => 'required|numeric|min:1',
            'cover' => 'file|image|max:500',
            'author_id' => 'required',
            'cbo_id' => 'required',
            'pub_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul buku harus diisi',
            'description.required' => 'Deskripsi buku harus diisi',
            'qty.required' => 'Qty buku harus diisi',
            'cover.max' => 'Maksimal ukuran sampul 500 kb',
            'qty.min' => 'Minimal stock awal buku 1',
            'author_id.required' => 'Penulis buku harus diisi',
            'cbo_id.required' => 'Kategori buku harus diisi',
            'pub_id.required' => 'Penerbit buku harus diisi'
        ];
    }
}
