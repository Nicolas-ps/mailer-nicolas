<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DispairRequest extends FormRequest
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
            'name' => 'required',
            'email_destinate' => 'required|email',
            'month' => 'required',
            'year' => 'required',
            'file-upload' => ['required', 'file']
        ];
    }

    public function messages ()
    {
        return [
            'name.required' => 'Não se esqueça do nome do destinatário',
            'email_destinate.required' => 'Não se esqueça do email do destinatário',
            'email_destinate.filter' => 'O email não é válido',
            'file-upload.required' => 'Não se esqueça do arquivo anexo',
        ];
    }


}
