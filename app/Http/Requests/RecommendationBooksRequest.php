<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecommendationBooksRequest extends FormRequest
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
            'book_id' => 'required',
            'started_at' => 'required',
            'ended_at' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'book_id.required' => 'Buku Harus Diisi',
            'started_at.required' => 'Tanggal Mulai Harus Diisi',
            'ended_at.required' => 'Tanggal Berakhir Harus Diisi'
        ];
    }
}
