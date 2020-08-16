<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use function PHPSTORM_META\map;

class MembersRequest extends FormRequest
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
            'first_name' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'no_cst' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Nama Depan Wajib Diisi',
            'date_of_birth.required' => 'Tanggal Lahir Wajib Diisi',
            'gender.required' => 'Jenis Kelamin Wajib Diisi',
            'phone_number.required' => 'Nomor Handphone Wajib Diisi',
            'no_cst' => 'Nomor Identitas Wajib Diisi'
        ];
    }
}
